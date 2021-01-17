<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns:fb="http://ogp.me/ns/fb#" xmlns="http://www.w3.org/1999/html" lang="{{ app()->getLocale() }}">
<head>
    <!-- git CSRF Token --><!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <base href="{{ config('app.url') }}"/>

    <!-- metas -->
    <title>
        {{ env('APP_NAME') }}
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-language" content="pt-br" />
    <meta name="author" content="{{ env('APP_NAME') }}" />
    <meta name="rating" content="general" />
    <meta name="distribution" content="local"/>
    <meta name="Robots" content="All"/>
    <meta name="revisit" content="7 day" />
    <meta name="url" content="{{ config('app.url') }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/site/css/style.css') }}" type="text/css">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" type="text/css">

    <script type="text/javascript" src="{{ asset('assets/site/js/plugins/jquery.min.js') }}"></script>
</head>
<body class="w-100 relative d_flex wrap direction-column">
    <div class="w-100 relative z-index-1 h-100 d_flex wrap direction-column">
        <header class="w-100 p-top-10 p-bottom-10 t-align-c">
            <a class="display-inline-block max-w-90" href="https://github.com/rodrigomonteiro93" title="{{ env('APP_NAME') }}" target="_blank">
                <img class="max-w-100" src="{{ asset('assets/site/images/main-logo.png') }}" title="{{ env('APP_NAME') }}" alt="{{ env('APP_NAME') }}" />
            </a>
        </header>
        <div class="w-100 flex-1 app">
            @yield('content')
        </div>
        <footer class="w-100">
            <div class="center container">
                <p class="w-100">
                    Por: Rodrigo Monteiro
                </p>
            </div>
        </footer>
    </div>
<!-- JS -->
<script type="text/javascript" src="{{ asset('assets/site/js/plugins/masked.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/site/js/forms.js') }}"></script>
</body>
</html>
