@extends('admin.layout')

@section('content')
    <div id="main-content" class="w-full">

        <div class="p-6 md:p-10 lg:p-16 flex justify-between items-center">
            <div>
                <p class="text-4xl font-semibold">Cities</p>
            </div>
            <div>
                <a class="px-10 py-4 md:px-20 bg-indigo-400 text-white hover:bg-indigo-600 rounded"
                   href="{{ route('admin.ugg.cities.create', app()->getLocale()) }}">Create City</a>
            </div>
        </div>

        <div class="px-6 md:px-10 lg:px-16">
            <form action="{{ route('admin.ugg.cities.set.search', app()->getLocale()) }}" method="POST">
                @csrf
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <label for="ugg_session_id" class="block text-sm font-medium text-gray-700">Ugg session<span class="text-red-500">*</span></label>
                        <select onchange="this.form.submit()" id="ugg_session_id" name="ugg_session_id" required
                                class="mt-1 @error('ugg_session_id') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
                            <option value="all" @if($ugg_session_id == 'all') selected @endif>All</option>
                            @isset($ugg_sessions[0])
                                @foreach($ugg_sessions as $ugg_session)
                                    <option value="{{ $ugg_session->id }}" @if($ugg_session_id == $ugg_session->id) selected @endif>
                                        {{ $ugg_session->{'name_' . app()->getLocale()} }}
                                    </option>
                                @endforeach
                            @endisset
                        </select>
                    </div>
                </div>
            </form>

            <br>

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
                    @isset($ugg_cities)
                        @foreach($ugg_cities as $ugg_city)
                            <tr>
                                <td>{{ $ugg_city->id }}</td>
                                <td>{{ $ugg_city->name_en }}</td>
                                <td>{{ $ugg_city->name_de }}</td>
                                <td>{{ $ugg_city->name_fr }}</td>
                                <td>{{ $ugg_city->active ? 'Yes' : 'No' }}</td>
                                <td><a class="text-blue-600 hover:text-blue-600 hover:underline" href="{{ route('admin.ugg.cities.edit', [app()->getLocale(), $ugg_city->id]) }}">View/Edit</a></td>
                                <td><a href="{{ route('admin.ugg.cities.delete', [app()->getLocale(), $ugg_city]) }}"
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
