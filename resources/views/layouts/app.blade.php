<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Pmanager') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                        <li><a href="{{ route('companies.index') }}"><i class="fa fa-building" aria-hidden="true"></i> Companies</a></li>
                        <li><a href="{{ route('projects.index') }}"><i class="fa fa-briefcase" aria-hidden="true"></i> Projects</a></li>
                        <li><a href="{{ route('tasks.index') }}"><i class="fa fa-tasks" aria-hidden="true"></i> Tasks</a></li>


                        @if(Auth::user()->role_id == 1)
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                        <i class="fa fa-user-o" aria-hidden="true"></i> Admin: <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">

                                        <li><a href="{{ route('projects.index') }}"><i class="fa fa-briefcase" aria-hidden="true"></i>All Projects</a></li>
                                        <li><a href="{{ route('users.index') }}"><i class="fa fa-user-o" aria-hidden="true"></i> All Users</a></li>
                                        <li><a href="{{ route('tasks.index') }}"><i class="fa fa-tasks" aria-hidden="true"></i> All Tasks</a></li>
                                        <li><a href="{{ route('companies.index') }}"><i class="fa fa-building" aria-hidden="true"></i> All Companies</a></li>
                                        <li><a href="{{ route('roles.index') }}"><i class="fa fa-users" aria-hidden="true"></i> All Roles</a></li>
                                        
                                        

                                </ul>
                            </li>
                            

                            @else
                            <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                            <i class="fa fa-user-o" aria-hidden="true"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
    
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                         <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
                                            </a>
    
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                                @endif


                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            @include('partials.errors')
            @include('partials.success')
            <div class="row">

                @yield('content')
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://use.fontawesome.com/e440d1bd05.js"></script>
</body>
</html>
