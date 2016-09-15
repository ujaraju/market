
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{url('/img/logo.png')}}">
                </a>


                @if(! Request::is('/') )
                    {{-- dont show search in home page. search is in the hero. --}}
                    @include('layouts.partials.search')
                @endif

            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    
                    <li><a class="color-success" href="{{ url('/properties/create') }}">Add your property</a></li>
                    {{-- <li><a href="{{ url('/properties') }}">browse</a></li> --}}
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Hi, {{ strtok( Auth::user()->name ," ") }} 
                                <span class="caret"></span>
                                <img class="avatar" src="{{ url('/uploads/avatars/'.Auth::user()->avatar)}}">
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                <li><a href="{{ url('/logout') }}">Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>

            </div>
        </div>
    </nav>




