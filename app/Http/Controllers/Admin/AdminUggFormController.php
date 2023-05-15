<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\UggStatusChangeMail;
use App\Models\UggCity;
use App\Models\UggForm;
use App\Models\UggSession;
use App\Models\User;
use App\Services\PDFService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminUggFormController extends Controller
{
    public function index($language, $session = 'all', $city = 'all', $status = 'all', $exam_language = 'all', $gender = 'all')
    {
        $ugg_forms = UggForm::withAll()
            ->where(function ($query) use ($session) {
                if ($session != 'all') {
                    $query->where('session', $session);
                }
            })
            ->where(function ($query) use ($city) {
                if ($city != 'all') {
                    $query->where('ugg_city', $city);
                }
            })
            ->whereHas('user', function ($query) use ($status) {
                if ($status != 'all') {
                    $query->where('status', $status);
                }
            })
            ->where(function ($query) use ($exam_language) {
                if ($exam_language != 'all') {
                    $query->where('exam_language', $exam_language);
                }
            })
            ->whereHas('user', function ($query) use ($gender) {
                if ($gender != 'all') {
                    $query->where('gender', $gender);
                }
            })
            ->get();

        $ugg_sessions = UggSession::all();

        $cities = UggCity::where('ugg_session_id', $session)->get();

        return view('admin.ugg.ugg-forms', [
            'ugg_forms' => $ugg_forms,
            'session' => $session,
            'city' => $city,
            'status' => $status,
            'exam_language' => $exam_language,
            'gender' => $gender,
            'ugg_sessions' => $ugg_sessions,
            'cities' => $cities,
            'nav' => 'ugg-forms'
        ]);
    }

    public function view($language, $id)
    {
        $ugg_form = UggForm::withAll()->find($id);
        $user = User::find($ugg_form->user_id);

        if (isset($ugg_form, $ugg_form->documents)) {
            $cv_document = $ugg_form->documents->where('document_name', 'cv_documents')->first();
            $motivation_letter_document = $ugg_form->documents->where('document_name', 'motivation_letter_documents')->first();
            $diploms_documents = $ugg_form->documents->where('document_name', 'diploms_documents')->values();
            $other_documents = $ugg_form->documents->where('document_name', 'other_documents')->values();
        }

        $ugg_sessions = UggSession::where('active', 1)->get();
        $ugg_cities = UggCity::where('active', 1)->get();

        return view('admin.ugg.ugg-forms-view', [
            'ugg_form' => $ugg_form,
            'cv_document' => $cv_document ?? null,
            'motivation_letter_document' => $motivation_letter_document ?? null,
            'diploms_documents' => $diploms_documents ?? null,
            'other_documents' => $other_documents ?? null,
            'user' => $user,
//            'section_2' => isset($user->documents[0]) ? null : 'verify',
            'ugg_sessions' => $ugg_sessions,
            'ugg_cities' => $ugg_cities,
            'section_2' => 'verify',
            'nav' => 'ugg-forms'
        ]);
    }

    public function setSearch(Request $request)
    {
        $data = $request->validate([
            'session' => 'required|string|max:256',
            'city' => 'required|string|max:256',
            'status' => 'required|string|max:256',
            'exam_language' => 'required|string|max:256',
            'gender' => 'required|string|max:256',
        ]);

        return redirect(route('admin.ugg.form', [
            $request->language,
            $data['session'],
            $data['session'] == 'all'  ? 'all' : $data['city'],
            $data['status'],
            $data['exam_language'],
            $data['gender'],
        ]));
    }

    public function delete($language, UggForm $ugg_form)
    {
        $ugg_form->delete();

        return redirect(route('admin.cv', $language));
    }

    public function setStatus($language, $ugg_id, $status)
    {
        $user = User::find($ugg_id);
        $ugg_form = UggForm::withAll()->where('user_id', $ugg_id)->first();

        User::find($ugg_id)->update([
            'status' => $status,
            'pdf_path' => PDFService::generatePdf($user, $ugg_form),
        ]);

        Mail::to($user->email)->locale($user->language ?? $ugg_form->exam_language)->send(new UggStatusChangeMail(User::withAll()->find($ugg_id)));

        return redirect()->back()->with('success', 'success');
    }

    public function changeStatus(Request $request,$language, $ugg_id) {
        $data = $request->validate([
            'status' => 'required|string|max:256'
        ]);

        User::find($ugg_id)->update([
            'status' => $data['status'],
        ]);

        $user = User::withAll()->find($ugg_id);
        $ugg_form = UggForm::withAll()->where('user_id', $ugg_id)->first();

        Mail::to($user->email)->locale($user->language ?? $ugg_form->exam_language)->send(new UggStatusChangeMail($user));

        return redirect()->back()->with('success', 'success');
    }

    public function setNote(Request $request,$language, $ugg_id)
    {
        $data = $request->validate([
            'note' => 'required|decimal:0.00,20.00|max:20',
            'selected' => 'required|boolean'
        ]);

        User::find($ugg_id)->update([
            'note' => (int)($data['note'] * 100),
            'status' => $data['selected'] ? 'selected' : 'not_selected',
        ]);

        $user = User::withAll()->find($ugg_id);
        $ugg_form = UggForm::withAll()->where('user_id', $ugg_id)->first();

        Mail::to($user->email)->locale($user->language ?? $ugg_form->exam_language)->send(new UggStatusChangeMail($user));

        return redirect()->back()->with('success', 'success');
    }

    public function regeneratePDF($language, $ugg_form_id)
    {
        $ugg_form = UggForm::query()->find($ugg_form_id);
        $user = User::query()->find($ugg_form->user_id);

        if ($user->pdf_path) {
            $folder = storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'users' . DIRECTORY_SEPARATOR . 'pdf');
            $user_pdf = $folder . DIRECTORY_SEPARATOR . basename($user->pdf_path);

            unlink($user_pdf);

            $user->pdf_path = null;
            $user->save();
        }

        $user->pdf_path = PDFService::generatePdf($user, $ugg_form);
        $user->save();

        return redirect()->back()->with('success', 'success');
    }
}
