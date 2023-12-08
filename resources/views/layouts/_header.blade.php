<nav class="navbar navbar-expand-xl fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#"><img claass="w-100" src="{{ asset('img/icon/company-logo.svg') }}" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-card-item">
                    <a class="nav-link  active" href="">Home</a>
                </li>
                <li class="nav-card-item">
                    <a class="nav-link" href="aboutus.html">About</a>
                </li>
                <li class="nav-card-item">
                    <a class="nav-link" href="contact.html">Contact</a>
                </li>
                <li class="nav-card-item">
                    <a class="nav-link" href="blog.html">Blog</a>
                </li>
            </ul>
            @guest()
                <ul class="right navbar-nav ms-auto">
                    <li class="nav-card-item-right">
                        <a class="nav-link" href="{{ route('login') }}">Sign in</a>
                    </li>
                    <li class="nav-card-item-right create-account">
                        <a class="nav-link" href="{{ route('register') }}">Create account</a>
                    </li>
                </ul>
            @else
                <div class="dropdown ms-auto">
                    <a class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user"></i> {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <a type="submit" class="dropdown-item" href="#" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                            </form>
                        </li>
                    </ul>
                </div>
            @endguest
        </div>
    </div>
</nav>
