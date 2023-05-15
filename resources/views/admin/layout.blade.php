<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} | Admin</title>
    <link rel="icon" href="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/kowelt_logos/Logo_Symbole_HD.png') }}">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">

    <link href="https://fonts.googleapis.com/css?family=Nunito:400,700,800" rel="stylesheet">

    <!-- Tailwind Elements CSS -->
    <link rel="stylesheet" href="{{ asset('css/tw_elements/tw-elements.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/tw_elements/font-awesome.css') }}" />
{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />--}}

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>
{{--    <link href="{{ mix('css/app.css') }}" rel="stylesheet">--}}
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/admin/dashboard.css', 'resources/css/admin/datatables.css'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">

    <!--Regular Datatables CSS-->
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--Responsive Extension Datatables CSS-->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">

{{--    <link href="{{ \Illuminate\Support\Facades\Vite::asset('resources/css/admin/dashboard.css') }}" rel="stylesheet">--}}

{{--    <link href="{{ \Illuminate\Support\Facades\Vite::asset('resources/css/admin/datatables.css') }}" rel="stylesheet">--}}

    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link
        href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
        rel="stylesheet"
    />

    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
    <script src="{{ asset('js/ckeditor/editorplaceholder/plugin.js') }}"></script>

    @livewireStyles

{{--    @yield('style')--}}
</head>

<body class="flex h-screen bg-gray-100 font-sans">

<!-- Sidebar -->
@include('admin._sidebar')

<div class="flex flex-row flex-wrap flex-1 flex-grow content-start pl-16 text-gray-700">

    @include('admin._navigation')

    @yield('content')

</div>

@yield('script')

{{--<script src="{{ asset('js/script.js') }}"></script>--}}
{{--<script src="{{ mix('js/app.js') }}"></script>--}}

@isset($nav)
    @if(in_array($nav, ['dashboard']))
        <script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
        <script src="{{ \Illuminate\Support\Facades\Vite::asset('resources/js/admin/chartist-js.js') }}"></script>
    @endif
@endisset

<script src="{{ \Illuminate\Support\Facades\Vite::asset('resources/js/admin/toggle-dropdown.js') }}"></script>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<!-- Tailwind Elements JS -->
<script src="{{ asset('js/tw_elements/tw-elements.js') }}"></script>
{{--<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>--}}

<!--Datatables -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="{{ \Illuminate\Support\Facades\Vite::asset('resources/js/admin/datatables.js') }}"></script>

@isset($nav)
    @if(in_array($nav, ['news']))
        <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
        <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
        <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>

        <script src="{{ asset('js/filepond/filepond-upload-image-v3.js') }}"></script>
{{--        <script src="{{ asset('js/filepond/filepond-upload-files-v5.js') }}"></script>--}}
        <script src="{{ asset('js/filepond/filepond-upload-files-admin.js') }}"></script>
    @endif
@endisset

    @livewireScripts
</body>

</html>
