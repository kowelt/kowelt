@extends('admin.layout')

@section('content')
    <div id="main-content" class="w-full flex-1">

        <div class="p-6 md:p-10 lg:p-16 flex justify-between items-center">
            <div>
                <p class="text-4xl font-semibold">Create Offer</p>
            </div>
        </div>

        <div class="px-6 md:px-10 lg:px-16">

            <form class="p-6 container mx-auto" action="{{ route('admin.offers.store', app()->getLocale()) }}" method="POST">
                @csrf
                <div>
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Offer Information</h3>
                            </div>
                        </div>
                        <div class="mt-5 md:col-span-2 md:mt-0">
                            @if ($errors->any())
                                <div class="bg-red-200 py-3 text-center text-black">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li class="flex justify-center items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                                    <path fill-rule="evenodd" d="M2 10a.75.75 0 01.75-.75h12.59l-2.1-1.95a.75.75 0 111.02-1.1l3.5 3.25a.75.75 0 010 1.1l-3.5 3.25a.75.75 0 11-1.02-1.1l2.1-1.95H2.75A.75.75 0 012 10z" clip-rule="evenodd" />
                                                </svg>
                                                {{ $error }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="overflow-hidden shadow sm:rounded-md">
                                <div class="bg-white px-4 py-5 sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="company_id" class="block text-sm font-medium text-gray-700">Company</label>
                                            <select id="company_id" name="company_id" autocomplete="company_id" required class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                                <option value="" disabled selected>Please select a company</option>
                                                @isset($companies)
                                                    @foreach($companies as $company)
                                                        <option value="{{ $company->id }}" @if(old('company_id') == $company->id) selected @endif>{{ $company->company_name }}</option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                        </div>

                                        <div class="col-span-6">
                                            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                                            <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder="Title" autocomplete="title" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        </div>

                                        <div class="col-span-6">
                                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                            <div class="mt-1">
                                                <textarea id="description" name="description" rows="15" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="About your offer">{{ old('description') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="hidden sm:block" aria-hidden="true">
                    <div class="py-5">
                        <div class="border-t border-gray-200"></div>
                    </div>
                </div>

                <div class="flex justify-end gap-5">
                    <button class="px-10 py-3 text-white bg-indigo-400 hover:bg-indigo-600 rounded" type="submit">Create</button>
                    <a class="px-10 py-3 text-white border border-black text-black hover:bg-black hover:text-white rounded" href="{{ route('admin.offers', app()->getLocale()) }}">Cancel</a>
                </div>
            </form>

            <br>
            <br>

        </div>

    </div>
@endsection
