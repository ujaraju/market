<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layouts.partials.head')
    </head>

        @if(Request::is('/')) 
            <body id="app-layout" class="home">
        @else
            <body id="app-layout" class="">
        @endif

    
        @include('layouts.partials.nav')

        @include('errors.list')
        @include('flash::message')
       

            @yield('main')


        <hr>
        @include('layouts.partials.footer')

    </body>

    

</html>
