<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UggCity;
use App\Models\UggSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminUggCityController extends Controller
{
    public function index($language, $ugg_session_id = 'all')
    {
        $ugg_cities = UggCity::with(['ugg_session'])
            ->whereHas('ugg_session', function ($query) use ($ugg_session_id) {
                if ($ugg_session_id != 'all') {
                    $query->where('ugg_session_id', $ugg_session_id);
                }
            })
            ->get();

        $ugg_sessions = UggSession::all();

        return view('admin.ugg.cities', [
            'ugg_cities' => $ugg_cities,
            'ugg_sessions' => $ugg_sessions,
            'ugg_session_id' => $ugg_session_id,
            'nav' => 'ugg-cities'
        ]);
    }

    public function setSearch(Request $request)
    {
        $data = $request->validate([
            'ugg_session_id' => 'required|string|max:256'
        ]);

        return redirect(route('admin.ugg.cities', [$request->language, $data['ugg_session_id']]));
    }

    public function create()
    {
        $ugg_sessions = UggSession::all();

        return view('admin.ugg.cities-create', [
            'ugg_sessions' => $ugg_sessions,
            'nav' => 'ugg-cities'
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validator($request->all())->validate();

        UggCity::create($data);

        return redirect(route('admin.ugg.cities', app()->getLocale()));
    }

    public function edit($language, $id)
    {
        $ugg_city = UggCity::where('id', $id)->first();

        $ugg_sessions = UggSession::all();

        return view('admin.ugg.cities-edit', [
            'ugg_city' => $ugg_city,
            'ugg_sessions' => $ugg_sessions,
            'nav' => 'ugg-cities'
        ]);
    }

    public function update(Request $request, $language, UggCity $ugg_city)
    {
        $data = $this->validator($request->all())->validate();
        $ugg_city->update($data);

        return redirect(route('admin.ugg.cities', $language));
    }

    public function delete($language, UggCity $ugg_city)
    {
        $ugg_city->delete();

        return redirect(route('admin.ugg.cities', $language));
    }

    private function validator(array $data)
    {
        return Validator::make($data, [
            'ugg_session_id' => 'required|string|max:256',
            'name_en' => 'required|string|max:256',
            'name_de' => 'required|string|max:256',
            'name_fr' => 'required|string|max:256',
            'active' => 'required|boolean',
        ]);
    }

    public function getUggCities(Request $request)
    {
        $data = $request->validate([
            'ugg_session_id' => 'required|string|max:256',
        ]);

        $ugg_cities = UggCity::where([
            'ugg_session_id' => $data['ugg_session_id'],
            'active' => 1,
        ])->get();

        return response($ugg_cities, 200);
    }
}
