<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Dahal Radius') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Dahal Radius') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="container">
        <div class="row">
        <div class="col-md-3 py-4">
        <div class="card">
            <div class="card-header">
                <h4 class="d-flex align-items-center">
                    <span class="text">Management</span>
                </h4>
            </div>
            <div class="card-body">



                        <ul class="list-group mb-3">
                            <li class="list-group-item d-flex justify-content-between lh-condensed">

                                    <h6 class="my-0"><a href="{{ route('nas.index') }}">Nas</a></h6>
                                    {{--<small class="text-muted">Add/Edit Nas</small>--}}
                            </li>
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0"><a href="{{ route('radcheck.index') }}">Users</a></h6>
                                </div>

                            </li>
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0"><a href="{{ route('radgroupcheck.index') }}">User Group</a></h6>
                                </div>

                            </li>
                            <li class="list-group-item d-flex justify-content-between bg-light">
                                <div>
                                    <h6 class="my-0"><a href="{{ route('radacct.index') }}">Report</a></h6>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between bg-light">
                                <div>
                                    <h6 class="my-0"> code</h6>
                                </div>
                            </li>
                        </ul>
            </div>
        </div>
        </div>

        <div class="col-sm-8">
                        <div class="py-4">

                            @yield('content')
                        </div>
                    </div>

        </div>
    </main>
</div>
</body>
</html>
