<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $pageTitle ?? config('app.name', 'Metorik - Responsive Bootstrap 4 Admin Dashboard') }}</title>

    <!-- Favicon -->
    <link href="{{ getSingleMedia(settingSession('get'),'site_favicon',false) }}" rel="shortcut icon">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}"/> -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"/>
    <!-- Typography CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/typography.css') }}"/>
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}"/>
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}"/>
    <!-- <link href="{{ asset('plugin/dataTables/jquery.dataTables.min.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('plugin/dataTables/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link rel='stylesheet' href="{{ asset('assets/css/slick.css')}}" />
    <link rel='stylesheet' href="{{ asset('assets/css/slick-theme.css')}}" />
    <!-- Full calendar -->
    <link href="{{ asset('vendor/fullcalendar/core/main.css') }}" rel='stylesheet' />
    <link href="{{ asset('vendor/fullcalendar/daygrid/main.css') }}" rel='stylesheet' />
    <link href="{{ asset('vendor/fullcalendar/timegrid/main.css') }}" rel='stylesheet' />
    <link href="{{ asset('vendor/fullcalendar/list/main.css') }}" rel='stylesheet' />

    @if(isset($assets) && (in_array('datatable',$assets) || in_array('datatable_builder',$assets)))
        <link rel="stylesheet" href="{{ asset("vendor/datatables/css/dataTables.bootstrap4.min.css") }}">
        <link rel="stylesheet" href="{{ asset('vendor/datatables/css/buttons.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/datatables/css/select.bootstrap4.min.css') }}">
    @endif
    @yield('head')
</head>
