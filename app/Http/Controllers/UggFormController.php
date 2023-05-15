<?php

namespace App\Http\Controllers;

use App\Mail\NewCvCreatedAdminMail;
use App\Mail\UggStatusChangeMail;
use App\Models\CurriculumVitae;
use App\Models\Document;
use App\Models\Education;
use App\Models\Hobby;
use App\Models\Language;
use App\Models\Picture;
use App\Models\Skill;
use App\Models\UggForm;
use App\Models\User;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\RequiredIf;
use Symfony\Component\Console\Input\Input;

class UggFormController extends Controller
{
    public function store(Request $request)
    {
        $user = User::with('ugg_form')->find(Auth::id());
        if ($user->ugg_form == null) {
            $data = $this->validator($request->all())->validate();
            $ugg_form = UggForm::create($data);
            $ugg_form->user_id = Auth::id();
            $ugg_form->save();

            $this->createExtraItems($data, $ugg_form->id);
        }

        return redirect(route('ugg.dashboard', [$request->language, 'kodreams-form', 'verify']));
    }

    public function update(Request $request, $language, $id)
    {
        $data = $this->validator($request->all())->validate();
        UggForm::find($id)->update($data);
        $ugg_form = UggForm::withAll()->find($id);

        $this->createExtraItems($data, $ugg_form->id);

        return redirect(route('ugg.dashboard', [$language, 'kodreams-form', 'verify']));
    }

    public function deletePicture($language, $id)
    {
        $picture = Picture::find($id);
        $ugg_form = UggForm::where('user_id', Auth::id())->first();
        if ($ugg_form->id == $picture->ugg_form_id) {
            $folder = storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'avatars' . DIRECTORY_SEPARATOR . $picture->folder);

            $file = $folder . DIRECTORY_SEPARATOR . $picture->filename;

            if (unlink($file) && rmdir($folder)) {
                $picture->delete();
            }
        }

