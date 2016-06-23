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
        <div class="row">
            
            <div class="col-sm-12">
                @include('shared.breadcrumb')
                
                @yield('page-title')
            </div>

            <div class="col-sm-2">
                 @yield('sidebar')
            </div>
            <div class="col-sm-10">
                @yield('content')
            </div>
        </div>
    </div>
    
    <footer>
        <div class="container">
            @include('shared.footer')
        </div>
    </footer>
</body>

</html>
