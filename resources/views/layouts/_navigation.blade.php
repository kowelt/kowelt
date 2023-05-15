@auth()
    @if(auth()->user()->role == 'applicant')
        @php($cv = \App\Models\CurriculumVitae::withAll()->where('user_id', \Illuminate\Support\Facades\Auth::id())->first())
    @elseif(auth()->user()->role == 'ugg')
        @php($cv = \App\Models\UggForm::withAll()->where('user_id', \Illuminate\Support\Facades\Auth::id())->first())
    @endif
@endauth
@guest()
    @php($cv = null)
@endguest

<nav id="header" class="fixed w-full z-30 top-0 text-white bg-white py-4 border-b border-2">
    <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 @guest() py-2 @endguest">
        <div class="flex items-center justify-between w-full">

            <div class="pl-4 flex items-center">
                <a class="mr-8" href="{{ route('welcome', app()->getLocale()) }}">
                    <img class="h-6 lg:h-8" alt="kowelt_logo" src="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/kowelt_logos/Logo_Transparent_HD_kopie.png') }}">
                </a>

                <a class="nav-link text-black no-underline hover:text-gray-800 hover:text-underline pt-2 px-3 uppercase hidden xl:inline-block hover:text-blue-900 font-medium" href="{{ route('welcome', app()->getLocale()) }}#">{{ __('navigation.accueil') }}</a>
                <a class="nav-link text-black no-underline hover:text-gray-800 hover:text-underline pt-2 px-3 uppercase hidden xl:inline-block hover:text-blue-900 font-medium" href="{{ route('welcome', app()->getLocale()) }}#about_us">{{ __('navigation.a_propos') }}</a>
                <a class="nav-link text-black no-underline hover:text-gray-800 hover:text-underline pt-2 px-3 uppercase hidden xl:inline-block hover:text-blue-900 font-medium" href="{{ route('welcome', app()->getLocale()) }}#service">{{ __('navigation.services') }}</a>
                <a class="nav-link text-black no-underline hover:text-gray-800 hover:text-underline pt-2 px-3 uppercase hidden xl:inline-block hover:text-blue-900 font-medium" href="{{ route('welcome', app()->getLocale()) }}#branche">{{ __('navigation.branches') }}</a>
                <a class="nav-link text-black no-underline hover:text-gray-800 hover:text-underline pt-2 px-3 uppercase hidden xl:inline-block hover:text-blue-900 font-medium" href="{{ route('welcome', app()->getLocale()) }}#contact">{{ __('navigation.contact') }}</a>
                <a class="nav-link text-black no-underline hover:text-gray-800 hover:text-underline pt-2 px-3 uppercase hidden xl:inline-block hover:text-blue-900 font-medium" href="{{ route('news', app()->getLocale()) }}">{{ __('navigation.News') }}</a>
            </div>
            <div class="pl-4 flex items-center hidden xl:block @auth mt-1 @endauth">
                @guest()
                    @if($navigation == 'kodreams')
                        <a href="{{ route('ugg.dashboard', app()->getLocale()) }}"
                           class="inline-flex justify-center gradient-ugg py-3 px-3 text-sm font-bold text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transform transition hover:scale-[1.01] duration-300 ease-in-out flex gap-x-1 items-center shadow-xl rounded"
{{--                           @if(date('d.m.Y') < config('app.kodream_start_date')) data-bs-toggle="modal" data-bs-target="#exampleModalCenter" @endif--}}
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="font-normal mr-1">{{ __('ugg.Espace_candidat') }}</span>
                        </a>
                    @elseif($navigation == 'ugg')
                        {{--<a class="nav-link text-[#004286] font-bold no-underline hover:text-gray-800 hover:text-underline pt-2 px-3 uppercase inline-block hover:text-blue-900 @if($navigation == 'ugg') text-blue-900 @endif" href="{{ route('ugg.kodreams', config('app.kodream_locale')) }}">Kodreams</a>--}}
                        <a class="nav-link font-bold no-underline text-white hover:text-underline py-1 px-3 uppercase inline-block gradient-ugg transform transition hover:scale-105 duration-300 ease-in-out uppercase rounded-full" href="{{ route('ugg.kodreams', config('app.kodream_locale')) }}" target="_blank">Kodreams</a>
                    @else
                        <a class="nav-link text-black no-underline hover:text-gray-800 hover:text-underline pt-2 px-3 uppercase inline-block hover:text-blue-900 font-medium @if($navigation == 'company') text-blue-900 @endif" href="{{ route('company', app()->getLocale()) }}">{{ __('navigation.pour_entreprise') }}</a>
                        <a class="cursor-pointer nav-link text-black no-underline hover:text-gray-800 hover:text-underline pt-2 px-3 uppercase inline-block hover:text-blue-900 font-medium @if($navigation == 'applicant') text-blue-900 @endif"
{{--                           href="{{ route('applicant.dashboard', app()->getLocale()) }}"--}}
                           data-bs-toggle="modal" data-bs-target="#exampleModalCenterApplicant"
                        >{{ __('navigation.pour_travailleur') }}</a>
                        <a class="nav-link font-bold no-underline text-white hover:text-underline py-1 px-3 uppercase inline-block gradient-ugg transform transition hover:scale-105 duration-300 ease-in-out uppercase rounded-full" href="{{ route('ugg.kodreams', config('app.kodream_locale')) }}" target="_blank">Kodreams</a>
                    @endif
                    {{--@if($navigation != 'kodreams')
                        <a class="nav-link text-[#004286] font-bold no-underline hover:text-gray-800 hover:text-underline pt-2 px-3 uppercase inline-block hover:text-blue-900 @if($navigation == 'ugg') text-blue-900 @endif" href="{{ route('ugg.kodreams', config('app.kodream_locale')) }}" target="_blank">Kodreams</a>
                    @endif--}}
                @endguest
                @auth()
                    <div id="toggleSelectAccountOption" class="nav-link inline-block hover:cursor-pointer pb-0 px-3 relative">
                        <a class="flex items-center">
                            <img id="profile_pic_nav_3" class="w-9 h-9 rounded-full mr-2 @if(!isset($cv->picture->path)) hidden @endif" src="@if(isset($cv->picture->path)) {{ asset($cv->picture->path) }} @endif" alt="Avatar of User">
                            <img id="profile_pic_nav_4" class="w-9 h-9 rounded-full mr-2 @if(isset($cv->picture->path)) hidden @endif" src="https://ui-avatars.com/api/?name={{ Auth::user()->firstname }}+{{ Auth::user()->lastname }}" alt="Avatar of User">
                            <span class="hidden md:inline-block text-black">{{ __('navigation.hi') }}, {{ Auth::user()->firstname }}</span>
                            <svg class="pl-2 h-2 text-black" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 129 129">
                                <g>
                                    <path d="m121.3,34.6c-1.6-1.6-4.2-1.6-5.8,0l-51,51.1-51.1-51.1c-1.6-1.6-4.2-1.6-5.8,0-1.6,1.6-1.6,4.2 0,5.8l53.9,53.9c0.8,0.8 1.8,1.2 2.9,1.2 1,0 2.1-0.4 2.9-1.2l53.9-53.9c1.7-1.6 1.7-4.2 0.1-5.8z"></path>
                                </g>
                            </svg>
                        </a>

                        <div class="absolute bg-white shadow-lg right-2 p-1 hidden pt-4" id="select_account_option">
                            <ul class="list-reset text-center">
                                @if(auth()->user()->role == 'applicant')
                                    <li><a href="{{ route('applicant.dashboard', [app()->getLocale(), 'home']) }}" class="px-4 py-2 block text-gray-900 hover:bg-[#295CA690] hover:text-white no-underline hover:no-underline">{{ __('Dashboard') }}</a></li>
                                    <li><a href="{{ route('applicant.dashboard', [app()->getLocale(), 'cv', 'cv-form']) }}" class="px-4 py-2 block text-gray-900 hover:bg-[#295CA690] hover:text-white no-underline hover:no-underline">{{ __('navigation.Edit_CV') }}</a></li>
                                    <li><a href="{{ route('applicant.dashboard', [app()->getLocale(), 'upload-documents']) }}" class="px-4 py-2 block text-gray-900 hover:bg-[#295CA690] hover:text-white no-underline hover:no-underline">{{ __('navigation.Upload_Documents') }}</a></li>
                                    <li><a href="{{ route('applicant.dashboard', [app()->getLocale(), 'account', 'change-password']) }}" class="px-4 py-2 block text-gray-900 hover:bg-[#295CA690] hover:text-white no-underline hover:no-underline">{{ __('navigation.Change_your_password') }}</a></li>
                                    <li>
                                        <hr class="border-t mx-2 border-gray-400">
                                    </li>
                                    <li><a href="{{ route('applicant.logout', app()->getLocale()) }}" class="px-4 py-2 block text-gray-900 hover:bg-red-500 hover:text-white no-underline hover:no-underline">{{ __('navigation.logout') }}</a></li>
                                @endif
                                @if(auth()->user()->role == 'ugg')
                                    <li><a href="{{ route('ugg.dashboard', [app()->getLocale(), 'home']) }}" class="px-4 py-2 block text-gray-900 hover:bg-[#295CA690] hover:text-white no-underline hover:no-underline">{{ __('Dashboard') }}</a></li>
                                    <li><a href="{{ route('ugg.dashboard', [app()->getLocale(), 'kodreams-form']) }}" class="px-4 py-2 block text-gray-900 hover:bg-[#295CA690] hover:text-white no-underline hover:no-underline">{{ __('navigation.Edit_CV') }}</a></li>
                                    {{--<li><a href="{{ route('ugg.dashboard', [app()->getLocale(), 'upload-documents']) }}" class="px-4 py-2 block text-gray-900 hover:bg-[#295CA690] hover:text-white no-underline hover:no-underline">{{ __('navigation.Upload_Documents') }}</a></li>--}}
                                    <li><a href="{{ route('ugg.dashboard', [app()->getLocale(), 'change-password']) }}" class="px-4 py-2 block text-gray-900 hover:bg-[#295CA690] hover:text-white no-underline hover:no-underline">{{ __('navigation.Change_your_password') }}</a></li>
                                    <li>
                                        <hr class="border-t mx-2 border-gray-400">
                                    </li>
                                    <li><a href="{{ route('ugg.logout', app()->getLocale()) }}" class="px-4 py-2 block text-gray-900 hover:bg-red-500 hover:text-white no-underline hover:no-underline">{{ __('navigation.logout') }}</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                @endauth
                <div id="toggleSelectFlag" class="nav-link inline-block hover:cursor-pointer pt-2 pb-0 px-3 relative @auth() pb-2 @endauth">
                    <a>
                        <img class="h-4 hover:shadow-md transform transition hover:scale-110 duration-300 ease-in-out" src="{{ \Illuminate\Support\Facades\Vite::asset(Config::get('languages')[App::getLocale()]) }}" alt="flag">
                    </a>

                    <div class="absolute bg-white shadow-lg right-2 p-1 hidden" id="select_flag">
                        @foreach (Config::get('languages') as $lang => $flag)
                            @if ($lang != App::getLocale())
                                <div class="mt-2">
                                    <a href="{{ $urlGenerator->toLanguage($lang) }}">
                                        <img class="h-4 hover:scale-105" src="{{ \Illuminate\Support\Facades\Vite::asset($flag) }}" alt="flag">
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Phone Mode Nav --}}
            <div class="block xl:hidden pr-4 flex items-center">

                {{-- Guest Kodreams Button --}}
                @guest()
                    @if($navigation == 'kodreams')
                        <a href="{{ route('ugg.dashboard', app()->getLocale()) }}"
                           class="inline-flex justify-center gradient-ugg py-2 px-2 text-sm font-bold text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transform transition duration-300 ease-in-out flex gap-x-1 items-center shadow-xl rounded"
{{--                           @if(date('d.m.Y') < config('app.kodream_start_date')) data-bs-toggle="modal" data-bs-target="#exampleModalCenter" @endif--}}
{{--                           data-bs-toggle="modal" data-bs-target="#exampleModalCenter"--}}
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="font-normal mr-1">{{ __('ugg.candidat') }}</span>
                        </a>
                    @endif
                @endguest

                {{-- Auth Menu --}}
                @auth()
                    <div id="toggleSelectAccountOption_2" class="nav-link inline-block hover:cursor-pointer pb-0 px-3 relative">
                        <a class="flex items-center">
                            <img id="profile_pic_nav_1" class="w-9 h-9 rounded-full mr-2 @if(!isset($cv->picture->path)) hidden @endif" src="@if(isset($cv->picture->path)) {{ asset($cv->picture->path) }} @endif" alt="Avatar of User">
                            <img id="profile_pic_nav_2" class="w-9 h-9 rounded-full mr-2 @if(isset($cv->picture->path)) hidden @endif" src="https://ui-avatars.com/api/?name={{ Auth::user()->firstname }}+{{ Auth::user()->lastname }}" alt="Avatar of User">
                            <svg class="pl-2 h-2 text-black" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 129 129">
                                <g>
                                    <path d="m121.3,34.6c-1.6-1.6-4.2-1.6-5.8,0l-51,51.1-51.1-51.1c-1.6-1.6-4.2-1.6-5.8,0-1.6,1.6-1.6,4.2 0,5.8l53.9,53.9c0.8,0.8 1.8,1.2 2.9,1.2 1,0 2.1-0.4 2.9-1.2l53.9-53.9c1.7-1.6 1.7-4.2 0.1-5.8z"></path>
                                </g>
                            </svg>
                        </a>

                        <div class="absolute bg-white shadow-lg right-2 p-1 hidden pt-4" id="select_account_option_2">
                            <ul class="list-reset text-center">
                                <li>
                                    <hr class="border-t mx-2 border-gray-400">
                                </li>
                                @if(auth()->user()->role == 'applicant')
                                    <li><a href="{{ route('applicant.dashboard', [app()->getLocale(), 'home']) }}" class="px-4 py-2 block text-gray-900 hover:bg-[#295CA690] hover:text-white no-underline hover:no-underline">{{ __('Dashboard') }}</a></li>
                                    <li>
                                        <hr class="border-t mx-2 border-gray-400">
                                    </li>
                                    <li><a href="{{ route('applicant.dashboard', [app()->getLocale(), 'cv', 'cv-form']) }}" class="px-4 py-2 block text-gray-900 hover:bg-[#295CA690] hover:text-white no-underline hover:no-underline">{{ __('navigation.Edit_CV') }}</a></li>
                                    <li>
                                        <hr class="border-t mx-2 border-gray-400">
                                    </li>
                                    <li><a href="{{ route('applicant.dashboard', [app()->getLocale(), 'upload-documents']) }}" class="px-4 py-2 block text-gray-900 hover:bg-[#295CA690] hover:text-white no-underline hover:no-underline">{{ __('navigation.Upload_Documents') }}</a></li>
                                    <li>
                                        <hr class="border-t mx-2 border-gray-400">
                                    </li>
                                    <li><a href="{{ route('applicant.dashboard', [app()->getLocale(), 'account', 'change-password']) }}" class="px-4 py-2 block text-gray-900 hover:bg-[#295CA690] hover:text-white no-underline hover:no-underline">{{ __('navigation.Change_your_password') }}</a></li>
                                    <li>
                                        <hr class="border-t mx-2 border-gray-400">
                                    </li>
                                    <li><a href="{{ route('applicant.logout', app()->getLocale()) }}" class="px-4 py-2 block text-gray-900 hover:bg-red-500 hover:text-white no-underline hover:no-underline">{{ __('navigation.logout') }}</a></li>
                                @endif
                                @if(auth()->user()->role == 'ugg')
                                    <li><a href="{{ route('ugg.dashboard', [app()->getLocale(), 'home']) }}" class="px-4 py-2 block text-gray-900 hover:bg-[#295CA690] hover:text-white no-underline hover:no-underline">{{ __('Dashboard') }}</a></li>
                                    <li>
                                        <hr class="border-t mx-2 border-gray-400">
                                    </li>
                                    <li><a href="{{ route('ugg.dashboard', [app()->getLocale(), 'kodreams-form']) }}" class="px-4 py-2 block text-gray-900 hover:bg-[#295CA690] hover:text-white no-underline hover:no-underline">{{ __('navigation.Edit_CV') }}</a></li>
                                    {{--<li>
                                        <hr class="border-t mx-2 border-gray-400">
                                    </li>
                                    <li><a href="{{ route('ugg.dashboard', [app()->getLocale(), 'upload-documents']) }}" class="px-4 py-2 block text-gray-900 hover:bg-[#295CA690] hover:text-white no-underline hover:no-underline">{{ __('navigation.Upload_Documents') }}</a></li>--}}
                                    <li>
                                        <hr class="border-t mx-2 border-gray-400">
                                    </li>
                                    <li><a href="{{ route('ugg.dashboard', [app()->getLocale(), 'change-password']) }}" class="px-4 py-2 block text-gray-900 hover:bg-[#295CA690] hover:text-white no-underline hover:no-underline">{{ __('navigation.Change_your_password') }}</a></li>
                                    <li>
                                        <hr class="border-t mx-2 border-gray-400">
                                    </li>
                                    <li><a href="{{ route('ugg.logout', app()->getLocale()) }}" class="px-4 py-2 block text-gray-900 hover:bg-red-500 hover:text-white no-underline hover:no-underline">{{ __('navigation.logout') }}</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                @endauth

                {{-- Language Flag --}}
                <div id="toggleSelectFlag_2" class="nav-link inline-block px-3 hover:cursor-pointer relative">
                    <a>
                        <img class="h-4 hover:scale-110 hover:shadow-md" src="{{ \Illuminate\Support\Facades\Vite::asset(Config::get('languages')[App::getLocale()]) }}" alt="flag">
                    </a>

                    <div class="absolute bg-white shadow-lg right-2 p-1 hidden" id="select_flag_2">
                        @foreach (Config::get('languages') as $lang => $flag)
                            @if ($lang != App::getLocale())
                                <div class="mt-2">
                                    <a href="{{ $urlGenerator->toLanguage($lang) }}">
                                        <img class="h-4 hover:scale-105" src="{{ \Illuminate\Support\Facades\Vite::asset($flag) }}" alt="flag">
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                {{-- Button To Toggle Burger Menu Navigation Mobile --}}
                <button id="nav-toggle" class="flex items-center p-1 text-gray-900 hover:text-gray-800 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                    <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>Menu</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                    </svg>
                </button>

            </div>
        </div>

        {{-- Burger Menu Navigation Mobile --}}
        <div class="w-full text-end flex-grow hidden mt-2 bg-white text-black p-4 z-20 xl:hidden" id="nav-content">
            <ul class="list-reset justify-end flex-1 items-center">
                <li class="mr-3">
                    <a class="nav-link-mobile nav-link inline-block text-black no-underline hover:text-gray-800 hover:text-underline py-2 px-4" href="{{ route('welcome', app()->getLocale()) }}#">{{ __('navigation.accueil') }}</a>
                </li>
                <li class="mr-3">
                    <a class="nav-link-mobile nav-link inline-block text-black no-underline hover:text-gray-800 hover:text-underline py-2 px-4" href="{{ route('welcome', app()->getLocale()) }}#about_us">{{ __('navigation.a_propos') }}</a>
                </li>
                <li class="mr-3">
                    <a class="nav-link-mobile nav-link inline-block text-black no-underline hover:text-gray-800 hover:text-underline py-2 px-4" href="{{ route('welcome', app()->getLocale()) }}#service">{{ __('navigation.services') }}</a>
                </li>
                <li class="mr-3">
                    <a class="nav-link-mobile nav-link inline-block text-black no-underline hover:text-gray-800 hover:text-underline py-2 px-4" href="{{ route('welcome', app()->getLocale()) }}#branche">{{ __('navigation.branches') }}</a>
                </li>
                <li class="mr-3">
                    <a class="nav-link-mobile nav-link inline-block text-black no-underline hover:text-gray-800 hover:text-underline py-2 px-4" href="{{ route('welcome', app()->getLocale()) }}#contact">{{ __('navigation.contact') }}</a>
                </li>
                <li class="mr-3">
                    <a class="nav-link-mobile nav-link inline-block text-black no-underline hover:text-gray-800 hover:text-underline py-2 px-4" href="{{ route('news', app()->getLocale()) }}">{{ __('navigation.News') }}</a>
                </li>

                <br>

                @guest()
{{--                    @if(!in_array($navigation, ['kodreams', 'ugg']))--}}
                    @if(!in_array($navigation, ['kodreams', 'ugg']))
                        <li class="mr-3">
                            <a class="nav-link-mobile nav-link inline-block text-black no-underline hover:text-gray-800 hover:text-underline py-2 px-4 @if($navigation == 'company') font-bold @endif" href="{{ route('company', app()->getLocale()) }}">{{ __('navigation.pour_entreprise') }}</a>
                        </li>
                        <li class="mr-3">
                            <a class="cursor-pointer nav-link-mobile nav-link inline-block text-black no-underline hover:text-gray-800 hover:text-underline py-2 px-4 @if($navigation == 'applicant') font-bold @endif"
{{--                               href="{{ route('applicant.dashboard', app()->getLocale()) }}"--}}
                               data-bs-toggle="modal" data-bs-target="#exampleModalCenterApplicant"
                            >{{ __('navigation.pour_travailleur') }}</a>
                        </li>
                        <li class="mr-3 mt-2">
                            {{--<a class="nav-link-mobile nav-link inline-block text-black no-underline hover:text-gray-800 hover:text-underline py-2 px-4 @if($navigation == 'ugg') font-bold @endif" href="{{ route('ugg.kodreams', config('app.kodream_locale')) }}" target="_blank">Kodreams</a>--}}
                            <a class="nav-link font-bold no-underline text-white hover:text-underline py-1 px-3 uppercase inline-block gradient-ugg transform transition hover:scale-105 duration-300 ease-in-out uppercase rounded-full" href="{{ route('ugg.kodreams', config('app.kodream_locale')) }}" target="_blank">Kodreams</a>
                        </li>
                    @endif
                    @if($navigation == 'ugg')
                        <li class="mr-3">
                            {{--<a class="nav-link-mobile nav-link inline-block text-black no-underline hover:text-gray-800 hover:text-underline py-2 px-4 @if($navigation == 'ugg') font-bold @endif" href="{{ route('ugg.kodreams', config('app.kodream_locale')) }}">Kodreams</a>--}}
                            <a class="nav-link font-bold no-underline text-white hover:text-underline py-1 px-3 uppercase inline-block gradient-ugg transform transition hover:scale-105 duration-300 ease-in-out uppercase rounded-full" href="{{ route('ugg.kodreams', config('app.kodream_locale')) }}" target="_blank">Kodreams</a>
                        </li>
                    @endif
                @endguest
            </ul>
        </div>

    </div>
    <hr class="border-b border-gray-100 opacity-25 my-0 py-0" />

