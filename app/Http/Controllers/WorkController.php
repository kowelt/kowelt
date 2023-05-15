<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WorkController extends Controller
{
    public function store(Request $request)
    {
        $work = Work::create([
            'work_title' => $request->get('work_title'),
            'work_city' => $request->get('work_city'),
            'work_employer' => $request->get('work_employer'),
            'work_start_date' => new Carbon($request->get('work_start_date')),
            'work_start_date_string' => (new Carbon($request->get('work_start_date')))->format('M Y'),
            'work_end_date' => new Carbon($request->get('work_end_date')),
            'work_end_date_string' => (new Carbon($request->get('work_end_date')))->format('M Y'),
            'work_description' => $request->get('work_description'),
        ]);

        return response($work, 200);
    }

    public function get_work(Request $request)
    {
        $work = Work::find($request->get('id'));

        return response($work, 200);
    }

    public function update(Request $request)
    {
        Work::find($request->get('id'))->update([
            'work_title' => $request->get('work_title'),
            'work_city' => $request->get('work_city'),
            'work_employer' => $request->get('work_employer'),
            'work_start_date' => new Carbon($request->get('work_start_date')),
            'work_start_date_string' => (new Carbon($request->get('work_start_date')))->format('M Y'),
            'work_end_date' => new Carbon($request->get('work_end_date')),
            'work_end_date_string' => (new Carbon($request->get('work_end_date')))->format('M Y'),
            'work_description' => $request->get('work_description'),
        ]);

        $work = Work::find($request->get('id'));

        return response($work, 200);
    }

    public function update_position(Request $request)
    {
        $work_infos = json_decode($request->data, true);

        foreach ($work_infos as $work_info) {
            DB::table('works')
                ->where('id', $work_info['work_id'])
                ->update(['position' => $work_info['work_position']]);
        }

        return response('OK', 200);
    }

    public function delete(Request $request)
    {
        Work::destroy($request->get('id'));

        return response('OK', 200);
    }
}
