<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessageAdminMail;
use App\Mail\SendPasswordResetLinkMail;
use App\Mail\UserConfirmationMailTwo;
use App\Mail\UserRequestActivationMail;
use App\Models\CurriculumVitae;
use App\Models\User;
use App\Models\VerifyToken;
use App\Services\TokenService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ApplicantController extends Controller
{
    public function dashboard($language, $section = null, $section_2 = null, $section_3 = null)
    {
        if (!isset(Auth::user()->cv_received_by_admin) && $section !== 'cv' && $section_2 !== 'cv-form') {
            return redirect(route('applicant.dashboard', [$language, 'cv', 'cv-form']))->with('error', __('alerts.Please_complete_CV'));
        }

        $curriculum_vitae = CurriculumVitae::withAll()->where('user_id', Auth::id())->first();

        return view('applicant.dashboard', [
            'navigation' => 'applicant',
            'curriculum_vitae' => $curriculum_vitae,
            'section' => $section,
            'section_2' => $section_2,
            'section_3' => $section_3,
        ]);
    }

    public function login()
    {
        return view('applicant.login', [
            'navigation' => 'applicant'
        ]);
    }

    public function register()
    {
        return view('applicant.register', [
            'navigation' => 'applicant'
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validator($request->all())->validate();

        $user = User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'gender' => $data['gender'],
            'language' => $request->language,
            'date_of_birth' => $data['date_of_birth'],
            'password' => Hash::make($data['password']),
        ]);

        $activation_token = TokenService::generateToken($user->id);
        $link = route('applicant.verify.email', [$request->language, $activation_token]);

        Mail::to($user->email)->locale(app()->getLocale())->send(new UserRequestActivationMail($user, $link));

        return redirect(route('applicant.login', $request->language))->with('success', __('navigation.succes_applicant_register'));
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6'],
        ]);

        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password'], 'role' => 'applicant'])) {

            if (Auth::user()->email_verified_at == null) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect(route('applicant.login', $request->language))->with('error', __('navigation.error_verify_email'));
            }

            $request->session()->regenerate();

            return redirect(route('applicant.dashboard', [Auth::user()->language ?? $request->language, 'home']));
        }

        return back()->withErrors([
            'email' => __('navigation.error_login'),
        ]);
    }

    public function logout(Request $request)
    {
        User::find(Auth::id())->update([
            'language' => $request->language
        ]);

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('applicant.login', app()->getLocale()));
    }

    public function verify_email($language, $activation_token)
    {
        $db_token = VerifyToken::where('token', $activation_token)->first();

        $token_not_valid = TokenService::checkTokenValidity($db_token);

        if (!isset($db_token) || $token_not_valid) {
            return redirect(route('applicant.login', $language))->with('error', __('alerts.Token_expired'));
        }

        DB::transaction(function () use ($db_token) {
            User::find($db_token->user_id)->update([
                'email_verified_at' => Carbon::now()
            ]);

            VerifyToken::destroy($db_token->id);
        });

        $user = User::find($db_token->user_id);

        Mail::to($user->email)->locale(app()->getLocale())->send(new UserConfirmationMailTwo($user));

        return redirect(route('applicant.login', $language))->with('success', __('navigation.Email_successfully_verified'));
    }

    public function sendContactMessage(Request $request)
    {
        $data = $this->validator_contact_message($request->all())->validate();

        Mail::to(config('mail.to.admin_applicant'))->locale('en')->send(new ContactMessageAdminMail($data));

        return redirect(route('welcome', $request->language))->with('success', __('navigation.Message_send_successfully'));
    }

    public function passwordForgotEmail()
    {
        return view('applicant.password-forgot-email', [
            'navigation' => 'applicant',
        ]);
    }

    public function passwordForgotEmailRequest(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email', function ($attribute, $value, $fail) {
                $user = User::where([
                    'email' => $value,
                    'role' => 'applicant'
                ])->first();
                if ($user == null) {
                    $fail(__("ugg.E-Mail not found"));
                }
            }],
        ]);

        $user = User::where([
            'email' => $data['email'],
            'role' => 'applicant'
        ])->first();

        $reset_password_token = TokenService::generateToken($user->id);
        $reset_password_link = route('applicant.password.reset', [$request->language, $reset_password_token]);

        Mail::to($user->email)->locale(app()->getLocale())->send(new SendPasswordResetLinkMail($user, $reset_password_link));

        return redirect(route('applicant.login', $request->language))->with('success', __('alerts.Reset_link_send'));
    }

    public function passwordReset($language, $reset_token)
    {
        $db_token = VerifyToken::where('token', $reset_token)->first();

        if (!isset($db_token)) {
            return redirect(route('applicant.login', $language))->with('error', __('alerts.reset_token_invalid'));
        }

        return view('applicant.password-reset', [
            'navigation' => 'applicant',
            'reset_token' => $reset_token,
        ]);
    }

    public function passwordResetStore(Request $request, $language, $reset_token)
    {
        $db_token = VerifyToken::where('token', $reset_token)->first();

        if (!isset($db_token)) {
            return redirect(route('applicant.login', $request->language))->with('error', __('alerts.reset_token_invalid'));
        }

        $data = $request->validate([
            'password' => 'required|confirmed|string|min:6',
        ]);

        DB::transaction(function () use ($db_token, $data) {
            User::find($db_token->user_id)->update([
                'password' => Hash::make($data['password'])
            ]);

            VerifyToken::destroy($db_token->id);
        });

        return redirect(route('applicant.login', $language))->with('success', __('alerts.Password_reset_successfully'));
    }

    public function passwordChangeFromAccount(Request $request)
    {
        $data = $request->validate([
            'old_password' => 'required|string|min:6',
            'password' => 'required|confirmed|string|min:6',
        ]);

        $user = Auth::user();

        if (!Hash::check($data['old_password'], $user->password)) {
            return redirect()->back()->with('error', __('account.Your_old_password_is_incorrect'));
        }

        $user->update([
            'password' => Hash::make($data['password'])
        ]);

        return redirect()->back()->with('success', __('account.Your_password_has_been_changed'));
    }

    private function validator(array $data, $ignore = false)
    {
        return Validator::make($data, [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'date_of_birth' => 'required|date|before:today',
//            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user_id ?? '')],
            'email' => ['required', 'email', 'max:255', function ($attribute, $value, $fail) use ($ignore) {
                $users = User::where('email', $value)->get();
                if (isset($users[0])) {
                    foreach ($users as $user) {
                        if ($user->role == 'applicant' && !$ignore) {
                            $fail(__("ugg.This E-Mail already exist"));
                        }
                    }
                }
            }],
            'password' => 'required|confirmed|string|min:6',
        ]);
    }

    private function validator_contact_message(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:255',
        ]);
    }
}