</nav>
@if(session('success'))
    <div id="alert-2" class="justify-center w-full mx-auto fixed absolute top-[5.3rem] z-50 bg-green-100 py-5 px-6 mb-3 text-base text-green-700 inline-flex items-center" role="alert">
        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle" class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path>
        </svg>
        {{ session('success') }}
    </div>
@endif
@if(session('error'))
    <div id="alert-2" class="justify-center w-full mx-auto fixed absolute top-[5.3rem] z-50 bg-red-100 py-5 px-6 mb-3 text-base text-red-700 inline-flex items-center" role="alert">
        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times-circle" class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z"></path>
        </svg>
        {{ session('error') }}
    </div>
@endif

{{--Modal--}}
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto font-notosans" id="exampleModalCenterApplicant" tabindex="-1" aria-labelledby="exampleModalCenterApplicantTitle" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered relative w-auto pointer-events-none">
        <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
            <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                <h5 class="text-xl font-medium leading-normal text-yellow-500" id="exampleModalScrollableLabel">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                    </svg>
                </h5>
                <button type="button"
                        class="btn-close box-content w-4 h-4 p-1 border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                        data-bs-dismiss="modal" aria-label="Close" style="color: black">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="modal-body relative p-4 text-black">
                <p>{{ __('accueil.modal_text_1') }} "<span class="text-black font-bold uppercase">{{ __('accueil.modal_text_1_continuer') }}</span>".</p>
                <p class="mt-4">{{ __('accueil.modal_text_2_debut') }} "<span class="text-blue-500 font-bold uppercase">{{ __('accueil.modal_text_2_kodreams') }}</span>"{{ __('accueil.modal_text_2_fin') }}</p>
            </div>
            <hr>
            <div class="p-4 flex justify-end items-center gap-4">
                <a href="{{ route('ugg.kodreams', config('app.kodream_locale')) }}" target="_blank"
                   class="font-bold text-sm text-white py-3 px-5 gradient-ugg transform transition hover:scale-105 duration-300 ease-in-out uppercase rounded-md">{{ __('accueil.modal_text_2_kodreams') }}</a>
                <a href="{{ route('applicant.dashboard', app()->getLocale()) }}"
                   class="font-bold text-sm text-gray-800 py-3 px-5 border border-gray-800 transform transition hover:scale-105 duration-300 ease-in-out uppercase rounded-md">{{ __('accueil.modal_text_1_continuer') }}</a>
            </div>
        </div>
    </div>
</div>
