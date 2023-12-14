<nav>
    <div class="navbar">
        <div class="container nav-container">
            <input class="checkbox" type="checkbox" name="" id="" />
            <div class="hamburger-lines">
                <span class="line line1"></span>
                <span class="line line2"></span>
                <span class="line line3"></span>
            </div>
            <div class="nave">
                <ul>
                    <li><a href="{{ route('home') }}"><img src="{{ asset('images/logo/SVG/logo-ext.svg') }}"
                                alt="logotipo" width="140px"></a>
                    </li>
                    <li><a href="{{route('sobre')}}">Sobre</a></li>
                    <li><a href="{{route('biblioteca')}}">Bilioteca Virtual</a></li>
                    <li><a href="{{ route('eventos') }}">Eventos</a></li>
                    <li><a href="{{ route('contactos') }}">Contactos</a></li>
                    <li><a href="{{ route('pedidos') }}">Pedidos</a></li>
                </ul>
            </div>
            <div class="logo">
                <!-- Login/registo -->
                <a class="login" href="{{ route('login') }}">
                    Login</a>
                <a class="register" href="{{ route('register') }}">
                    Registo</a>
                </a>
                <button type="button" class="search" id="search"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            <div class="menu-items">
                <li><a href="{{ route('home') }}">Inicio</a></li>
                <li><a href="{{route('sobre')}}">Sobre</a></li>
                <li><a href="{{route('biblioteca')}}">Bilioteca Virtual</a></li>
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

    </
div>
</div>
