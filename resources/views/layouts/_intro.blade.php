<div class="intro">
    <div class="container">
        <div class="intro-text">
            <h1>{{ __('intro.looking_for') }}<br><span class="green">{{ __('intro.help') }}</span></h1>
            <div class="check-out">
                <p>{{ __('intro.offer') }}</p>
                <div class="form d-flex justify-content-between align-items-center">
                    <div class="job-search">
                        <img style="width: 20px; margin-right: 30px;" src="{{ asset('img/icon/search-icon.svg') }}" alt="">
                        <input type="text" placeholder="{{ __('intro.search') }}">
                    </div>
                    <div>
                        <input class="search main-btn" type="submit" value="Search">
                    </div>
                </div>
                <div class="follow">
                    <span>{{ __('intro.follow') }}</span>
                    <a href=""><img src="{{ asset('img/icon/facebook-icon.svg') }}" alt=""></a>
                    <a href=""><img src="{{ asset('img/icon/twitter-icon.svg') }}" alt=""></a>
                    <a href=""><img src="{{ asset('img/icon/linkedin-icon.svg') }}" alt=""></a>
                </div>
            </div>
        </div>
        <div class="intro-img">
            <img src="{{ asset('img/intro.png') }}" alt="">
        </div>
    </div>
</div>
