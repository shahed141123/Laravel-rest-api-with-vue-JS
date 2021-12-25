<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
{{--    <link rel="icon" href="{{ \App\Models\Setting::value('favicon') }}" type="image/png" />--}}
    <!--plugins-->
    <link href="{{asset('backend')}}/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="{{asset('backend')}}/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="{{asset('backend')}}/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <link href="{{asset('backend')}}/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <link href="{{asset('backend')}}/assets/plugins/highcharts/css/highcharts-white.css" rel="stylesheet" />
    <!-- loader-->
    <link href="{{asset('backend')}}/assets/css/pace.min.css" rel="stylesheet" />
    <script src="{{asset('backend')}}/assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="{{asset('backend')}}/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('backend')}}/assets/css/app.css" rel="stylesheet">
    <link href="{{asset('backend')}}/assets/css/icons.css" rel="stylesheet">
    <!-- Theme Style CSS -->
{{--    <link rel="stylesheet" href="{{ asset('/') }}frontend/css/flaticon.css">--}}
{{--    <link rel="stylesheet" href="{{asset('backend')}}/assets/css/dark-theme.css" />--}}
{{--    <link rel="stylesheet" href="{{asset('backend')}}/assets/css/semi-dark.css" />--}}

{{--    <link rel="stylesheet" href="{{asset('backend')}}/assets/css/header-colors.css" />--}}
{{--    <title>{{ \App\Models\Setting::value('name') }} | Admin Panel</title>--}}
    @yield('styles')

</head>
