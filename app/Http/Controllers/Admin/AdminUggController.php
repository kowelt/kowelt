<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\UserAccountUpdatedMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AdminUggController extends Controller
{
    public function index()
    {
        $uggs = User::with(['ugg_form'])->where('role', 'ugg')->get();

        return view('admin.ugg.uggs', [
            'uggs' => $uggs,
            'nav' => 'uggs'
        ]);
    }

    public function edit($language, $id)
    {
        $ugg = User::with(['ugg_form'])->where('id', $id)->first();

        return view('admin.ugg.uggs-edit', [
            'ugg' => $ugg,
            'nav' => 'uggs'
        ]);
    }

    public function update(Request $request, $language, User $ugg)
    {
        $data = $this->validator($request->all(), $ugg->id)->validate();
        $ugg->update($data);

        Mail::to($ugg->email)->locale($ugg->language ?? 'en')->send(new UserAccountUpdatedMail($ugg));

        return redirect(route('admin.ugg', $language));
    }

    public function delete($language, User $ugg)
    {
        $ugg->delete();

        return redirect(route('admin.ugg', $language));
    }

    private function validator(array $data, $ugg_id = null)
    {
        return Validator::make($data, [
            'firstname' => 'required|string|max:256',
            'lastname' => 'required|string|max:256',
            'email' => ['required', 'email', 'max:256', function ($attribute, $value, $fail) use ($ugg_id) {
                $users = User::where('email', $value)->get();
                if (isset($users[0])) {
                    foreach ($users as $user) {
                        if ($user->role == 'ugg' && !($user->id == $ugg_id)) {
                            $fail('This E-Mail already exist');
                        }
                    }
                }
            }],
            'date_of_birth' => 'required|date|before:today',
            'gender' => 'required|string|max:256',
        ]);
    }
}
