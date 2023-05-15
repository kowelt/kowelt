@extends('layouts.app')
@section('content')
    <div class="bg-white pt-[80px]"></div>
    <section class="gradient-primary border-b pt-2 pb-4 text-gray-800 px-4">
        <div class="max-w-6xl mx-auto">
            <br>
            <br>
            <p class="mt-6 text-center text-xl md:text-4xl font-bold text-white">
                {{ __('account.principal_message_login') }}
            </p>
            <br>
            <br>
        </div>
    </section>
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
    <div class="bg-white text-gray-800 py-4">

        <div class="md:grid md:grid-cols-2 items-center gap-4 px-5 py-14 max-w-6xl mx-auto">
            <div class="w-full">
                <img class="max-h-80 object-center" src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" alt="asd">
            </div>
            <div class="w-full md:pl-4 pt-10 md:pt-0 pl-10 md:pl-0">
                <div class="text-xl">
                    {{ __('account.Please_enter_your_E_Mail') }}
                </div>
                <br>
                <form action="{{ route('applicant.password.forgot.email.request', app()->getLocale()) }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-6 gap-5">
                        <div class="col-span-5">
                            <input type="text" name="email" id="email" value="{{ old('email') }}" placeholder="{{ __('account.e_mail') }}" autocomplete="email" required class="mt-1 block w-full border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm rounded-md @error('email') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
                        </div>
                    </div>
                    <div class="text-start pt-6">
                        <button type="submit" class="inline-flex justify-center rounded-md gradient-primary py-3 px-6 text-sm font-medium text-white hover:shadow-blue-500/60 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transform transition hover:scale-[1.02] duration-300 ease-in-out"
                        >{{ __('account.Request_reset_link') }}</button>
                        {{--<button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-blue-500 py-2 px-5 text-sm font-medium text-white shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                        >{{ 'Request reset link' }}</button>--}}
                    </div>
                    <div class="pt-2">
                        <small>
                            {{ __('account.Dont_have_an_account') }} <a class="text-blue-500 hover:underline" href="{{ route('applicant.register', app()->getLocale()) }}">{{ __('account.Enregistrez_vous') }}</a>
                        </small>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection



{{--
@extends('layouts.app')
@section('content')
    <div class="h-screen bg-gray-100 grid grid-cols-1 place-content-center text-gray-800 p-4">
        <div class="w-fit mx-auto bg-white rounded-md shadow-md">
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
            <div class="md:grid md:grid-cols-2 items-center gap-4 px-5 py-14">
                <div class="w-full">
                    <img class="max-h-80 object-center" src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" alt="asd">
                </div>
                <div class="w-full md:pl-4 pt-10 md:pt-0 pl-10 md:pl-0">
                    <div class="text-2xl font-semibold">
                        {{ 'Please enter your E-Mail' }}
                    </div>
                    <br>
                    <form action="{{ route('applicant.password.forgot.email.request', app()->getLocale()) }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-6 gap-5">
                            <div class="col-span-5">
                                <input type="text" name="email" id="email" value="{{ old('email') }}" placeholder="{{ __('account.e_mail') }}" autocomplete="email" required class="mt-1 block w-full border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm rounded-md @error('email') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror">
                            </div>
                        </div>
                        <div class="text-start pt-6">
                            <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-blue-500 py-2 px-5 text-sm font-medium text-white shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                            >{{ 'Request reset link' }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
--}}
