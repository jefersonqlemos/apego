<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $pageTitle ?? config('app.name', 'Admin') }}</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    

    <!-- Styles -->

    <style>

        .mynavbar {
        overflow: hidden;
        background-color: #333;
        font-family: Arial, Helvetica, sans-serif;
        }

        .mynavbar a {
        float: left;
        font-size: 16px;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        }

        .mydropdown {
        float: right;
        overflow: hidden;
        }

        .mydropdown .mydropbtn {
        font-size: 16px;  
        border: none;
        outline: none;
        color: white;
        padding: 14px 16px;
        background-color: inherit;
        font-family: inherit;
        margin: 0;
        }

        .mynavbar a:hover, .mydropdown:hover .mydropbtn {
        background-color: gray;
        }

        .mydropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
        }

        .mydropdown-content a {
        float: none;
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        text-align: left;
        }

        .mydropdown-content a:hover {
        background-color: #ddd;
        }

        .mydropdown:hover .mydropdown-content {
        display: block;
        }

    </style>


</head>
<body>

    <div class="mynavbar">
    <a href="{{ route('admin.home') }}">Home</a>
    <div class="mydropdown">
        <button class="mydropbtn">Admin
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="mydropdown-content">
        @guest('admin')
            <a href="{{ route('admin.login') }}">{{ __('Admin Login') }}</a>
        @else
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>
            <a href="{{ route('admin.logout') }}"
                onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endguest
        </div>
    </div> 
    </div>
    <div id="app">
        

        <main class="py-4">
            @yield('content')
        </main>
    </div>

</body>
</html>