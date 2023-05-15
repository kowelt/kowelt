<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function store(Request $request)
    {
        $education = Education::create([
            'education_degree' => $request->get('education_degree'),
            'education_city' => $request->get('education_city'),
            'education_institut' => $request->get('education_institut'),
            'education_start_date' => new Carbon($request->get('education_start_date')),
            'education_start_date_string' => (new Carbon($request->get('education_start_date')))->format('M Y'),
            'education_end_date' => new Carbon($request->get('education_end_date')),
            'education_end_date_string' => (new Carbon($request->get('education_end_date')))->format('M Y'),
            'education_description' => $request->get('education_description'),
        ]);

        return response($education, 200);
    }

    public function get_education(Request $request)
    {
        $education = Education::find($request->get('id'));

        return response($education, 200);
    }

    public function update(Request $request)
    {
        Education::find($request->get('id'))->update([
            'education_degree' => $request->get('education_degree'),
            'education_city' => $request->get('education_city'),
            'education_institut' => $request->get('education_institut'),
            'education_start_date' => new Carbon($request->get('education_start_date')),
            'education_start_date_string' => (new Carbon($request->get('education_start_date')))->format('M Y'),
            'education_end_date' => new Carbon($request->get('education_end_date')),
            'education_end_date_string' => (new Carbon($request->get('education_end_date')))->format('M Y'),
            'education_description' => $request->get('education_description'),
        ]);

        $education = Education::find($request->get('id'));

        return response($education, 200);
    }

    public function delete(Request $request)
    {
        Education::destroy($request->get('id'));

        return response('OK', 200);
    }
}
