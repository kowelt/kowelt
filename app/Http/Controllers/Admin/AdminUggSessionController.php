<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UggSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminUggSessionController extends Controller
{
    public function index()
    {
        $ugg_sessions = UggSession::all();

        return view('admin.ugg.sessions', [
            'ugg_sessions' => $ugg_sessions,
            'nav' => 'ugg-sessions'
        ]);
    }

    public function create()
    {
        return view('admin.ugg.sessions-create', [
            'nav' => 'ugg-sessions'
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validator($request->all())->validate();

        UggSession::create($data);

        return redirect(route('admin.ugg.sessions', app()->getLocale()));
    }

    public function edit($language, $id)
    {
        $ugg_session = UggSession::where('id', $id)->first();

        return view('admin.ugg.sessions-edit', [
            'ugg_session' => $ugg_session,
            'nav' => 'ugg-sessions'
        ]);
    }

    public function update(Request $request, $language, UggSession $ugg_session)
    {
        $data = $this->validator($request->all())->validate();
        $ugg_session->update($data);

        return redirect(route('admin.ugg.sessions', $language));
    }

    public function delete($language, UggSession $ugg_session)
    {
        $ugg_session->delete();

        return redirect(route('admin.ugg.sessions', $language));
    }

    private function validator(array $data)
    {
        return Validator::make($data, [
            'name_en' => 'required|string|max:256',
            'name_de' => 'required|string|max:256',
            'name_fr' => 'required|string|max:256',
            'active' => 'required|boolean',
        ]);
    }
}
