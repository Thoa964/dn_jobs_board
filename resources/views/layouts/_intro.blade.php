<div class="intro">
    <div class="container">
        <div class="intro-text">
            <h1>{{ __('intro.looking_for') }}<br><span class="green">{{ __('intro.help') }}</span></h1>
            <div class="check-out">
                <p>{{ __('intro.offer') }}</p>
                <form action="{{ route('Tìm kiếm') }}" method="get">
                    <div class="form d-flex justify-content-between align-items-center">
                        <div class="job-search">
                            <img style="width: 20px; margin-right: 30px;" src="{{ asset('img/icon/search-icon.svg') }}"
                                 alt="">
                            <input type="text" name="keyword" placeholder="{{ __('intro.search') }}">
                        </div>
                        <div class="location">
                            <label for="quan">Quận:</label>
                            <select name="ma_quan" id="quan">
                                <option value="">-- Chọn quận --</option>
                                @foreach($quan as $item)
                                    <option value="{{ $item->ma_quan }}">
                                        {{ $item->ten_quan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="location ms-2">
                            <label for="work_type">Hình thức làm việc:</label>
                            <select name="work_type" id="work_type">
                                <option value="">-- Hình thức làm việc --</option>
                                @foreach($workType as $key => $value)
                                    <option value="{{ $key }}">
                                        {{ $value }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <input class="search main-btn" type="submit" value="Tìm kiếm">
                        </div>
                    </div>
                </form>
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
