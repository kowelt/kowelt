<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessageAdminMail;
use App\Mail\SendPasswordResetLinkMail;
use App\Mail\UserConfirmationMailTwo;
use App\Mail\UserRequestActivationMail;
use App\Mail\UserUploadPaiementPDFAdminMail;
use App\Models\CurriculumVitae;
use App\Models\Document;
use App\Models\Picture;
use App\Models\Ugg;
use App\Models\UggCity;
use App\Models\UggForm;
use App\Models\UggSession;
use App\Models\User;
use App\Models\VerifyToken;
use App\Services\TokenService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UggController extends Controller
{
    public function index()
    {
        return view('ugg.kodreams-' . app()->getLocale(), [
            'navigation' => 'kodreams',
        ]);
    }
    public function dashboard($language, $section = null, $section_2 = null)
    {
        if (!isset(Auth::user()->cv_received_by_admin) && $section !== 'kodreams-form') {
            if (Str::endsWith(url()->previous(), 'login')) {
                return redirect(route('ugg.dashboard', [$language, 'kodreams-form']));
            }
            return redirect(route('ugg.dashboard', [$language, 'kodreams-form']))->with('error', __('alerts.Please_complete_CV'));
        }

        /*if(isset($_COOKIE['cookieName'])) {
            $myItem = $_COOKIE['cookieName'];
            dd($myItem);
        }*/

        $ugg_form = UggForm::withAll()->where('user_id', Auth::id())->first();
        $ugg_city = UggCity::find($ugg_form->ugg_city ?? '');

        if (isset($ugg_form, $ugg_form->documents)) {
            $cv_document = $ugg_form->documents->where('document_name', 'cv_documents')->first();
            $motivation_letter_document = $ugg_form->documents->where('document_name', 'motivation_letter_documents')->first();
            $diploms_documents = $ugg_form->documents->where('document_name', 'diploms_documents')->values();
            $other_documents = $ugg_form->documents->where('document_name', 'other_documents')->values();
        }

        $user = User::with(['documents'])->find(Auth::id());

        if (isset($user->documents[0])) {
            $pdf_document = $user->documents->where('document_name', 'pdf_documents')->first();
            $payment_receipt = $user->documents->where('document_name', 'payment_receipts')->first();
        }

        $ugg_sessions = UggSession::where('active', 1)->get();
        $ugg_cities = UggCity::where('active', 1)->get();

//        $picture = Picture::where('user_id', Auth::id())->first();

        return view('ugg.dashboard', [
            'navigation' => 'ugg',
            'ugg_form' => $ugg_form,
            'ugg_city' => $ugg_city,
            'cv_document' => $cv_document ?? null,
            'motivation_letter_document' => $motivation_letter_document ?? null,
            'diploms_documents' => $diploms_documents ?? null,
            'other_documents' => $other_documents ?? null,
            'pdf_document' => $pdf_document ?? null,
            'payment_receipt' => $payment_receipt ?? null,
            'ugg_sessions' => $ugg_sessions,
            'ugg_cities' => $ugg_cities,
//            'picture' => $picture,
            'section' => $section,
            'section_2' => $section_2,
        ]);
    }

    public function login()
    {
        return view('ugg.login', [
            'navigation' => 'ugg'
        ]);
    }

    public function register()
    {
        return view('ugg.register', [
            'navigation' => 'ugg'
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validator($request->all())->validate();

        $token_valid = TokenService::checkRecaptchaTokenValidity($data['recaptcha_token']);

        if (!$token_valid) {
            return redirect()->back()->with('error', __('navigation.recaptcha_failed'));
        }

        $user = User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'gender' => $data['gender'],
            'role' => 'ugg',
            'language' => $request->language,
            'date_of_birth' => $data['date_of_birth'],
            'password' => Hash::make($data['password']),
        ]);

        $activation_token = TokenService::generateToken($user->id);
        $link = route('ugg.verify.email', [$request->language, $activation_token]);

        Mail::to($user->email)->locale($user->language ?? $request->language)->send(new UserRequestActivationMail($user, $link));

        return redirect(route('ugg.login', $request->language))->with('success', __('navigation.succes_applicant_register'));
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password'], 'role' => 'ugg'])) {

            if (Auth::user()->email_verified_at == null) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect(route('ugg.login', $request->language))->with('error', __('navigation.error_verify_email'));
            }

            $request->session()->regenerate();

            return redirect(route('ugg.dashboard', [Auth::user()->language ?? $request->language, 'home']));
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

        return redirect(route('ugg.login', app()->getLocale()));
    }

    public function verify_email($language, $activation_token)
    {
        $db_token = VerifyToken::where('token', $activation_token)->first();

        $token_not_valid = TokenService::checkTokenValidity($db_token);

        if (!isset($db_token) || $token_not_valid) {
            return redirect(route('ugg.login', $language))->with('error', __('alerts.Token_expired'));
        }

        DB::transaction(function () use ($db_token) {
            User::find($db_token->user_id)->update([
                'email_verified_at' => Carbon::now()
            ]);

            VerifyToken::destroy($db_token->id);
        });

        $user = User::find($db_token->user_id);

        Mail::to($user->email)->locale($user->language ?? $language)->send(new UserConfirmationMailTwo($user));

        return redirect(route('ugg.login', $language))->with('success', __('navigation.Email_successfully_verified'));
    }

    public function passwordForgotEmail()
    {
        return view('ugg.password-forgot-email', [
            'navigation' => 'ugg',
        ]);
    }

    public function passwordForgotEmailRequest(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email', function ($attribute, $value, $fail) {
                $user = User::where([
                    'email' => $value,
                    'role' => 'ugg'
                ])->first();
                if ($user == null) {
                    $fail(__("ugg.E-Mail not found"));
                }
            }],
        ]);

        $user = User::where([
            'email' => $data['email'],
            'role' => 'ugg'
        ])->first();

        $reset_password_token = TokenService::generateToken($user->id);
        $reset_password_link = route('ugg.password.reset', [$request->language, $reset_password_token]);

        Mail::to($user->email)->locale($user->language ?? $request->language)->send(new SendPasswordResetLinkMail($user, $reset_password_link));

        return redirect(route('ugg.login', $request->language))->with('success', __('alerts.Reset_link_send'));
    }

    public function passwordReset($language, $reset_token)
    {
        $db_token = VerifyToken::where('token', $reset_token)->first();

        if (!isset($db_token)) {
            return redirect(route('ugg.login', $language))->with('error', __('alerts.reset_token_invalid'));
        }

        return view('ugg.password-reset', [
            'navigation' => 'ugg',
            'reset_token' => $reset_token,
        ]);
    }

    public function passwordResetStore(Request $request, $language, $reset_token)
    {
        $db_token = VerifyToken::where('token', $reset_token)->first();

        if (!isset($db_token)) {
            return redirect(route('ugg.login', $request->language))->with('error', __('alerts.reset_token_invalid'));
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

        return redirect(route('ugg.login', $language))->with('success', __('alerts.Password_reset_successfully'));
    }

    public function passwordChangeFromAccount(Request $request)
    {
        $data = $request->validate([
            'old_password' => 'required|string|min:8',
            'password' => ['required', 'confirmed', Password::defaults()],
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

    public function pdfUpload(Request $request)
    {
        $data = $request->validate([
            'pdf_documents' => ['array', function ($attribute, $value, $fail) {
                if (!isset($value[0])) {
                    $fail(__('account.PDF document required'));
                }
            }],

            'payment_receipts' => ['array', function ($attribute, $value, $fail) {
                if (!isset($value[0])) {
                    $fail(__('account.Payment receipt document required'));
                }
            }],
        ]);

        foreach ($data['pdf_documents'] as $document) {
            Document::where('path', $document)->update([
                'user_id'=> Auth::id(),
                'document_name'=> 'pdf_documents',
            ]);
        }

        foreach ($data['payment_receipts'] as $document) {
            Document::where('path', $document)->update([
                'user_id'=> Auth::id(),
                'document_name'=> 'payment_receipts',
            ]);
        }

        User::find(Auth::id())->update([
            'status' => 'documents_under_verification'
        ]);

        $user = User::find(Auth::id());

        Mail::to(config('mail.to.admin_kodreams'))->locale('en')->send(new UserUploadPaiementPDFAdminMail($user));

        return redirect(route('ugg.dashboard', [$request->language, 'home']))->with('success', __("ugg.successfully upload"));
    }

    private function validator(array $data, $ignore = false)
    {
        return Validator::make($data, [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'date_of_birth' => 'required|date|before:today',
            'email' => ['required', 'email', 'max:255', function ($attribute, $value, $fail) use ($ignore) {
                $users = User::where('email', $value)->get();
                if (isset($users[0])) {
                    foreach ($users as $user) {
                        if ($user->role == 'ugg' && !$ignore) {
                            $fail(__("ugg.This E-Mail already exist"));
                        }
                    }
                }
            }],
            'password' => ['required', 'confirmed', Password::defaults()],
            'recaptcha_token' => 'required|string',
        ]);
    }
}
