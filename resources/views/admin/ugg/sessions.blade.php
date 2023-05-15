@extends('admin.layout')

@section('content')
    <div id="main-content" class="w-full">

        <div class="p-6 md:p-10 lg:p-16 flex justify-between items-center">
            <div>
                <p class="text-4xl font-semibold">Sessions</p>
            </div>
            <div>
                <a class="px-10 py-4 md:px-20 bg-indigo-400 text-white hover:bg-indigo-600 rounded"
                   href="{{ route('admin.ugg.sessions.create', app()->getLocale()) }}">Create Session</a>
            </div>
        </div>

        <div class="px-6 md:px-10 lg:px-16">
            <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                    <tr class="text-left">
                        <th data-priority="1">ID</th>
                        <th data-priority="3">Name DE</th>
                        <th data-priority="3">Name EN</th>
                        <th data-priority="3">Name FR</th>
                        <th data-priority="3">Active</th>
                        <th data-priority="8">View/Edit</th>
                        <th data-priority="9">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @isset($ugg_sessions)
                        @foreach($ugg_sessions as $ugg_session)
                            <tr>
                                <td>{{ $ugg_session->id }}</td>
                                <td>{{ $ugg_session->name_en }}</td>
                                <td>{{ $ugg_session->name_de }}</td>
                                <td>{{ $ugg_session->name_fr }}</td>
                                <td>{{ $ugg_session->active ? 'Yes' : 'No' }}</td>
                                <td><a class="text-blue-600 hover:text-blue-600 hover:underline" href="{{ route('admin.ugg.sessions.edit', [app()->getLocale(), $ugg_session->id]) }}">View/Edit</a></td>
                                <td><a href="{{ route('admin.ugg.sessions.delete', [app()->getLocale(), $ugg_session]) }}"
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
