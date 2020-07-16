@include('inc.function')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel App') }}</title>



    <link rel="icon" type="image/x-icon" href="{{asset('storage/img/favicon.ico')}}"/>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

    <style>
        .form-form .form-form-wrap form .field-wrapper svg.feather-eye {
            top: 46px;
        }
    </style>
    <!-- Styles -->
    @include('inc.styles')
</head>
<body {{ ($has_scrollspy ?? '') ? scrollspy($scrollspy_offset) : '' }} class=" {{ ($page_name ?? '' === 'alt_menu') ? 'alt-menu' : '' }} {{ ($page_name ?? '' === 'error404') ? 'error404 text-center' : '' }} {{ ($page_name ?? '' === 'error500') ? 'error500 text-center' : '' }} {{ ($page_name ?? '' === 'error503') ? 'error503 text-center' : '' }} {{ ($page_name ?? '' === 'maintenence') ? 'maintanence text-center' : '' }}">

    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    @include('inc.navbar')

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        @include('inc.sidebar')

        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">

            <link href="{{asset('assets/css/main.css')}}" rel="stylesheet" type="text/css" />

            <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />


            <link href="{{asset('assets/css/authentication/form-2.css')}}" rel="stylesheet" type="text/css" />
            <link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/switches.css')}}">

            @yield('content')

            @if ($page_name ?? '' != 'account_settings')
                @include('inc.footer')
            @endif
        </div>
        <!--  END CONTENT PART  -->

    </div>
    <!-- END MAIN CONTAINER -->

    @include('inc.scripts')

</body>
</html>