@extends('admin.layout')

@section('content')
    <div id="main-content" class="w-full flex-1">

        <div class="p-6 md:p-10 lg:p-16 flex justify-between items-center">
            <div>
                <p class="text-4xl font-semibold">View (User: {{ $ugg_form->user->firstname . ' ' . $ugg_form->user->lastname }} | Status: {{ config('status_list_' . app()->getLocale() . '.' . $ugg_form->user->status) }})</p>
                <small></small>
            </div>
        </div>

        <div class="px-6 md:px-10 lg:px-16">

            <div class="p-6 max-w-6xl mx-auto">
                <div class="bg-white p-3 mb-4">
                    @isset($ugg_form->user->documents)
                        <div class="font-bold">Extra Documents</div>
                        @foreach($ugg_form->user->documents->where('document_name', 'pdf_documents')->values() as $document)
                            <div class="mt-3">
                                <p class="font-semibold">PDF Document</p>
                                <div class="flex justify-between items-center py-8 px-5 rounded-lg bg-gray-100 shadow w-full">
                                    <div class="break-words overflow-hidden">
                                        {{ $document->filename }}
                                    </div>
                                    <div class="flex items-center">
                                        <div>
                                            <a href="{{ asset($document->path) }}" download
                                               class="text-blue-500"
                                            >
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 hover:scale-110">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @foreach($ugg_form->user->documents->where('document_name', 'payment_receipts')->values() as $document)
                            <div class="mt-3">
                                <p class="font-semibold">Payment receipt</p>
                                <div class="flex justify-between items-center py-8 px-5 rounded-lg bg-gray-100 shadow w-full">
                                    <div class="break-words overflow-hidden">
                                        {{ $document->filename }}
                                    </div>
                                    <div class="flex items-center">
                                        <div>
                                            <a href="{{ asset($document->path) }}" download
                                               class="text-blue-500"
                                            >
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 hover:scale-110">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endisset
                </div>
                <div class="accordion" id="accordionExample5">
                    <div class="accordion-item bg-white border border-gray-200">
                        <h2 class="accordion-header mb-0" id="headingOne5">
                            <button class="
        accordion-button
        relative
        flex
        items-center
        w-full
        py-6
        px-5
        text-base text-gray-800 text-left text-xl @if($section_2 == 'verify' || $errors->any()) text-blue-600 @endif
        bg-white
        border-0
        rounded-none
        transition
        focus:outline-none
      " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne5" aria-expanded="true"
                                    aria-controls="collapseOne5">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                                </svg>
{{--                                Dinformations du/de la Postulant(e)--}}
                                                        {{ __('account.personal_information') }}
                            </button>
                        </h2>
                        <div id="collapseOne5" class="accordion-collapse collapse show" aria-labelledby="headingOne5">
                            <div class="accordion-body py-4 px-5">
                                @include('ugg.pages_content.form_content._01-personal-information')
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item bg-white border border-gray-200">
                        <h2 class="accordion-header mb-0" id="headingTwo5">
                            <button class="
        accordion-button
        collapsed
        relative
        flex
        items-center
        w-full
        py-6
        px-5
        text-base text-gray-800 text-left text-xl @if($section_2 == 'verify' || $errors->any()) text-blue-600 @endif
        bg-white
        border-0
        rounded-none
        transition
        focus:outline-none
      " type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo5" aria-expanded="{{ ($section_2 == 'verify' || $errors->any()) ? 'true' : 'false' }}"
                                    aria-controls="collapseTwo5">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                                </svg>
                                {{ __('account.formation_et_qualification') }}
                            </button>
                        </h2>
                        <div id="collapseTwo5" class="accordion-collapse collapse @if($section_2 == 'verify' || $errors->any()) show @endif" aria-labelledby="headingTwo5">
                            <div class="accordion-body py-4 px-5">
                                @include('ugg.pages_content.form_content._02-formation-et-qualification')
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item bg-white border border-gray-200">
                        <h2 class="accordion-header mb-0" id="headingThree5">
                            <button class="
        accordion-button
        collapsed
        relative
        flex
        items-center
        w-full
        py-6
        px-5
        text-base text-gray-800 text-left text-xl @if($section_2 == 'verify' || $errors->any()) text-blue-600 @endif
        bg-white
        border-0
        rounded-none
        transition
        focus:outline-none
      " type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree5" aria-expanded="{{ ($section_2 == 'verify' || $errors->any()) ? 'true' : 'false' }}"
                                    aria-controls="collapseThree5">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z" />
                                </svg>
                                {{ __('account.Experiences_Professionnelles') }}
                            </button>
                        </h2>
                        <div id="collapseThree5" class="accordion-collapse collapse @if($section_2 == 'verify' || $errors->any()) show @endif" aria-labelledby="headingThree5">
                            <div class="accordion-body py-4 px-5">
                                @include('ugg.pages_content.form_content._03-experiences-professionnelles')
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item bg-white border border-gray-200">
                        <h2 class="accordion-header mb-0" id="headingThree6">
                            <button class="
        accordion-button
        collapsed
        relative
        flex
        items-center
        w-full
        py-6
        px-5
        text-base text-gray-800 text-left text-xl @if($section_2 == 'verify') text-blue-600 @endif
        bg-white
        border-0
        rounded-none
        transition
        focus:outline-none
      " type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree6" aria-expanded="{{ $section_2 == 'verify' ? 'true' : 'false' }}"
                                    aria-controls="collapseThree6">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.042 21.672L13.684 16.6m0 0l-2.51 2.225.569-9.47 5.227 7.917-3.286-.672zM12 2.25V4.5m5.834.166l-1.591 1.591M20.25 10.5H18M7.757 14.743l-1.59 1.59M6 10.5H3.75m4.007-4.243l-1.59-1.59" />
                                </svg>
                                {{ __('account.Compétences') }}
                            </button>
                        </h2>
                        <div id="collapseThree6" class="accordion-collapse collapse @if($section_2 == 'verify') show @endif" aria-labelledby="headingThree6">
                            <div class="accordion-body py-4 px-5">
                                @include('ugg.pages_content.form_content._04-competences')
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item bg-white border border-gray-200">
                        <h2 class="accordion-header mb-0" id="headingThree7">
                            <button class="
        accordion-button
        collapsed
        relative
        flex
        items-center
        w-full
        py-6
        px-5
        text-base text-gray-800 text-left text-xl @if($section_2 == 'verify') text-blue-600 @endif
        bg-white
        border-0
        rounded-none
        transition
        focus:outline-none
      " type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree7" aria-expanded="{{ $section_2 == 'verify' ? 'true' : 'false' }}"
                                    aria-controls="collapseThree7">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 21l5.25-11.25L21 21m-9-3h7.5M3 5.621a48.474 48.474 0 016-.371m0 0c1.12 0 2.233.038 3.334.114M9 5.25V3m3.334 2.364C11.176 10.658 7.69 15.08 3 17.502m9.334-12.138c.896.061 1.785.147 2.666.257m-4.589 8.495a18.023 18.023 0 01-3.827-5.802" />
                                </svg>
                                {{ __('account.Langues') }}
                            </button>
                        </h2>
                        <div id="collapseThree7" class="accordion-collapse collapse @if($section_2 == 'verify') show @endif" aria-labelledby="headingThree7">
                            <div class="accordion-body py-4 px-5">
                                @include('ugg.pages_content.form_content._05-langues')
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item bg-white border border-gray-200">
                        <h2 class="accordion-header mb-0" id="headingThree8">
                            <button class="
        accordion-button
        collapsed
        relative
        flex
        items-center
        w-full
        py-6
        px-5
        text-base text-gray-800 text-left text-xl @if($section_2 == 'verify') text-blue-600 @endif
        bg-white
        border-0
        rounded-none
        transition
        focus:outline-none
      " type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree8" aria-expanded="{{ $section_2 == 'verify' ? 'true' : 'false' }}"
                                    aria-controls="collapseThree8">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.893 13.393l-1.135-1.135a2.252 2.252 0 01-.421-.585l-1.08-2.16a.414.414 0 00-.663-.107.827.827 0 01-.812.21l-1.273-.363a.89.89 0 00-.738 1.595l.587.39c.59.395.674 1.23.172 1.732l-.2.2c-.212.212-.33.498-.33.796v.41c0 .409-.11.809-.32 1.158l-1.315 2.191a2.11 2.11 0 01-1.81 1.025 1.055 1.055 0 01-1.055-1.055v-1.172c0-.92-.56-1.747-1.414-2.089l-.655-.261a2.25 2.25 0 01-1.383-2.46l.007-.042a2.25 2.25 0 01.29-.787l.09-.15a2.25 2.25 0 012.37-1.048l1.178.236a1.125 1.125 0 001.302-.795l.208-.73a1.125 1.125 0 00-.578-1.315l-.665-.332-.091.091a2.25 2.25 0 01-1.591.659h-.18c-.249 0-.487.1-.662.274a.931.931 0 01-1.458-1.137l1.411-2.353a2.25 2.25 0 00.286-.76m11.928 9.869A9 9 0 008.965 3.525m11.928 9.868A9 9 0 118.965 3.525" />
                                </svg>
                                {{ __('account.Centres_interet') }}
                            </button>
                        </h2>
                        <div id="collapseThree8" class="accordion-collapse collapse @if($section_2 == 'verify') show @endif" aria-labelledby="headingThree8">
                            <div class="accordion-body py-4 px-5">
                                @include('ugg.pages_content.form_content._06-centres-interet')
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item bg-white border border-gray-200">
                        <h2 class="accordion-header mb-0" id="headingThree9">
                            <button class="
        accordion-button
        collapsed
        relative
        flex
        items-center
        w-full
        py-6
        px-5
        text-base text-gray-800 text-left text-xl @if($section_2 == 'verify' || $errors->any()) text-blue-600 @endif
        bg-white
        border-0
        rounded-none
        transition
        focus:outline-none
      " type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree9" aria-expanded="{{ $section_2 == 'verify' ? 'true' : 'false' }}"
                                    aria-controls="collapseThree9">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                                </svg>
                                Documents
                            </button>
                        </h2>
                        <div id="collapseThree9" class="accordion-collapse collapse @if($section_2 == 'verify' || $errors->any()) show @endif" aria-labelledby="headingThree9">
                            <div class="accordion-body py-4 px-5">
                                @include('ugg.pages_content.form_content._07-documents')
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-between gap-5 mt-5">
                    <div>
                        <a class="px-10 py-3 border border-black text-black hover:bg-black hover:text-white rounded" href="{{ route('admin.ugg.form', app()->getLocale()) }}">Back</a>
                        <a class="px-10 py-3 border border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white cursor-pointer rounded"
                           data-bs-toggle="modal"
                           data-bs-target="#exampleModalCenterStatus"
                        >Edit Status</a>
                        @if($user->pdf_path)
                            <a class="px-10 py-3 border border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white cursor-pointer rounded"
                               href="{{ route('admin.ugg.regenerate.pdf', [app()->getLocale(), $ugg_form->id]) }}"
                            >Regenerate PDF</a>
                        @endif
                    </div>
                    <div>
                        @if($user->status == 'in_process')
                            <a onclick="return confirm('Are you sure?')" class="px-10 py-3 border border-red-600 text-red-600 hover:bg-red-600 hover:text-white rounded" href="{{ route('admin.ugg.set.status', [app()->getLocale(), $user->id, 'not_selected_second_phase']) }}">Reject</a>
                            <a onclick="return confirm('Are you sure?')" class="px-10 py-3 border border-green-600 text-green-600 hover:bg-green-600 hover:text-white rounded" href="{{ route('admin.ugg.set.status', [app()->getLocale(), $user->id, 'selected_second_phase']) }}">Validate</a>
                        @endif
                        @if($user->status == 'documents_under_verification')
                            <a onclick="return confirm('Are you sure?')" class="px-10 py-3 border border-red-600 text-red-600 hover:bg-red-600 hover:text-white rounded" href="{{ route('admin.ugg.set.status', [app()->getLocale(), $user->id, 'rejected']) }}">Reject</a>
                            <a onclick="return confirm('Are you sure?')" class="px-10 py-3 border border-green-600 text-green-600 hover:bg-green-600 hover:text-white rounded" href="{{ route('admin.ugg.set.status', [app()->getLocale(), $user->id, 'registered_for_the_exam']) }}">Registered for the exam</a>
                        @endif
                        @if($user->status == 'registered_for_the_exam')
                            <a class="px-10 py-3 border border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white cursor-pointer rounded"
                                    data-bs-toggle="modal"
                                    data-bs-target="#exampleModalCenter"
                            >Notate</a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Modal Notate -->
            <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true" role="dialog">
                <div class="modal-dialog modal-dialog-centered relative w-auto pointer-events-none">
                    <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                        <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                            <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalScrollableLabel">
                                Name: {{ $ugg_form->user->firstname . ' ' . $ugg_form->user->lastname }}
                            </h5>
                            <button type="button"
                                    class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                                    data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('admin.ugg.set.note', [app()->getLocale(), $user->id]) }}" method="POST">
                        <div class="modal-body relative p-4">
                            @csrf
                            <div class="grid grid-cols-6 gap-5">
                                <div class="col-span-6">
                                    <label for="note" class="block text-sm font-medium text-gray-700">Note</label>
                                    <input type="number" name="note" id="note"
                                           value="{{ old('note') }}" max="20" step=".01" required
                                           class="mt-1 @error('note') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
                                </div>
                                <div class="col-span-6">
                                    <label for="selected" class="block text-sm font-medium text-gray-700">Selected?</label>
                                    <select id="selected" name="selected" required
                                            class="mt-1 @error('selected') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror"
                                    >
                                        <option value="" selected disabled>Please select...</option>
                                        <option value="1" @if(old('selected') == '1') selected @endif>Yes</option>
                                        <option value="0" @if(old('selected') == '0') selected @endif>No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div
                            class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                            <a type="button"
                                    class="inline-block px-6 py-1.5 border border-black text-black hover:bg-black hover:text-white rounded cursor-pointer"
                                    data-bs-dismiss="modal"
                            >Cancel</a>
                            <button type="submit"
                               class="inline-block px-6 py-1.5 border border-green-600 text-green-600 hover:bg-green-600 hover:text-white rounded ml-1"
                            >Save</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal Edit Status -->
            <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="exampleModalCenterStatus" tabindex="-1" aria-labelledby="exampleModalCenterStatusTitle" aria-modal="true" role="dialog">
                <div class="modal-dialog modal-dialog-centered relative w-auto pointer-events-none">
                    <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                        <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                            <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalScrollableLabel">
                                Name: {{ $ugg_form->user->firstname . ' ' . $ugg_form->user->lastname }}
                            </h5>
                            <button type="button"
                                    class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                                    data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('admin.ugg.change.status', [app()->getLocale(), $user->id]) }}" method="POST">
                            <div class="modal-body relative p-4">
                                @csrf
                                <div class="grid grid-cols-6 gap-5">
                                    <div class="col-span-6">
                                        <label for="status" class="block text-sm font-medium text-gray-700">Select status</label>
                                        <select id="status" name="status" required
                                                class="mt-1 @error('status') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror"
                                        >
                                            <option value="" selected disabled>Please select...</option>
                                            @foreach(config('status_list_' . app()->getLocale()) as $key => $status)
                                                <option value="{{ $key }}" @if(old('status') == $key) selected @endif>{{ $status }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                                <a type="button"
                                   class="inline-block px-6 py-1.5 border border-black text-black hover:bg-black hover:text-white rounded cursor-pointer"
                                   data-bs-dismiss="modal"
                                >Cancel</a>
                                <button type="submit"
                                        class="inline-block px-6 py-1.5 border border-green-600 text-green-600 hover:bg-green-600 hover:text-white rounded ml-1"
                                >Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <br>
            <br>

        </div>

    </div>
@endsection
