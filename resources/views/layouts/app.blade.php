<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layouts.partials.head')
    </head>


    <body id="app-layout">
        @include('layouts.partials.nav')

        @include('errors.list')
        @include('flash::message')
       

            @yield('main')


        <hr>
        @include('layouts.partials.footer')
    </body>

    

</html>
