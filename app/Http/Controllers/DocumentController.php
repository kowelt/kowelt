<?php

namespace App\Http\Controllers;

use App\Models\CurriculumVitae;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'document_name' => 'required|string|max:255',
            'files' => 'required|array',
        ]);

        $curriculum_vitae = CurriculumVitae::where('user_id', Auth::id())->first();

        foreach ($data['files'] as $file) {
            Document::where('path', $file)->update([
                'curriculum_vitae_id'=> $curriculum_vitae->id,
                'document_name'=> $data['document_name'],
            ]);
        }

        return redirect(route('applicant.dashboard', [$request->language, 'upload-documents']))->with('success', __('alerts.Document_Successfully_upload'));
    }

    public function delete($language, $id)
    {
        $document = Document::find($id);
        $this->deleteDocumentPrivate($document);

        /*return redirect(route('applicant.dashboard', [$language, 'upload-documents']))->with('success', __('alerts.Document_Successfully_deleted'));*/
        return redirect()->back()->with('success', __('alerts.Document_Successfully_deleted'));
    }

    public function documentUpload(Request $request)
    {
        $input_files_names = ['files', 'cv_documents', 'motivation_letter_documents', 'diploms_documents', 'other_documents', 'pdf_documents', 'payment_receipts'];

        foreach ($input_files_names as $input_files_name) {
            if ($request->hasFile($input_files_name)) {

                $files = $request->file($input_files_name);

                foreach ($files as $file) {
                    $filename = $file->getClientOriginalName();
                    $folder = uniqid() . '-' . now()->timestamp;
                    $path = Storage::url($file->storeAs('documents' . DIRECTORY_SEPARATOR . $folder, $filename, 'public'));

                    Document::create([
                        'folder' => $folder,
                        'filename' => $filename,
                        'path' => $path,
                    ]);

                    return $path;
                }
            }
        }

        return response('OK', 200);
    }

    public function documentDelete(Request $request)
    {

        $document = Document::where('path', $request->get('path'))->first();
        $this->deleteDocumentPrivate($document);

        return response('ok', 200);
    }

    private function deleteDocumentPrivate($document)
    {
        $folder = storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'documents' . DIRECTORY_SEPARATOR . $document->folder);

        $file = $folder . DIRECTORY_SEPARATOR . $document->filename;

        if (unlink($file) && rmdir($folder)) {
            $document->delete();
        }
    }
}
