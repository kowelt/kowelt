<?php

namespace App\Http\Controllers;

use App\Models\Hobby;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HobbyController extends Controller
{
    public function store(Request $request)
    {
        $hobby = Hobby::create($request->all());

        return response($hobby, 200);
    }

    public function get_hobby(Request $request)
    {
        $hobby = Hobby::find($request->get('id'));

        return response($hobby, 200);
    }

    public function update(Request $request)
    {
        Hobby::find($request->get('id'))->update($request->all());

        $hobby = Hobby::find($request->get('id'));

        return response($hobby, 200);
    }

    public function update_position(Request $request)
    {
        $hobby_infos = json_decode($request->data, true);

        foreach ($hobby_infos as $hobby_info) {
            DB::table('hobbies')
                ->where('id', $hobby_info['id'])
                ->update(['position' => $hobby_info['position']]);
        }

        return response('OK', 200);
    }

    public function delete(Request $request)
    {
        Hobby::destroy($request->get('id'));

        return response('OK', 200);
    }
}
