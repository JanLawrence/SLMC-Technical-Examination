<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('pe-icon/css/pe-icon-7-stroke.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('pe-icon/css/helper.css') }}">
        <script>window.Laravel = { csrfToken: '{{ csrf_token() }}'}</script>

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&display=swap" rel="stylesheet">
        <style>


        </style>
    </head>
    <body>
        <div id="app">
            <div class="d-flex" id="wrapper">
                <sidenav></sidenav>
                <div id="page-content-wrapper">
                    <navbar></navbar>
                    <div class="container-fluid px-0">
                        <router-view></router-view>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
