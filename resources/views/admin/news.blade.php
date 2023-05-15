@extends('admin.layout')

@section('content')
    <div id="main-content" class="w-full">

        <div class="p-6 md:p-10 lg:p-16 flex justify-between items-center">
            <div>
                <p class="text-4xl font-semibold">News</p>
            </div>
            <div>
                <a class="px-10 py-4 md:px-20 bg-indigo-400 text-white hover:bg-indigo-600 rounded" href="{{ route('admin.news.create', app()->getLocale()) }}">Create News</a>
            </div>
        </div>

        <div class="px-6 md:px-10 lg:px-16">
            <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                    <tr class="text-left">
                        <th data-priority="1">ID</th>
                        <th data-priority="2">Title</th>
                        <th data-priority="3">Image</th>
                        <th data-priority="3">PDF DE</th>
                        <th data-priority="3">PDF EN</th>
                        <th data-priority="3">PDF FR</th>
                        <th data-priority="3">Active</th>
                        <th data-priority="8">View/Edit</th>
                        <th data-priority="9">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @isset($news)
                        @foreach($news as $new)
                            <tr>
                                <td>{{ $new->id }}</td>
                                <td>{{ $new->title_de }}</td>
                                <td>@if(isset($new->picture->path)) <a target="_blank" href="{{ asset($new->picture->path) }}" class="hover:underline">View Image</a> @else No Image @endif</td>
                                <td>@if($new->documents->where('language', 'de')->first()) <a target="_blank" href="{{ asset($new->documents->where('language', 'de')->first()->path) }}" class="hover:underline">View PDF</a> @else No PDF @endif</td>
                                <td>@if($new->documents->where('language', 'en')->first()) <a target="_blank" href="{{ asset($new->documents->where('language', 'en')->first()->path) }}" class="hover:underline">View PDF</a> @else No PDF @endif</td>
                                <td>@if($new->documents->where('language', 'fr')->first()) <a target="_blank" href="{{ asset($new->documents->where('language', 'fr')->first()->path) }}" class="hover:underline">View PDF</a> @else No PDF @endif</td>
                                <td>{{ $new->active ? 'Yes' : 'No' }}</td>
                                <td><a class="text-blue-600 hover:text-blue-600 hover:underline" href="{{ route('admin.news.edit', [app()->getLocale(), $new->id]) }}">View/Edit</a></td>
                                <td><a href="{{ route('admin.news.delete', [app()->getLocale(), $new]) }}"
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
