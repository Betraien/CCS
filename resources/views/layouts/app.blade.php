<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <link href=" {{ asset('css/style.css') }}" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>



  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">

    <span style="font-size:30px;cursor:pointer; color:#f1f1f1" onclick="openNav()">&#9776;</span>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02"
      aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    @guest
    @else
    <div class="collapse navbar-collapse" id="navbarColor02" style="margin-left: 75% ;">
      <form class="form-inline my-2 my-lg-0" method="get" action={{ route('search') }}>
        <input class="form-control mr-sm-2" type="text" name="key" placeholder="Search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
    @endguest

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
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false" v-pre>
          {{ Auth::user()->name }} <span class="caret"></span>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </div>

      </li>

      @endguest
    </ul>

  </nav>

  <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href={{ route('create_interface') }}>Create Third Party</a>
    <a href="#">Reorder</a>
    <a href="#">Clients</a>
    <a href="#">Clients</a>
    <a href="#">Clients</a>
  
  </div>

  <script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
    }
  </script>

</body>
<div class="content" style=" width: 80%; margin-left: 10%; margin-top:25px;">
  @yield('content')
</div>

</body>

</html>