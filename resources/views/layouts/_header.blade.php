@php
    $header = [
        'home' => route('Trang chủ'),
        'about' => '',
        'contact' => '',
    ];

    $currentRoute = Request::route()->getName();
@endphp

<nav class="navbar navbar-expand-xl fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#"><img claass="w-100" src="{{ asset('img/icon/company-logo.svg') }}" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @foreach($header as $item => $link)
                    <li class="nav-card-item">
                        <a class="nav-link {{ $currentRoute == $item ? 'active' : '' }}" href="{{ $link }}">{{ __("_header.$item") }}</a>
                    </li>
                @endforeach
            </ul>
            @guest()
                <ul class="right navbar-nav ms-auto">
                    <li class="nav-card-item-right">
                        <a class="nav-link {{ $currentRoute == 'login' ? 'active' : '' }}" href="{{ route('login') }}">{{ __("_header.login") }}</a>
                    </li>
                    <li class="nav-card-item-right create-account">
                        <a class="nav-link" href="{{ route('register') }}">{{ __("_header.register") }}</a>
                    </li>
                </ul>
            @else
                <div class="dropdown ms-auto">
                    <a class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user"></i> {{ Auth::user()->ten }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li>
                            <a href="{{ route('Thông tin cá nhân') }}" class="dropdown-item">{{ __("_header.profile") }}</a>
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <a type="submit" class="dropdown-item" href="#" onclick="event.preventDefault(); this.closest('form').submit();">{{ __("_header.logout") }}</a>
                            </form>
                        </li>
                    </ul>
                </div>
            @endguest
        </div>
    </div>
</nav>
