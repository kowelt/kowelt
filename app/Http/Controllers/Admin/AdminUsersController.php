<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AdminUsersController extends Controller
{
    public function index()
    {
        if (!Auth::user()->can_create_admin_account) {
            return redirect()->back();
        }

        $admin_users = User::where('role', 'admin')->get();

        return view('admin.admin-users', [
            'admin_users' => $admin_users,
            'nav' => 'admin-users'
        ]);
    }

    public function create()
    {
        if (!Auth::user()->can_create_admin_account) {
            return redirect()->back();
        }

        return view('admin.admin-users-create', [
            'nav' => 'admin-users'
        ]);
    }

    public function store(Request $request)
    {
        if (!Auth::user()->can_create_admin_account) {
            return redirect()->back();
        }

        $data = $this->validator($request->all())->validate();

        User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'gender' => $data['gender'],
            'date_of_birth' => $data['date_of_birth'],
            'email' => $data['email'],
            'email_verified_at' => now(),
            'password' => Hash::make($data['password']),
            'password_clear_text' => $data['password'],
            'can_create_admin_account' => $data['can_create_admin_account'],
            'active_admin' => $data['active_admin'],
            'role' => 'admin',
        ]);

        return redirect(route('admin.users', app()->getLocale()));
    }

    public function edit($language, $id)
    {
        if (!Auth::user()->can_create_admin_account) {
            return redirect()->back();
        }

        $admin_user = User::find($id);

        return view('admin.admin-users-edit', [
            'admin_user' => $admin_user,
            'nav' => 'admin-users'
        ]);
    }

    public function update(Request $request, $language, User $user)
    {
        if (!Auth::user()->can_create_admin_account) {
            return redirect()->back();
        }

        $data = $this->validator($request->all(), $user->id)->validate();
        $user->update([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'gender' => $data['gender'],
            'date_of_birth' => $data['date_of_birth'],
            'email' => $data['email'],
            'email_verified_at' => now(),
            'password' => Hash::make($data['password']),
            'password_clear_text' => $data['password'],
            'can_create_admin_account' => $data['can_create_admin_account'],
            'active_admin' => $data['active_admin'],
            'role' => 'admin',
        ]);

        return redirect(route('admin.users', $language));
    }

    public function delete($language, User $user)
    {
        if (!Auth::user()->can_create_admin_account) {
            return redirect()->back();
        }

        $user->delete();

        return redirect(route('admin.users', $language));
    }

    private function validator(array $data, $user_id = null)
    {
        return Validator::make($data, [
            'firstname' => 'required|string|max:256',
            'lastname' => 'required|string|max:256',
            'gender' => 'required|string|max:256',
            'date_of_birth' => 'required|date|before:today',
            'email' => ['required', 'email', 'max:256', Rule::unique('users')->ignore($user_id ?? '')],
            'password' => 'required|string|min:6',
            'can_create_admin_account' => 'required|boolean',
            'active_admin' => 'required|boolean',
        ]);
    }
}
