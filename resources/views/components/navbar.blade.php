<div>
        <nav class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
                <a class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none" href="{{ url('/') }}">
                    OYO HOTEL
                </a>
                <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="#" class="nav-link px-2 link-secondary">Home</a></li>
                    @guest
                        <li><a href="#" class="nav-link px-2 link-dark">Features</a></li>
                        <li><a href="#" class="nav-link px-2 link-dark">Pricing</a></li>
                        <li><a href="#" class="nav-link px-2 link-dark">FAQs</a></li>
                        <li><a href="#" class="nav-link px-2 link-dark">About</a></li>
                    @else
                        @if(Auth::user()->role == 1)
                            <li><a href="{{route('user.index')}}" class="nav-link px-2 link-dark">Dashboard</a></li>
                        @endif
                    @endguest
                </ul>

                <div class="col-md-3 text-end" id="navbarSupportedContent">
                        @guest
                            @if (Route::has('login'))
                                    <a class="btn btn-outline-primary me-2" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @endif

                            @if (Route::has('register'))
                                    <a class="btn btn-primary" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        @else
                            <div class="dropdown">
                                <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        @endguest
                </div>
            </div>
        </nav>
</div>