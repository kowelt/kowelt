<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LanguageController extends Controller
{
    public function store(Request $request)
    {
        $language = Language::create($request->all());

        return response($language, 200);
    }

    public function get_language(Request $request)
    {
        $language = Language::find($request->get('id'));

        return response($language, 200);
    }

    public function update(Request $request)
    {
        Language::find($request->get('id'))->update($request->all());

        $language = Language::find($request->get('id'));

        return response($language, 200);
    }

    public function update_position(Request $request)
    {
        $language_infos = json_decode($request->data, true);

        foreach ($language_infos as $language_info) {
            DB::table('languages')
                ->where('id', $language_info['id'])
                ->update(['position' => $language_info['position']]);
        }

        return response('OK', 200);
    }

    public function delete(Request $request)
    {
        Language::destroy($request->get('id'));

        return response('OK', 200);
    }
}
