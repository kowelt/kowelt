<?php

namespace App\Http\Controllers;

use App\Jobs\NewCvCreatedAdminMailJob;
use App\Mail\NewCvCreatedAdminMail;
use App\Models\CurriculumVitae;
use App\Models\Education;
use App\Models\Hobby;
use App\Models\Language;
use App\Models\Picture;
use App\Models\Skill;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class CurriculumVitaeController extends Controller
{
    public function store(Request $request)
    {
        $data = $this->validator($request->all())->validate();
        $curriculum_vitae = CurriculumVitae::create($data);
        $curriculum_vitae->user_id = Auth::id();
        $curriculum_vitae->save();

        if (isset($data['education_items_ids'])) {
            foreach ($data['education_items_ids'] as $education_items_id) {
                Education::find($education_items_id)->update([
                    'curriculum_vitae_id' => $curriculum_vitae->id
                ]);
            }
        }

        if (isset($data['work_items_ids'])) {
            foreach ($data['work_items_ids'] as $work_items_id) {
                Work::find($work_items_id)->update([
                    'curriculum_vitae_id' => $curriculum_vitae->id
                ]);
            }
        }

        if (isset($data['skill_items_ids'])) {
            foreach ($data['skill_items_ids'] as $skill_items_id) {
                Skill::find($skill_items_id)->update([
                    'curriculum_vitae_id' => $curriculum_vitae->id
                ]);
            }
        }

        if (isset($data['language_items_ids'])) {
            foreach ($data['language_items_ids'] as $language_items_id) {
                Language::find($language_items_id)->update([
                    'curriculum_vitae_id' => $curriculum_vitae->id
                ]);
            }
        }

        if (isset($data['hobby_items_ids'])) {
            foreach ($data['hobby_items_ids'] as $hobby_items_id) {
                Hobby::find($hobby_items_id)->update([
                    'curriculum_vitae_id' => $curriculum_vitae->id
                ]);
            }
        }

        if (isset($request['avatar']) && $request['avatar'][0] !== null) {
            foreach ($request['avatar'] as $avatar) {
                Picture::where('path', $avatar)->update(['curriculum_vitae_id'=> $curriculum_vitae->id]);
            }
        }

        return redirect(route('applicant.dashboard', [$request->language, 'cv', 'cv-form', 'verify']));
    }

    public function update(Request $request, $language, $id)
    {
        $data = $this->validator($request->all())->validate();

        CurriculumVitae::find($id)->update($data);

        $curriculum_vitae = CurriculumVitae::withAll()->find($id);

        if (isset($data['education_items_ids'])) {
            foreach ($data['education_items_ids'] as $education_items_id) {
                Education::find($education_items_id)->update([
                    'curriculum_vitae_id' => $curriculum_vitae->id
                ]);
            }
        }

        if (isset($data['work_items_ids'])) {
            foreach ($data['work_items_ids'] as $work_items_id) {
                Work::find($work_items_id)->update([
                    'curriculum_vitae_id' => $curriculum_vitae->id
                ]);
            }
        }

        if (isset($data['skill_items_ids'])) {
            foreach ($data['skill_items_ids'] as $skill_items_id) {
                Skill::find($skill_items_id)->update([
                    'curriculum_vitae_id' => $curriculum_vitae->id
                ]);
            }
        }

        if (isset($data['language_items_ids'])) {
            foreach ($data['language_items_ids'] as $language_items_id) {
                Language::find($language_items_id)->update([
                    'curriculum_vitae_id' => $curriculum_vitae->id
                ]);
            }
        }

        if (isset($data['hobby_items_ids'])) {
            foreach ($data['hobby_items_ids'] as $hobby_items_id) {
                Hobby::find($hobby_items_id)->update([
                    'curriculum_vitae_id' => $curriculum_vitae->id
                ]);
            }
        }

        if (isset($request['avatar']) && $request['avatar'][0] !== null) {
            foreach ($request['avatar'] as $avatar) {
                Picture::where('path', $avatar)->update(['curriculum_vitae_id'=> $curriculum_vitae->id]);
            }
        }

        return redirect(route('applicant.dashboard', [$request->language, 'cv', 'cv-form', 'verify']));
    }

    public function sendFinalCv(Request $request)
    {
        $data = $request->validate([
            'confirm_correctness' => 'required|boolean'
        ]);

        if (!$data['confirm_correctness']) {
            return redirect(route('applicant.dashboard', [$request->language, 'cv', 'cv-form', 'verify']))->with('error', __('alerts.Confirm_checkbox'));
        }

        if (!isset(Auth::user()->cv_received_by_admin)) {
            $cv = CurriculumVitae::withAll()->where('user_id', Auth::id())->get();
            Mail::to(config('mail.to.admin'))->send(new NewCvCreatedAdminMail($cv));
            Auth::user()->update([
                'cv_received_by_admin' => Carbon::now()
            ]);
        }

        return redirect(route('applicant.dashboard', [$request->language, 'home']))->with('success', __('alerts.Received_your_CV'));
    }

    public function imageUpload(Request $request)
    {
        if ($request->hasFile('avatar')) {

            $files = $request->file('avatar');

            foreach ($files as $file) {
                $filename = $file->getClientOriginalName();
                $folder = uniqid() . '-' . now()->timestamp;
                $path = Storage::url($file->storeAs('avatars' . DIRECTORY_SEPARATOR . $folder, $filename, 'public'));

                Picture::create([
                    'folder' => $folder,
                    'filename' => $filename,
                    'path' => $path,
                ]);

                return $path;
            }
        }

        return response('OK', 200);
    }

    public function imageDelete(Request $request)
    {

        $avatar = Picture::where('path', $request->get('path'))->first();

        return $this->deleteImagePriv($avatar);
    }

    public function imageDeletePath(Request $request)
    {
        $avatar = Picture::find($request->get('id'));

        return $this->deleteImagePriv($avatar);
    }

    private function validator(array $data)
    {
        return Validator::make($data, [
            'tel' => 'required|string|max:255',
            'street_and_number' => 'required|string|max:255',
            'postal_code' => 'required|numeric',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'place_of_birth' => 'required|string|max:255',
            'nationality' => 'required|string|max:255',
            'martial_status' => 'nullable|string|max:255',
            'driving_licence' => 'required|boolean',
            'driving_licence_category' => 'required_if:driving_licence,==,1|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'education_items_ids' => 'nullable|array',
            'work_items_ids' => 'nullable|array',
            'skill_items_ids' => 'nullable|array',
            'language_items_ids' => 'nullable|array',
            'hobby_items_ids' => 'nullable|array',
            'other_description' => 'nullable|string|max:255',
        ]);
    }

    private function deleteImagePriv($avatar)
    {
        $folder = storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'avatars' . DIRECTORY_SEPARATOR . $avatar->folder);

        $file = $folder . DIRECTORY_SEPARATOR . $avatar->filename;

        if (unlink($file) && rmdir($folder)) {
            $avatar->delete();
        }

        return response('ok', 200);
    }
}
