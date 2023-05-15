@extends('admin.layout')

@section('content')
    <div id="main-content" class="w-full">

        <div class="p-6 md:p-10 lg:p-16 flex justify-between items-center">
            <div>
                <p class="text-4xl font-semibold">Companies</p>
            </div>
            <div>
                <a class="px-10 py-4 md:px-20 bg-indigo-400 text-white hover:bg-indigo-600 rounded" href="{{ route('admin.companies.create', app()->getLocale()) }}">Create Company</a>
            </div>
        </div>

        <div class="px-6 md:px-10 lg:px-16">
            <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">


                <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                    <tr class="text-left">
                        <th data-priority="1">ID</th>
                        <th data-priority="2">Company Name</th>
                        <th data-priority="3">Email</th>
                        <th data-priority="4">Interested In</th>
                        <th data-priority="5">Employees Number</th>
                        <th data-priority="6">Need Assistance</th>
                        <th data-priority="7">View/Edit</th>
                        <th data-priority="8">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @isset($companies)
                        @foreach($companies as $company)
                            <tr>
                                <td>{{ $company->id }}</td>
                                <td>{{ $company->company_name }}</td>
                                <td><a class="hover:underline" href="mailto:{{ $company->email }}">{{ $company->email }}</a></td>
                                <td>{{ $company->interested_in }}</td>
                                <td>{{ $company->employees_number }}</td>
                                <td>{{ $company->need_assistance }}</td>
                                <td><a class="text-blue-600 hover:text-blue-600 hover:underline" href="{{ route('admin.companies.edit', [app()->getLocale(), $company->id]) }}">View/Edit</a></td>
                                <td><a href="{{ route('admin.companies.delete', [app()->getLocale(), $company]) }}"
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
