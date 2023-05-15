@extends('admin.layout')

@section('content')
    <div id="main-content" class="w-full flex-1">

        <div class="p-6 md:p-10 lg:p-16 flex justify-between items-center">
            <div>
                <p class="text-4xl font-semibold">CVs</p>
            </div>
        </div>

        <div class="px-6 md:px-10 lg:px-16">
            <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                    <tr class="text-left">
                        <th data-priority="1">Id</th>
                        <th data-priority="2">Name</th>
                        <th data-priority="3">Nationality</th>
                        <th data-priority="4">E-Mail</th>
                        <th data-priority="6">View</th>
                    </tr>
                    </thead>
                    <tbody>
                    @isset($curriculum_vitaes)
                        @foreach($curriculum_vitaes as $curriculum_vitae)
                            <tr>
                                <td>{{ $curriculum_vitae->id }}</td>
                                <td>{{ $curriculum_vitae->user->firstname }} {{ $curriculum_vitae->user->lastname }}</td>
                                <td>{{ config('countries_list_en.' . $curriculum_vitae->nationality) }}</td>
                                <td><a class="hover:underline" href="mailto:{{ $curriculum_vitae->user->email }}">{{ $curriculum_vitae->user->email }}</a></td>
                                <td><a class="text-blue-600 hover:text-blue-600 hover:underline" href="{{ route('admin.cv.view', [app()->getLocale(), $curriculum_vitae->id]) }}">View</a></td>
                            </tr>
                        @endforeach
                    @endisset
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
