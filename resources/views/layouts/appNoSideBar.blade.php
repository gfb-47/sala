<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        <title>{{ config('app.name', 'White Dashboard') }}</title>

        <!-- CSS -->
        <link href="{{ asset('css') }}/index.css" rel="stylesheet"/> 
        
    </head>
    <body>        
        @include('layouts.navBarsIndex.navbar')
        @yield('content')
        @include('layouts.footerIndex.footer')
    </body>
</html>
