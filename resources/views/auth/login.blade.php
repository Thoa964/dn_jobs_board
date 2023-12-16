@extends('layouts.app')

@section('content')
    <!-- Section: Design Block -->
    <section class="login-container text-center text-lg-start">
        <div class="card mb-3">
            <div class="row g-0 d-flex align-items-center">
                <div class="col-lg-4 d-none d-lg-flex">
                    <img src="https://mdbootstrap.com/img/new/ecommerce/vertical/004.jpg" alt="Trendy Pants and Shoes"
                         class="w-100 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" />
                </div>
                <div class="col-lg-8">
                    <div class="card-body py-5 px-md-5">

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="email" id="form2Example1" class="form-control" name="email" />
                                <label class="form-label" for="form2Example1">{{ __('login.email') }}</label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <input type="password" id="form2Example2" class="form-control" name="password" />
                                <label class="form-label" for="form2Example2">{{ __('login.password') }}</label>
                            </div>

                            <!-- 2 column grid layout for inline styling -->
                            <div class="row mb-4">
                                <div class="col d-flex justify-content-center">
                                    <!-- Checkbox -->
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                                        <label class="form-check-label" for="form2Example31"> {{ __('login.remember') }} </label>
                                    </div>
                                </div>

                                <div class="col">
                                    <!-- Simple link -->
                                    <a href="#!">{{ __('login.forgot') }}</a>
                                </div>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="main-btn mb-4">{{ __('login.sign_in') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
