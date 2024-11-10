<nav class="navbar navbar-expand-md " style="background-color: rgb(225,225,217)">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home.index') }}">CMS Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ms-md-5" id="navbarNavAltMarkup">
            <div class="navbar-nav w-100">
                <a class='{{ Request::routeIs('home.index') ? 'active' : '' }} link mx-3 py-3' href="{{ route('home.index') }}"><span>Home</span></a>
                <a class='{{ Request::routeIs('blog.index') ? 'active' : '' }} link mx-3 py-3' href="{{ route('blog.index') }}">Blog</a>
                <a class='{{ Request::routeIs('home.about') ? 'active' : '' }} link mx-3 py-3' href="{{ route('home.about') }}">About</a>
                <a class='{{ Request::routeIs('contact.index') ? 'active' : '' }} link mx-3 py-3' href="{{ route('contact.index') }}">Contact</a>

                @guest
                    <div class="d-md-flex ms-md-auto">
                        <a class='{{ Request::routeIs('login') ? 'active' : '' }} mx-3 button-29' href="{{ route('login') }}">Login</a>
                        <a class='{{ Request::routeIs('register') ? 'active' : '' }} button-29' href="{{ route('register') }}">Register</a>
                    </div>
                @endguest

                @auth
                    <a class='{{ Request::routeIs('home') ? 'active' : '' }} nav-link' href="{{ route('home') }}">Dashboard</a>
                @endauth
            </div>
        </div>
    </div>
</nav>


<!-- sidebar -->
{{-- <div class="sidebar">
    <span class="closeButton">&times;</span>
    <p class="brand-title"><a href="">CMS Blog</a></p>

    <div class="side-links">
        <ul>
            <li><a class='{{ Request::routeIs('home.index') ? 'active' : '' }}'
                    href="{{ route('home.index') }}">Home</a></li>
            <li><a class='{{ Request::routeIs('blog.index') ? 'active' : '' }}'
                    href="{{ route('blog.index') }}">Blog</a></li>
            <li><a class='{{ Request::routeIs('home.about') ? 'active' : '' }}'
                    href="{{ route('home.about') }}">About</a></li>
            <li><a class='{{ Request::routeIs('contact.index') ? 'active' : '' }}'
                    href="{{ route('contact.index') }}">Contact</a></li>
            @guest
                <li><a class='{{ Request::routeIs('login') ? 'active' : '' }}'
                        href="{{ route('login') }}">Login</a></li>
                <li><a class='{{ Request::routeIs('register') ? 'active' : '' }}'
                        href="{{ route('register') }}">Register</a></li>
            @endguest

            @auth
                <li><a class='{{ Request::routeIs('home') ? 'active' : '' }}'
                        href="{{ route('home') }}">Dashboard</a></li>
            @endauth

        </ul>
    </div>

    <!-- sidebar footer -->
    <footer class="sidebar-footer">
        <div id="social-icon-block">
            <a href="" id="facebook-icon"><i class="fab fa-facebook-f"></i></a>
            <a href="" id="instagram-icon"><i class="fab fa-instagram"></i></a>
            <a href="" id="twitter-icon"><i class="fab fa-twitter"></i></a>
        </div>

        <small>&copy 2024 CMS Blog</small>
    </footer>
</div> --}}