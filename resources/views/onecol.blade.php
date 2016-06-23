<!DOCTYPE html>
<html lang="en">

<head>
    @include('shared.head')
</head>

<body>
    <header>
        <div class="container">
            @include('shared.header')
        </div>
    </header>
    
    <div class="container">

            @include('shared.breadcrumb')

            @yield('page-title')

            @yield('content')

    </div>

    <footer>
        <div class="container">
            @include('shared.footer')
        </div>
    </footer>
</body>

</html>
