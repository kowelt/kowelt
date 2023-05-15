@extends('admin.layout')

@section('content')
    <div id="main-content" class="w-full flex-1">

        <div class="p-6 md:p-10 lg:p-16 flex justify-between items-center">
            <div>
                <p class="text-4xl font-semibold">KODREAMS CVs</p>
            </div>
        </div>

        <div class="px-6 md:px-10 lg:px-16">
            <form action="{{ route('admin.ugg.form.set.search', app()->getLocale()) }}" method="POST">
                @csrf
                <div class="grid grid-cols-5 gap-6">
                    <div class="col-span-5 sm:col-span-1">
                        <label for="session" class="block text-sm font-medium text-gray-700">Session<span class="text-red-500">*</span></label>
                        <select onchange="this.form.submit()" id="session" name="session" required
                                class="mt-1 @error('session') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
                            <option value="all" @if($session == 'all') selected @endif>All</option>
                            @isset($ugg_sessions[0])
                                @foreach($ugg_sessions as $ugg_session)
                                    <option value="{{ $ugg_session->id }}" @if($session == $ugg_session->id) selected @endif>
                                        {{ $ugg_session->{'name_' . app()->getLocale()} }}
                                    </option>
                                @endforeach
                            @endisset
                        </select>
                    </div>

                    <div class="col-span-5 sm:col-span-1">
                        <label for="city" class="block text-sm font-medium text-gray-700">City<span class="text-red-500">*</span></label>
                        <select onchange="this.form.submit()" id="city" name="city" required
                                class="mt-1 @error('city') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
                            <option value="all" @if($city == 'all') selected @endif>All</option>
                            @isset($cities[0])
                                @foreach($cities as $city_item)
                                    <option value="{{ $city_item->id }}" @if($city == $city_item->id) selected @endif>
                                        {{ $city_item->{'name_' . app()->getLocale()} }}
                                    </option>
                                @endforeach
                            @endisset
                        </select>
                    </div>

                    <div class="col-span-5 sm:col-span-1">
                        <label for="status" class="block text-sm font-medium text-gray-700">Candidate status<span class="text-red-500">*</span></label>
                        <select onchange="this.form.submit()" id="status" name="status" required
                                class="mt-1 @error('status') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
                            <option value="all" @if($status == 'all') selected @endif>All</option>
                            @foreach(config('status_list_' . app()->getLocale()) as $key => $status_loop)
                                <option value="{{ $key }}" @if($status == $key) selected @endif>{{ $status_loop }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-span-5 sm:col-span-1">
                        <label for="exam_language" class="block text-sm font-medium text-gray-700">Exam language<span class="text-red-500">*</span></label>
                        <select onchange="this.form.submit()" id="exam_language" name="exam_language" required
                                class="mt-1 @error('exam_language') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
                            <option value="all" @if($exam_language == 'all') selected @endif>All</option>
                            <option value="fr" @if($exam_language == 'fr') selected @endif>{{ str_replace("French - français", "Français", config('languages_list.fr')) }}</option>
                            <option value="en" @if($exam_language == 'en') selected @endif>{{ config('languages_list.en') }}</option>
                        </select>
                    </div>

                    <div class="col-span-5 sm:col-span-1">
                        <label for="gender" class="block text-sm font-medium text-gray-700">Gender<span class="text-red-500">*</span></label>
                        <select onchange="this.form.submit()" id="gender" name="gender" required
                                class="mt-1 @error('gender') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
                            <option value="all" @if($gender == 'all') selected @endif>All</option>
                            <option value="1" @if($gender == '1') selected @endif>{{ __('account.homme') }}</option>
                            <option value="2" @if($gender == '2') selected @endif>{{ __('account.femme') }}</option>
                            <option value="3" @if($gender == '3') selected @endif>{{ __('account.divers') }}</option>
                        </select>
                    </div>
                </div>
            </form>

            <br>

            <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                    <tr class="text-left">
{{--                        <th data-priority="1">Id</th>--}}
                        <th data-priority="1">Applicant number</th>
                        <th data-priority="1">Register Date</th>
                        <th data-priority="2">Name</th>
                        <th data-priority="3">Nationality</th>
                        <th data-priority="4">E-Mail</th>
                        <th data-priority="6">View</th>
                    </tr>
                    </thead>
                    <tbody>
                    @isset($ugg_forms)
                        @foreach($ugg_forms as $ugg_form)
                            <tr>
{{--                                <td>{{ $ugg_form->id }}</td>--}}
                                <td>{{ '38448' . str_pad($ugg_form->id, 3, '0', STR_PAD_LEFT) }}</td>
                                <td>{{ date('d.m.Y', strtotime($ugg_form->created_at)) }}</td>
                                <td>{{ $ugg_form->user->firstname }} {{ $ugg_form->user->lastname }}</td>
                                <td>{{ config('countries_list_en.' . $ugg_form->nationality) }}</td>
                                <td><a class="hover:underline" href="mailto:{{ $ugg_form->user->email }}">{{ $ugg_form->user->email }}</a></td>
                                <td><a class="text-blue-600 hover:text-blue-600 hover:underline" href="{{ route('admin.ugg.form.view', [app()->getLocale(), $ugg_form->id]) }}">View</a></td>
                            </tr>
                        @endforeach
                    @endisset
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
