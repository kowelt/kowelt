@inject('urlGenerator', 'Illuminate\Routing\UrlGenerator')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Kanit Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Filepond CSS -->
    <link href="{{ asset('/css/filepond/filepond.css') }}" rel="stylesheet" />
    <link href="{{ asset('/css/filepond/filepond-image-preview.css') }}" rel="stylesheet" />

    <!-- Dragula CSS -->
    <link href="{{ asset('css/dragula/dragula-min.css') }}" rel="stylesheet" />

    <!-- Tailwind Elements CSS -->
    <link rel="stylesheet" href="{{ asset('css/tw_elements/tw-elements.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/tw_elements/font-awesome.css') }}" />

    <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\Vite::asset('resources/css/custom_css.css') }}" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>{{ config('app.name') }}</title>
    <link rel="icon" href="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/kowelt_logos/Logo_Symbole_HD.png') }}">

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />

    @if(Route::currentRouteName() == 'ugg.register')
        <script src="{{ 'https://www.google.com/recaptcha/enterprise.js?render=' . config('recaptcha.recaptcha_site_key') }}"></script>
    @endif

    <!-- Define your gradient here - use online tools to find a gradient matching your branding-->
    <style>
        html {
            scroll-behavior: smooth;
        }
        .gradient {
            background: linear-gradient(90deg, #0061C7 0%, #009FFD 100%);
            /*background: linear-gradient(90deg, #2A2A72 0%, #009FFD 100%);*/
        }
        .gradient-primary {
            background: linear-gradient(90deg, #64C193 0%, #295CA6 100%);
            /*background: linear-gradient(90deg, #2A2A72 0%, #009FFD 100%);*/
        }

        .gradient-ugg {
            background: linear-gradient(90deg, #00B6E8 0%, #004286 100%);
            /*background: linear-gradient(90deg, #2A2A72 0%, #009FFD 100%);*/
        }

        .gradient-ugg-bg {
            background: linear-gradient(90deg, #004286 0%, #00B6E8 100%);
            /*background: linear-gradient(90deg, #2A2A72 0%, #009FFD 100%);*/
        }
    </style>

    @if(Route::currentRouteName() == 'ugg.stripe')

        <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    @endif

</head>
{{--style="font-family: 'Source Sans Pro', sans-serif;"--}}
<body class="leading-normal tracking-normal text-white relative font-kanit @if(in_array($navigation, ['ugg', 'kodreams'])) gradient-ugg-bg font-notosans @else gradient-primary @endif">

<!-- Navigation -->
@include('layouts._navigation')

<!-- Content -->
@yield('content')

<!-- Footer -->
@include('layouts._footer')

<script src="{{ asset('js/jquery/jquery.js') }}"></script>

<!-- Tailwind Elements JS -->
<script src="{{ asset('js/tw_elements/tw-elements.js') }}"></script>

<script type="module" src="{{ \Illuminate\Support\Facades\Vite::asset('resources/js/custom-javascript.js') }}"></script>

<script src="{{ asset('js/custom_functions_new_v2.js') }}"></script>


<!-- Filepond JS -->
<script src="{{ asset('js/filepond/config/filepond-plugin-image-preview.js') }}"></script>
<script src="{{ asset('js/filepond/config/filepond-plugin-file-validate-type.js') }}"></script>
<script src="{{ asset('js/filepond/config/filepond.js') }}"></script>

<!-- Dragula -->
<script src="{{ asset('js/dragula/dragula-function-min.js') }}" defer></script>

@if(isset($section) && in_array($section, ['cv', 'kodreams-form']))
    <script src="{{ asset('js/filepond/filepond-upload-image-v3.js') }}"></script>
@endif

@if(isset($section) && in_array($section, ['upload-documents']))
    <script src="{{ asset('js/filepond/filepond-upload-files-v5.js') }}"></script>
@endif

@if(Route::currentRouteName() == 'ugg.register')
    <script src="{{ asset('js/recaptcha-v1.js') }}"></script>
@endif

@if(isset($section) && $section == 'kodreams-form')
    <script src="{{ asset('js/work-js-v9.js') }}"></script>
    <script src="{{ asset('js/skill-js-v6.js') }}"></script>
    <script src="{{ asset('js/language-js-v3.js') }}"></script>
    <script src="{{ asset('js/hobby-js-v3.js') }}"></script>
    <script src="{{ asset('js/filepond/filepond-upload-file-v1.js') }}"></script>
@endif

<script src="{{ asset('js/work-db-v2.js') }}"></script>
<script src="{{ asset('js/skill-db-v1.js') }}"></script>
<script src="{{ asset('js/language-db.js') }}"></script>
<script src="{{ asset('js/hobby-db.js') }}"></script>

<script src="{{ asset('js/windows-reload-ugg-v6.js') }}"></script>

<script src="{{ asset('js/ugg-functions-v8.js') }}"></script>

<script src="{{ asset('js/dragula/drag-v1.js') }}" defer></script>

@yield('script')
</body>
</html>
