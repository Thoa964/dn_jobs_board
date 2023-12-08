@extends('layouts.app')

@section('intro')
    @include('layouts._intro')
@endsection

@section('content')
    <div class="search-by">
        <h1>Search by <span class="green">category</span></h1>
        <a href="">All category <img style="width: 20px; margin-left: 20px;" src="/img/icon/arrow-right-icon.svg" alt=""></a>
        <!--Start carousel-->
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
            <div class="carousel-inner text-center">
                <div class="carousel-item active">
                    <div class="card-item">
                        <div class="photo">
                            <img class="main-state" src="img/icon/business-development.svg" alt="">
                            <img class="hover" src="img/icon/business-development-hover.svg" alt="">
                        </div>
                        <p>Business<br>
                            Development</p>
                    </div>
                    <div class="card-item">
                        <div class="photo">
                            <img class="main-state" src="img/icon/graphic.svg" alt="">
                            <img class="hover" src="img/icon/graphic-hover.svg" alt="">
                        </div>
                        <p>Graphic<br>
                            Designer</p>
                    </div>
                    <div class="card-item">
                        <div class="photo">
                            <img class="main-state" src="img/icon/pm.svg" alt="">
                            <img class="hover" src="img/icon/pm-hover.svg" alt="">
                        </div>
                        <p>Project<br>
                            Management</p>
                    </div>
                    <div class="card-item">
                        <div class="photo">
                            <img class="main-state"src="img/icon/marketing.svg" alt="">
                            <img class="hover" src="img/icon/marketing-active.svg" alt="">
                        </div>
                        <p>Marketing &<br>
                            Communication</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="card-item">
                        <div class="photo">
                            <img class="main-state" src="img/icon/business-development.svg" alt="">
                            <img class="hover" src="img/icon/business-development-hover.svg" alt="">
                        </div>
                        <p>Another<br>
                            Category</p>
                    </div>
                    <div class="card-item">
                        <div class="photo">
                            <img class="main-state" src="img/icon/business-development.svg" alt="">
                            <img class="hover" src="img/icon/business-development-hover.svg" alt="">
                        </div>
                        <p>Another<br>
                            Category</p>
                    </div>
                    <div class="card-item">
                        <div class="photo">
                            <img class="main-state"src="img/icon/business-development.svg" alt="">
                            <img class="hover" src="img/icon/business-development-hover.svg" alt="">
                        </div>
                        <p>Another<br>
                            Category</p>
                    </div>
                    <div class="card-item">
                        <div class="photo">
                            <img class="main-state"src="img/icon/business-development.svg" alt="">
                            <img class="hover" src="img/icon/business-development-hover.svg" alt="">
                        </div>
                        <p>Another<br>
                            Category</p>
                    </div>
                </div>
            </div>
            <div class="carousel-nav">
                <a class="nav-item" role="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev"><img src="img/icon/prew-arrow.svg" alt=""></a>
                <a class="nav-item" role="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next"><img src="img/icon/next-arrow.svg" alt=""></a>
            </div>
        </div>
    </div>
    <!--job offers-->
    <div class="job-offers">
        <h1>Job <span class="green">offers</span></h1>
        <a href="">All offers <img style="width: 20px; margin-left: 20px;" src="/img/icon/arrow-right-icon.svg" alt=""></a>
        <div class="row pt-5">
            <div class="image col-md-4">
                <img src="img/job-offers.png" alt="">
            </div>
            <div class="col-md-4">
                <div class="offert-wrapper">
                    <div class="offert">
                        <div>
                            <div class="offert-description">
                                <div class="company-logo">
                                    <img src="img/icon/go-icon.svg" alt="">
                                </div>
                                <div class="description">
                                    <p class="company-name">Go! SM</p>
                                    <p class="description">It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                </div>
                            </div>
                            <div class="offert-meta">
                                <p class="location">location: <span class="city">Stuttgart</span></p>
                                <p class="offert-counter">Jobs: <span class="green"><strong>3</strong></span></p>
                            </div>
                        </div>
                    </div>
                    <a href="" class="main-btn">See details</a>
                </div>
                <div class="offert-wrapper">
                    <div class="offert">
                        <div>
                            <div class="offert-description">
                                <div class="company-logo">
                                    <img src="img/icon/create-paper-icon.svg" alt="">
                                </div>
                                <div class="description">
                                    <p class="company-name">Create Paper</p>
                                    <p class="description">It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                </div>
                            </div>
                            <div class="offert-meta">
                                <p class="location">location: <span class="city">Pekin</span></p>
                                <p class="offert-counter">Jobs: <span class="green"><strong>5</strong></span></p>
                            </div>
                        </div>
                    </div>
                    <a href="" class="main-btn">See details</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="offert-wrapper">
                    <div class="offert">
                        <div>
                            <div class="offert-description">
                                <div class="company-logo">
                                    <img src="img/icon/social-road-icon.svg" alt="">
                                </div>
                                <div class="description">
                                    <p class="company-name">Social Road</p>
                                    <p class="description">It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                </div>
                            </div>
                            <div class="offert-meta">
                                <p class="location">location: <span class="city">San Francisco</span></p>
                                <p class="offert-counter">Jobs: <span class="green"><strong>2</strong></span></p>
                            </div>
                        </div>
                    </div>
                    <a href="" class="main-btn">See details</a>
                </div>
                <div class="offert-wrapper">
                    <div class="offert">
                        <div>
                            <div class="offert-description">
                                <div class="company-logo">
                                    <img src="img/icon/point-design-icon.svg" alt="">
                                </div>
                                <div class="description">
                                    <p class="company-name">Point Design</p>
                                    <p class="description">It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                </div>
                            </div>
                            <div class="offert-meta">
                                <p class="location">location: <span class="city">Tempe</span></p>
                                <p class="offert-counter">Jobs: <span class="green"><strong>8</strong></span></p>
                            </div>
                        </div>
                    </div>
                    <a href="" class="main-btn">See details</a>
                </div>
            </div>
        </div>
    </div>
    <!--Top Notch Service-->
    <div class="service text-center">
        <h1>Top Notch <span class="green">Service</span></h1>
        <div class="service-items">
            <div class="item">
                <img src="img/icon/cv-icon.svg" alt="">
                <span class="counter">2 331</span>
                <span>Job offers</span>
            </div>
            <div class="item">
                <img src="img/icon/customers.svg" alt="">
                <span class="counter">1 148</span>
                <span>Satisfied customers</span>
            </div>
            <div class="item">
                <img src="img/icon/applications.svg" alt="">
                <span class="counter">5 364</span>
                <span>Applications sent</span>
            </div>
            <div class="item">
                <img src="img/icon/projects.svg" alt="">
                <span class="counter">1 764</span>
                <span>Realized projects</span>
            </div>
        </div>
    </div>
    <!-- Newsletter -->
    <div class="update-news">
        <div class="row">
            <div class="col-md-5 news-text">
                <h2>Get your update news</h2>
                <p>If you going to use a passage of Lotem Ipsum, you need to be sure there  isn’t anything embarrassing.</p>
            </div>
            <div class="col-md-7 news-form">
                <input type="email" name="email" placeholder="Enter your email" id="">
                <button type="submit">Send</button>
            </div>
        </div>
    </div>
    <div class="find-jobs text-center">
        <h1><span class="green">Find jobs</span> around<br>the world</h1>
    </div>
@endsection
