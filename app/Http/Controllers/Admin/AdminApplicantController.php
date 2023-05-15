<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\UserAccountUpdatedMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AdminApplicantController extends Controller
{
    public function index()
    {
        $applicants = User::with(['curriculum_vitae'])->where('role', 'applicant')->get();

        return view('admin.applicants', [
            'applicants' => $applicants,
            'nav' => 'applicants'
        ]);
    }

    public function edit($language, $id)
    {
        $applicant = User::with(['curriculum_vitae'])->where('id', $id)->first();

        return view('admin.applicants-edit', [
            'applicant' => $applicant,
            'nav' => 'applicants'
        ]);
    }

    public function update(Request $request, $language, User $applicant)
    {
        $data = $this->validator($request->all(), $applicant->id)->validate();
        $applicant->update($data);

        Mail::to($applicant->email)->send(new UserAccountUpdatedMail($applicant));

        return redirect(route('admin.applicant', $language));
    }

    public function delete($language, User $applicant)
    {
        $applicant->delete();

        return redirect(route('admin.applicant', $language));
    }

    private function validator(array $data, $applicant_id = null)
    {
        return Validator::make($data, [
            'firstname' => 'required|string|max:256',
            'lastname' => 'required|string|max:256',
            'email' => ['required', 'email', 'max:256', function ($attribute, $value, $fail) use ($applicant_id) {
                $users = User::where('email', $value)->get();
                if (isset($users[0])) {
                    foreach ($users as $user) {
                        if ($user->role == 'applicant' && !($user->id == $applicant_id)) {
                            $fail('This E-Mail already exist');
                        }
                    }
                }
            }],
            'date_of_birth' => 'required|date|before:today',
            'gender' => 'required|string|max:256',
        ]);
    }
}
