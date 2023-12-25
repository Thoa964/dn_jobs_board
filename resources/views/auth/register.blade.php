@extends('layouts.app')

@section('content')
    <div class="login-container text-center text-lg-start">
        <div class="card">
            <div class="card-header">{{ __('register.register') }}</div>
            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('register.name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('ten') is-invalid @enderror" name="ten" value="{{ old('ten') }}" required autocomplete="name" autofocus>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="tai_khoan" class="col-md-4 col-form-label text-md-end">{{ __('register.tai_khoan') }}</label>

                        <div class="col-md-6">
                            <input id="tai_khoan" type="text" class="form-control @error('tai_khoan') is-invalid @enderror"
                                   name="tai_khoan" value="{{ old('tai_khoan') }}" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="mat_khau" class="col-md-4 col-form-label text-md-end">{{ __('register.password') }}</label>

                        <div class="col-md-6">
                            <input id="mat_khau" type="password" class="form-control @error('mat_khau') is-invalid @enderror" name="mat_khau" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="mat_khau-confirm" class="col-md-4 col-form-label text-md-end">{{ __('register.confirm_password') }}</label>

                        <div class="col-md-6">
                            <input id="mat_khau-confirm" type="password" class="form-control" name="mat_khau_confirmation" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <a class="col-md-6 offset-md-4" href="{{ route(__('register.company')) }}">{{ __('register.company') }}</a>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="main-btn">
                                {{ __('register.register') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
