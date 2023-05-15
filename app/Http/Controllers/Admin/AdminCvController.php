<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CurriculumVitae;
use Illuminate\Http\Request;

class AdminCvController extends Controller
{
    public function index()
    {
        $curriculum_vitaes = CurriculumVitae::withAll()->get();

        return view('admin.cvs', [
            'curriculum_vitaes' => $curriculum_vitaes,
            'nav' => 'cv'
        ]);
    }

    public function view($language, $id)
    {
        $curriculum_vitae = CurriculumVitae::withAll()->find($id);

        return view('admin.cvs-view', [
            'curriculum_vitae' => $curriculum_vitae,
            'section_3' => 'verify',
            'nav' => 'cv'
        ]);
    }

    public function delete($language, CurriculumVitae $curriculum_vitae)
    {
        $curriculum_vitae->delete();

        return redirect(route('admin.cv', $language));
    }
}
