<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layouts.partials.head')
    </head>


    <body id="app-layout">
        @include('layouts.partials.nav')

        <div class="container">
            @include('flash::message')
       
                <h1>@yield('page-title')</h1>
                
                @yield('content')

            @include('errors.list')     
        </div>

        <hr>
        @include('layouts.partials.footer')
    
    </body>

    

</html>
