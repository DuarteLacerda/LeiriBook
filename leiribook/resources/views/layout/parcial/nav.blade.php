<nav>
    <div class="navbar">
        <div class="container nav-container">

            <input class="checkbox" type="checkbox" name="" id="" />
            <div class="hamburger-lines" id="burger-menu">
                <span class="line line1"></span>
                <span class="line line2"></span>
                <span class="line line3"></span>
            </div>
            <ul>
            </ul>

            {{-- <div class="nave"> --}}
            <ul>
                <div class="nav-left">
                    <li><a href="{{ route('home') }}"><img src="{{ asset('images/logo/SVG/logo-ext.svg') }}"
                                alt="logotipo" width="140px"></a>
                    </li>
                </div>
            </ul>
            <ul>
                <div class="nav-mid">
                    <li><a href="{{ route('sobre') }}" @if (Route::currentRouteName() == 'sobre') class="active" @endif>Sobre</a>
                    </li>
                    <li><a href="{{ route('biblioteca') }}"
                            @if (Route::currentRouteName() == 'biblioteca') class="active" @endif>Bilioteca Virtual</a></li>
                    <li><a href="{{ route('eventos') }}"
                            @if (Route::currentRouteName() == 'eventos') class="active" @endif>Eventos</a></li>
                    <li><a href="{{ route('contactos') }}"
                            @if (Route::currentRouteName() == 'contactos') class="active" @endif>Contactos</a></li>
                    <li><a href="{{ route('pedidos') }}"
                            @if (Route::currentRouteName() == 'pedidos') class="active" @endif>Pedidos</a></li>
                </div>
            </ul>
            <ul>
                <div class="nav-right">
                    @guest
                        @if (Route::has('login'))
                            <li><a class="login" href="{{ route('login') }}">Login</a></li>
                        @endif
                        @if (Route::has('register'))
                            <li><a class="register" href="{{ route('register') }}">Registo</a></li>
                        @endif
                    @else
                        <li class="dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('profile', Auth::user()) }}">Perfil</a>
                                @if (Auth::user()->role == 'A')
                                    <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
                                @endif
                                <a class="dropdown-item" href="{{ route('editpassword') }}">Alterar Password</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                    <button type="button" class="search" id="search"><i
                            class="fa-solid fa-magnifying-glass"></i></button>
                </div>

            </ul>
            {{-- </div> --}}
            {{-- <div class="logo"> --}}
            <!-- Login/registo -->
            {{-- @guest
                    @if (Route::has('login'))
                        <li><a class="login" href="{{ route('login') }}">Login</a></li>
                    @endif
                    @if (Route::has('register'))
                        <li><a class="register" href="{{ route('register') }}">Registo</a></li>
                    @endif
                @else
                    <li class="dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('profile', Auth::user()) }}">Perfil</a>
                            @if (Auth::user()->role == 'A')
                                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
                            @endif
                            <a class="dropdown-item" href="{{ route('editpassword') }}">Alterar Password</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
                <button type="button" class="search" id="search"><i
                        class="fa-solid fa-magnifying-glass"></i></button> --}}
            {{-- </div> --}}
            <div class="menu-items">
                <li><a href="{{ route('home') }}">Inicio</a></li>
                <li><a href="{{ route('sobre') }}">Sobre</a></li>
                <li><a href="{{ route('biblioteca') }}">Bilioteca Virtual</a></li>
                <li><a href="{{ route('eventos') }}">Eventos</a></li>
                <li><a href="{{ route('contactos') }}">Contactos</a></li>
                <li><a href="{{ route('pedidos') }}">Pedidos</a></li>
                </a></li>
            </div>
        </div>
    </div>
</nav>

<!-- The Modal -->
<div id="navModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-search">
            <form><input class="border-0" type="text" name="search" placeholder="Search..">
                <button id="searchModal" class=" b-modal" type="submit"><i
                        class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
    </div>
</div>
