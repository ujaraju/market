<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layouts.head')
    </head>


    <body id="app-layout">
        @include('layouts.header')
        
        @yield('main')

        <hr>
        @include('layouts.footer')
    </body>

</html>
