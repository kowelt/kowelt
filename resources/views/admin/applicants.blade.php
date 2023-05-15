@extends('admin.layout')

@section('content')
    <div id="main-content" class="w-full">

        <div class="p-6 md:p-10 lg:p-16 flex justify-between items-center">
            <div>
                <p class="text-4xl font-semibold">Applicants</p>
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
                        <th data-priority="4">Date Of Birth</th>
                        <th data-priority="5">Gender</th>
                        <th data-priority="6">CV Received ?</th>
                        <th data-priority="7">View CV</th>
                        <th data-priority="8">View/Edit</th>
                        <th data-priority="9">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @isset($applicants)
                        @foreach($applicants as $applicant)
                            <tr>
                                <td>{{ $applicant->id }}</td>
                                <td>{{ $applicant->firstname }} {{ $applicant->lastname }}</td>
                                <td><a class="hover:underline" href="mailto:{{ $applicant->email }}">{{ $applicant->email }}</a></td>
                                <td>{{ date('d M Y', strtotime($applicant->date_of_birth)) }}</td>
                                <td>@if($applicant->gender == '1') Male @elseif($applicant->gender == '2') Female @else Divers @endif</td>
                                <td>{{ isset($applicant->cv_received_by_admin) ? 'Yes' : 'No' }}</td>
                                <td>@if(isset($applicant->curriculum_vitae->id))
                                        <a class="hover:underline" href="{{ route('admin.cv.view', [app()->getLocale(), $applicant->curriculum_vitae->id]) }}">View CV</a>
                                    @else
                                        No CV
                                    @endif
                                </td>
                                <td><a class="text-blue-600 hover:text-blue-600 hover:underline" href="{{ route('admin.applicant.edit', [app()->getLocale(), $applicant->id]) }}">View/Edit</a></td>
                                <td><a href="{{ route('admin.applicant.delete', [app()->getLocale(), $applicant]) }}"
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
