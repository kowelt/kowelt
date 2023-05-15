@extends('layouts.app')
@section('content')

@if (Session::has('success'))
    <div class="alert alert-success text-center">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <p>{{ Session::get('success') }}</p>
    </div>
@endif
    <div class="bg-white pt-[80px]"></div>
    <div class="bg-white text-gray-800 mx-auto font-notosans">
        <div class="container mx-auto p-4">
            <div class="max-w-7xl mx-auto mb-12">
                <div class="gradient-ugg-bg h-60 relative flex justify-center">
                    <div class="flex flex-col gap-3 text-center pt-6 items-center">
                        @if(isset($ugg_form->picture))
                            <div class="w-36 h-36 rounded-[50%] overflow-hidden bg-cover"
                                 style="background-image: url('{{ str_replace("\\", "/", asset($ugg_form->picture->path) ) }}')"
                            ></div>
                        @else
                            <div class="mx-auto">
                                <img id="profile_pic_2" class="max-h-36 rounded-full" src="https://ui-avatars.com/api/?name={{ Auth::user()->firstname }}+{{ Auth::user()->lastname }}&size=512" alt="{{ Auth::user()->firstname }}">
                            </div>
                        @endif

                        <div>
                            <p class="text-xl font-bold text-white">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</p>
                        </div>
                    </div>
                    <div class="flex gap-5 absolute -bottom-14 inline-flex">
                        @if($section == 'change-password')
                            <div class="bg-white text-center rounded-sm shadow py-5 px-10 flex items-center gap-x-2 text-green-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-10 mx-auto">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <p class="mt-2 font-semibold">{{ __('navigation.Change_your_password') }}</p>
                            </div>
                        @endif
                        @if($section == 'kodreams-form')
                            <div class="bg-white text-center rounded-sm shadow py-5 px-10 flex items-center gap-x-2 text-green-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-10 mx-auto">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>
                                <p class="mt-2 font-semibold">{{ __('navigation.Edit_CV') }}</p>
                            </div>
                        @endif
                        @if($section == 'home')
                            <div class="bg-white text-center rounded-sm shadow py-5 px-10 flex items-center gap-x-2 text-green-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-10 mx-auto">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                                </svg>
                                <p class="mt-2 font-semibold">{{ __('Dashboard') }}</p>
                            </div>
                        @endif
                        @if($section == 'upload-documents')
                            <div class="bg-white text-center rounded-sm shadow py-5 px-10 flex items-center gap-x-2 text-green-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-10 mx-auto">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                                </svg>
                                <p class="mt-2 font-semibold">{{ __('navigation.Upload_Documents') }}</p>
                            </div>
                        @endif
                    </div>
                </div>

                @if($section == 'change-password')
                    @include('ugg.pages_content._change-password')
                @endif

                @if($section == 'kodreams-form')
                    @include('ugg.pages_content._ugg-form')
                @endif

                @if($section == 'home')
                    @include('ugg.pages_content._home')
                @endif

                @if($section == 'upload-pdf')
                    @include('ugg.pages_content._upload_documents')
                @endif

            </div>
            <br>
            <br>
        </div>
    </div>
@endsection

@if($section == 'upload-pdf')
    @section('script')
        <script src="{{ asset('js/filepond/filepond-upload-file-v1.js') }}"></script>
    @endsection
@endif
