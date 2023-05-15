<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\UggGroupMessageAdminMail;
use App\Models\UggSession;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminUggEmailsController extends Controller
{
    public function index()
    {
        $ugg_sessions = UggSession::all();

        return view('admin.ugg.emails', [
            'nav' => 'emails',
            'ugg_sessions' => $ugg_sessions,
        ]);
    }

    public function send(Request $request)
    {
        $data = $request->validate([
            'session' => 'required|string',
            'status' => 'required|string',
            'subject' => 'required|string',
            'mail_en' => 'required|string',
            'mail_de' => 'nullable|string',
            'mail_fr' => 'nullable|string',
        ]);

        if ($data['status'] == 'all') {
            $users = User::where('role', 'ugg')->whereHas('ugg_form', function ($query) use ($data) {
                $query->where('session', $data['session']);
            })->get();
        } else {
            $users = User::where([
                'role' => 'ugg',
                'status' => $data['status'],
            ])->whereHas('ugg_form', function ($query) use ($data) {
                $query->where('session', $data['session']);
            })->get();
        }

        if (isset($users[0])) {
            foreach ($users as $user) {
                $mail = $data['mail_' . $user->language] ?? $data['mail_en'];
                Mail::to($user->email)->send(new UggGroupMessageAdminMail($data['subject'], $mail));
            }
            return redirect(route('admin.ugg.emails', $request->language));
        } else {
            return redirect()->back()->with('error', 'No matching Users');
        }
    }
}
