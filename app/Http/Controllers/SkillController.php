<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SkillController extends Controller
{
    public function store(Request $request)
    {
        $skill = Skill::create($request->all());

        return response($skill, 200);
    }

    public function get_skill(Request $request)
    {
        $skill = Skill::find($request->get('id'));

        return response($skill, 200);
    }

    public function update(Request $request)
    {
        Skill::find($request->get('id'))->update($request->all());

        $skill = Skill::find($request->get('id'));

        return response($skill, 200);
    }

    public function update_position(Request $request)
    {
        $skill_infos = json_decode($request->data, true);

        foreach ($skill_infos as $skill_info) {
            DB::table('skills')
                ->where('id', $skill_info['id'])
                ->update(['position' => $skill_info['position']]);
        }

        return response('OK', 200);
    }

    public function delete(Request $request)
    {
        Skill::destroy($request->get('id'));

        return response('OK', 200);
    }
}