        return redirect()->back();
    }

    public function sendFinalForm(Request $request)
    {
        if (Auth::user()->cv_received_by_admin) {
            $data = $request->validate([
                'confirm_correctness' => 'required|boolean',
            ]);
        } else {
            $data = $request->validate([
                'confirm_correctness' => 'required|boolean',
                'confirm_correctness_2' => 'required|boolean',
                'confirm_correctness_3' => 'required|boolean',
            ]);
        }

        if (!$data['confirm_correctness']) {
            return redirect(route('ugg.dashboard', [$request->language, 'kodreams-form', 'verify']))->with('error', __('alerts.Confirm_checkbox'));
        }

        if (!isset(Auth::user()->cv_received_by_admin)) {
            $cv = UggForm::withAll()->where('user_id', Auth::id())->first();
            Mail::to(config('mail.to.admin_kodreams'))->locale('en')->send(new NewCvCreatedAdminMail($cv));
            Mail::to(Auth::user()->email)->locale($request->language)->send(new UggStatusChangeMail(User::withAll()->find(Auth::id())));
            Auth::user()->update([
                'cv_received_by_admin' => Carbon::now()
            ]);
        }

        return redirect(route('ugg.dashboard', [$request->language, 'home']))->with('success', __('alerts.Received_your_CV'));
    }

    private function createExtraItems($data, $ugg_form_id) {
        if (isset($data['work_items_ids'])) {
            foreach ($data['work_items_ids'] as $work_items_id) {
                Work::find($work_items_id)->update([
                    'ugg_form_id' => $ugg_form_id
                ]);
            }
        }

        if (isset($data['skill_items_ids'])) {
            foreach ($data['skill_items_ids'] as $skill_items_id) {
                Skill::find($skill_items_id)->update([
                    'ugg_form_id' => $ugg_form_id
                ]);
            }
        }

        if (isset($data['language_items_ids'])) {
            foreach ($data['language_items_ids'] as $language_items_id) {
                Language::find($language_items_id)->update([
                    'ugg_form_id' => $ugg_form_id
                ]);
            }
        }

        if (isset($data['hobby_items_ids'])) {
            foreach ($data['hobby_items_ids'] as $hobby_items_id) {
                Hobby::find($hobby_items_id)->update([
                    'ugg_form_id' => $ugg_form_id
                ]);
            }
        }

        if (isset($data['avatar']) && $data['avatar'][0] !== null) {
            foreach ($data['avatar'] as $avatar) {
                Picture::where('path', $avatar)->update(['ugg_form_id'=> $ugg_form_id]);
            }
        }

        if (isset($data['cv_documents']) && $data['cv_documents'][0] !== null) {
            foreach ($data['cv_documents'] as $document) {
                Document::where('path', $document)->update([
                    'ugg_form_id'=> $ugg_form_id,
                    'document_name'=> 'cv_documents',
                ]);
            }
        }

        if (isset($data['motivation_letter_documents']) && $data['motivation_letter_documents'][0] !== null) {
            foreach ($data['motivation_letter_documents'] as $document) {
                Document::where('path', $document)->update([
                    'ugg_form_id'=> $ugg_form_id,
                    'document_name'=> 'motivation_letter_documents',
                ]);
            }
        }

        if (isset($data['diploms_documents']) && $data['diploms_documents'][0] !== null) {
            foreach ($data['diploms_documents'] as $document) {
                Document::where('path', $document)->update([
                    'ugg_form_id'=> $ugg_form_id,
                    'document_name'=> 'diploms_documents',
                ]);
            }
        }

        if (isset($data['other_documents']) && $data['other_documents'][0] !== null) {
            foreach ($data['other_documents'] as $document) {
                Document::where('path', $document)->update([
                    'ugg_form_id'=> $ugg_form_id,
                    'document_name'=> 'other_documents',
                ]);
            }
        }
    }

    private function validator(array $data)
    {
        return Validator::make($data, [
            'session' => 'required|string|max:255',
            'ugg_city' => 'required|string|max:255',
            'exam_language' => 'required|string|max:255',
            'place_of_birth' => 'required|string|max:255',
            'nationality' => 'required|string|max:255',
            'identity_number' => 'required|string|max:255',
            'leaving_city' => 'required|string|max:255',
            'tel' => 'required|string|max:255',
            'last_degree' => 'required|string|max:255',
            'last_degree_other' => [new RequiredIf(isset($data['last_degree']) && $data['last_degree'] == 'other')],
            'last_degree_school' => 'required|string|max:255',
//            'last_degree_serie' => [new RequiredIf(isset($data['last_degree']) && in_array($data['last_degree'], ['BAC', 'GCE'])), 'string', 'max:255'],
            'last_degree_serie' => ['nullable', 'string', 'max:255'],
            'last_degree_study' => [new RequiredIf(isset($data['last_degree']) && !in_array($data['last_degree'], ['BAC', 'GCE', ''])), 'string', 'max:255'],
            'last_degree_study_other' => [new RequiredIf(isset($data['last_degree_study']) && $data['last_degree_study'] == 'other')],
            'currently_student' => 'required|boolean',
            'student_school' => 'required_if:currently_student,==,1',
            'student_cycle' => 'required_if:currently_student,==,1|string|max:255',
            'student_cycle_other' => [new RequiredIf(isset($data['student_cycle']) && $data['student_cycle'] == 'other')],
            'student_field' => 'required_if:currently_student,==,1|string|max:255',
            'student_field_other' => [new RequiredIf(isset($data['student_field']) && $data['student_field'] == 'other')],
            'currently_apprentice' => 'required|boolean',
            'apprentice_field' => 'required_if:currently_apprentice,==,1',
//            'apprentice_field_other' => [new RequiredIf(isset($data['apprentice_field']) && $data['apprentice_field'] == 'other')],
            'other_education' => 'nullable|string|max:255',
            'professional_experience' => 'required|boolean',
            'work_items_ids' => 'required_if:professional_experience,==,1|array',
            'job_seeker' => 'required|boolean',
            'job_seeker_field' => 'required_if:job_seeker,==,1',
            'other_experience' => 'nullable|string|max:255',
            'education_items_ids' => 'nullable|array',
            'skill_items_ids' => 'nullable|array',
            'language_items_ids' => 'nullable|array',
            'hobby_items_ids' => 'nullable|array',
            'other_description' => 'nullable|string|max:255',
            'avatar' => 'nullable|array',
            'cv_documents' => [function ($attribute, $value, $fail) {
                if (!isset($value[0])) {
                    $fail(__("ugg.CV document required"));
                }
            }],
            'motivation_letter_documents' => [function ($attribute, $value, $fail) {
                if (!isset($value[0])) {
                    $fail(__("ugg.Motivation letter document required"));
                }
            }],
            'diploms_documents' => [function ($attribute, $value, $fail) {
                if (!isset($value[0])) {
                    $fail(__("ugg.Diploms documents required"));
                }
            }],
            'other_documents' => 'nullable|array',
        ]);
    }
}
