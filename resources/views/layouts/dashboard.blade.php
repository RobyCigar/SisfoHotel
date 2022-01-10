<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

<div class="d-flex">
  <div class="vh-100 d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
      <span class="fs-4">Sidebar</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="#" class="nav-link text-white" aria-current="page">
          <i class="bi bi-house-door"></i>
          Home
        </a>
      </li>
      <li>
        <a href="{{route('user.index')}}" class="nav-link text-white">
          <i class="bi bi-speedometer"></i>
          Dashboard
        </a>
      </li>
      <li>
        <a href="{{route('transaction.index')}}" class="nav-link text-white">
          <i class="bi bi-alarm"></i>
          Transaction
        </a>
      </li>
      <li>
        <a href="{{route('room.index')}}" class="nav-link text-white">
          <i class="bi bi-shop"></i>
          Room
        </a>
      </li>
      <li>
        <a href="{{route('user.index')}}" class="nav-link text-white">
          <i class="bi bi-person"></i>
          User
        </a>
      </li>
    </ul>
    <hr>
  </div>
  <div class="vw-100">
    <x-navbar/>
    @yield('content')
  </div>
</div>

</body>
</html>