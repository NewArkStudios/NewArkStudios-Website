<!doctype html>
<html lang="{{ config('app.locale') }}">
	<!-- Header -->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('custom-title', 'NewArkStudios')</title>
        
        
        <link rel="stylesheet" href="{{ URL::asset('css/app/notification.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/jquery-ui.min.css') }}" />

        <script src="{{ URL::asset('js/require.js') }}"></script>
        <script src="{{ URL::asset('js/app.require.js') }}"></script>
        @yield('custom-css')

    </head>
    <body>
    @include('layouts.partials.nav')   
	  <!-- Header End -->
    <div style="padding-top:1em;" class="theme-showcase" role="main">
        @yield('page-content')
    </div> <!-- /container -->

        <!-- Footer -->
        <!-- Placed at the end of the document so the pages load faster -->
        <!--<script src="{{ URL::asset('js/jquery-1.12.4.min.js') }}" /></script>
        <script src="{{ URL::asset('js/jquery-ui.min.js') }}" /></script>
        <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>-->
        <!--<script src="{{ URL::asset('js/run_everytime.js') }}"></script>-->
        @yield('custom-javascripts')
	    <!-- Footer End -->
    </body>
</html>
