@extends('layouts.app')
@section('content')
    <div class="bg-white pt-[80px]"></div>
    <div class="bg-white text-gray-800 mx-auto">
        <div class="mx-auto p-4">
            <div class="mx-auto mb-12">
                <div class="bg-[url('/resources/images/news_bg_k.jpg')] bg-cover h-60 relative flex justify-center">
                    <div class="flex flex-col gap-3 text-center pt-6">
                    </div>
                    <div class="flex gap-5 absolute xl:left-60 lg:left-40 md:left-20 -bottom-6 inline-flex h-40 break-words">
                        <div class="bg-[#26549A70] text-center rounded-sm shadow py-5 px-24 xl:px-40 flex items-center gap-x-2 text-green-600 break-words">
                            <p class="mt-2 font-bold break-words text-3xl text-white">{{ __('NEWS') }}</p>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <br>
                <div class="text-xl max-w-7xl mx-auto">
                    @isset($news)
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12 mx-4">
                            @foreach($news as $new)
                                <div class="border p-6 bg-gray-100">
                                    <div class="mb-4">
                                        <img class="h-52 mx-auto" src="{{ $new->picture->path }}" alt="sdfd">
                                    </div>
                                    <div>
                                        <div class="text-2xl mb-4 font-semibold text-center">
                                            {{ $new->{'title_' . app()->getLocale()} ?? $new->title_de }}
                                        </div>
                                        <div class="text-md text-center">
                                            {{ $new->{'description_' . app()->getLocale()} ?? $new->description_de }}
                                        </div>
                                        @isset($new->documents[0])
                                            @if($new->documents->where('language', app()->getLocale())->first() != null)
                                                <div class="text-center mt-4 text-[#64C193]">
                                                    <a target="_blank" href="{{ asset($new->documents->where('language', app()->getLocale())->first()->path) }}" class="hover:underline italic">{{ __('navigation.read_more') }}</a>
                                                </div>
                                            @endif
                                        @endisset
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <br>
                        <br>
                    @endisset
                    <div class="text-center mt-4 text-6xl">
                        {{ __('navigation.Stay_tuned') }}
                    </div>
                </div>

            </div>
            <br>
            <br>
            <br>
        </div>
    </div>
@endsection
