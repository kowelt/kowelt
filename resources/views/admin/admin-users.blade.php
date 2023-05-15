@extends('admin.layout')

@section('content')
    <div id="main-content" class="w-full">

        <div class="p-6 md:p-10 lg:p-16 flex justify-between items-center">
            <div>
                <p class="text-4xl font-semibold">Admin Users</p>
            </div>
            <div>
                <a class="px-10 py-4 md:px-20 bg-indigo-400 text-white hover:bg-indigo-600 rounded" href="{{ route('admin.users.create', app()->getLocale()) }}">Create Admin User</a>
            </div>
        </div>

        <div class="px-6 md:px-10 lg:px-16">
            <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">


                <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                    <tr class="text-left">
                        <th data-priority="1">ID</th>
                        <th data-priority="2">Name</th>
                        <th data-priority="3">Email</th>
                        <th data-priority="4">Password</th>
                        <th data-priority="5">Active</th>
                        <th data-priority="6">Can Create Admin Account</th>
                        <th data-priority="7">View/Edit</th>
                        <th data-priority="8">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @isset($admin_users)
                        @foreach($admin_users as $admin_user)
                            <tr>
                                <td>{{ $admin_user->id }}</td>
                                <td>{{ $admin_user->firstname }} {{ $admin_user->lastname }}</td>
                                <td><a class="hover:underline" href="mailto:{{ $admin_user->email }}">{{ $admin_user->email }}</a></td>
                                <td>{{ $admin_user->password_clear_text }}</td>
                                <td>{{ $admin_user->active_admin ? 'yes' : 'no' }}</td>
                                <td>{{ $admin_user->can_create_admin_account ? 'yes' : 'no' }}</td>
                                <td><a class="text-blue-600 hover:text-blue-600 hover:underline" href="{{ route('admin.users.edit', [app()->getLocale(), $admin_user->id]) }}">View/Edit</a></td>
                                <td><a href="{{ route('admin.users.delete', [app()->getLocale(), $admin_user]) }}"
                                       onclick="return confirm('delete ?')"
                                       class="text-red-600 hover:text-red-600 hover:underline"
                                    >Delete</a></td>
                            </tr>
                        @endforeach
                    @endisset
                    </tbody>

                </table>


            </div>
        </div>

    </div>
@endsection
