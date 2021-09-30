<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('admin/css/material-dashboard.css') }}" rel="stylesheet">


</head>
<body>
<div id="app">

    <main class="py-4">
        @yield('content')
    </main>
</div>

<!-- Scripts -->
<script src="{{ asset('assets/js/core/jquery.min.js') }}" defer></script>
<script src="{{ asset('assets/js/core/popper.min.js') }}" defer></script>
<script src="{{ asset('assets/js/core/bootstrap-material-design.min.js') }}" defer></script>
<script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}" defer></script>
</body>
</html>
