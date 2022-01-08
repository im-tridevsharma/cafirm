@extends('layouts.frontend')

@section('content')

<!--====== BANNER PART START ======-->

<section class="banner-area banner-3-area d-flex align-items-center bg_cover" style="background-image: url(/assets/images/banner-bg-3.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="banner-content">
                    <span class=" wow fadeInLeft animated" data-wow-duration="2000ms" data-wow-delay="0ms">Smart Solutions</span>
                    <h1 class="title wow fadeInLeft animated" data-wow-duration="2000ms" data-wow-delay="300ms">Looking for someone trustworthy to file your tax returns online?</h1>
                    <ul class=" wow fadeInUp animated" data-wow-duration="2000ms" data-wow-delay="600ms">
                        <li><a class="main-btn" href="#">Get a Call Back <i class="flaticon-right-arrow"></i></a></li>
                        <li><a class="main-btn main-btn-2" href="{{ route('about-us') }}">About us <i class="flaticon-right-arrow"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!--====== BANNER PART ENDS ======-->

<!--====== BUSINESS WAY PART START ======-->

<section class="business-way-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="business-way-box">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-5">
                            <div class="business-way-content">
                                <h4 class="title">Why {{ _config('site_name') }}</h4>
                                <p>Vivamus faucibus ex nec sapien ultrices, vel pulvinar sapien dignissim. </p>
                                <a class="main-btn" href="#">Learn More</a>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="row business-way-slide">
                                <div class="col-lg-4">
                                    <div class="business-way-item white-bg text-center">
                                        <i class="flaticon-life"></i>
                                        <h5 class="title">OVER 20 YEARS EXPERIENCE OF PROFESSIONAL SERVICE IN INDIA</h5>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="business-way-item white-bg text-center">
                                        <i class="flaticon-protection"></i>
                                        <h5 class="title">WELL TRAINED AND DEDICATED EXPERT TEAM OF CA/CS/ADVOCATES</h5>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="business-way-item white-bg text-center">
                                        <i class="flaticon-delivery"></i>
                                        <h5 class="title">ONE STOP SOLUTION FOR ALL YOUR TAXATION AND COMPLIANCES NEED</h5>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="business-way-item white-bg text-center">
                                        <i class="flaticon-protection"></i>
                                        <h5 class="title">FAST AND ACCURATE SERVICE</h5>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="business-way-item white-bg text-center">
                                        <i class="flaticon-life"></i>
                                        <h5 class="title">ON TIME SERVICE DELIVERY</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--====== BUSINESS WAY PART ENDS ======-->

<!--====== WHY CHOOSE PART START ======-->

<section class="why-choose-3-area pt-115 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="why-choose-title">
                    <span>Our Best Features</span>
                    <h4 class="title">Our Professional Experts</h4>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="why-choose-title">
                    <p>Lorem ipsum dolor sit amet, coLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-7 col-sm-9">
                <div class="why-choose-list">
                    <div class="why-choose-list-item">
                        <a href="#">
                            <h5 class="title">Chartered Accountant</h5>
                        </a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod t</p>
                    </div>
                    <div class="why-choose-list-item">
                        <a href="#">
                            <h5 class="title">Company Secretary</h5>
                        </a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod t</p>
                    </div>
                    <div class="why-choose-list-item">
                        <a href="#">
                            <h5 class="title">Advocate</h5>
                        </a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod t</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="why-choose-thumb mt-30">
                    <img src="/assets/images/why-choose-thumb-2.jpg" alt="choose">
                </div>
            </div>
        </div>
    </div>
</section>

<!--====== WHY CHOOSE PART ENDS ======-->

<!--====== SERVICES 3 PART START ======-->
@include('frontend.partials.services')
<!--====== SERVICES 3 PART ENDS ======-->


<!--====== BRAND PART START ======-->

<section id="reg-section">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-6 py-0 px-0">
                <div class="brand-area brand-2-area">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="section-title text-center">
                                    <span>We are registered with</span>
                                </div>
                            </div>
                        </div>
                        <div class="row brand-active">
                            <div class="col-lg-4">
                                <div class="brand-item text-center">
                                    <a href="#"><img src="/assets/images/brand-11.png" alt="brand"></a>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="brand-item text-center">
                                    <a href="#"><img src="/assets/images/brand-11.png" alt="brand"></a>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="brand-item text-center">
                                    <a href="#"><img src="/assets/images/brand-11.png" alt="brand"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 py-0 px-0">
                <div class="brand-area2 brand-2-area">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="section-title text-center">
                                    <span>We Support</span>
                                </div>
                            </div>
                        </div>
                        <div class="row brand-active">
                            <div class="col-lg-4">
                                <div class="brand-item text-center">
                                    <a href="#"><img src="/assets/images/brand-11.png" alt="brand"></a>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="brand-item text-center">
                                    <a href="#"><img src="/assets/images/brand-11.png" alt="brand"></a>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="brand-item text-center">
                                    <a href="#"><img src="/assets/images/brand-11.png" alt="brand"></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--====== BRAND PART ENDS ======-->
<!--====== TESTIMONIALS 3 PART START ======-->

<section class="testimonials-3-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="testimonials-content mt-25">
                    <span>Client Testimonials</span>
                    <h3 class="title">What our clients say </h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipi siLorem ipsum dolor sit amet, consectetur adipisicing</p>
                    <a class="main-btn" href="#">Review Now <i class="flaticon-right-arrow"></i></a>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row testimonials-3-active">
                    @if(isset($testimonials) && count($testimonials) > 0)
                    @foreach($testimonials as $testimonial)
                    <div class="col-lg-6">
                        <div class="testimonials-3-item mt-30">
                            <div class="testimonials-box">
                                <i class="flaticon-quote"></i>
                                <p>{{ $testimonial->content ?? '' }}</p>
                            </div>
                            <div class="testimonials-3-item-text text-center">
                                <img src="{{ $testimonial->image ?? '/assets/images/user-3.png' }}" class="icon" alt="{{ $testimonial->name ?? '' }}">
                                <h5 class="title">{{ $testimonial->name ?? '' }}</h5>
                                <p>{{ $testimonial->role ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!--====== TESTIMONIALS 3 PART ENDS ======-->
<!--====== BRAND PART START ======-->

<div class="brand-area brand-2-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center">
                    <span>The names of companies for which we have done valuation so far</span>
                    <h3 class="title">Our Client</h3>
                </div>
            </div>
        </div>
        <div class="row brand-active">
            <div class="col-lg-2">
                <div class="brand-item text-center">
                    <a href="#"><img src="/assets/images/brand-111.png" alt="brand"></a>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="brand-item text-center">
                    <a href="#"><img src="/assets/images/brand-222.png" alt="brand"></a>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="brand-item text-center">
                    <a href="#"><img src="/assets/images/brand-333.png" alt="brand"></a>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="brand-item text-center">
                    <a href="#"><img src="/assets/images/brand-444.png" alt="brand"></a>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="brand-item text-center">
                    <a href="#"><img src="/assets/images/brand-555.png" alt="brand"></a>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="brand-item text-center">
                    <a href="#"><img src="/assets/images/brand-666.png" alt="brand"></a>
                </div>
            </div>
        </div>
    </div>
</div>

<!--====== BRAND PART ENDS ======-->


<!--====== BLOG 3 PART START ======-->

<section class="blog-3-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center">
                    <span>Latest News</span>
                    <h3 class="title">Our Blog</h3>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @if(isset($blogs) && count($blogs) > 0)
            @foreach($blogs as $blog)
            <div class="col-lg-4 col-md-7 col-sm-9">
                <div class="blog-item mt-30 wow fadeInUp animated" data-wow-duration="1200ms" data-wow-delay="0ms">
                    <div class="blog-thumb">
                        <img src="{{ url($blog->cover) }}" alt="{{ $blog->title }}">
                        <a href="#">{{ strtoupper($blog->category ?? '') }}</a>
                    </div>
                    <div class="blog-content">
                        <a href="{{ $blog->slug }}">
                            <h4 class="title">{{ $blog->title ?? '' }}</h4>
                        </a>
                        <ul>
                            <li><a href="#"><i class="fa fa-calendar"></i> {{ $blog->created_at->format('d M, Y') }}</a></li>
                            <li><a href="#"><i class="fa fa-user-o"></i> BY ADMIN</a></li>
                            <li><a href="#" class="ml-3"><i class="fa fa-comment-o"></i>{{ \App\Models\BlogComment::where("status",1)->where("blog_id", $blog->id)->count() }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>

<!--====== BLOG 3 PART ENDS ======-->

<!--====== BRAND PART START ======-->

<div class="brand-area brand-2-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center">
                    <span>Trusted by your </span>
                    <h3 class="title">Favorite Bands</h3>
                </div>
            </div>
        </div>
        <div class="row brand-active">
            <div class="col-lg-2">
                <div class="brand-item text-center">
                    <a href="#"><img src="/assets/images/brand-6.png" alt="brand"></a>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="brand-item text-center">
                    <a href="#"><img src="/assets/images/brand-7.png" alt="brand"></a>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="brand-item text-center">
                    <a href="#"><img src="/assets/images/brand-8.png" alt="brand"></a>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="brand-item text-center">
                    <a href="#"><img src="/assets/images/brand-9.png" alt="brand"></a>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="brand-item text-center">
                    <a href="#"><img src="/assets/images/brand-10.png" alt="brand"></a>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="brand-item text-center">
                    <a href="#"><img src="/assets/images/brand-7.png" alt="brand"></a>
                </div>
            </div>
        </div>
    </div>
</div>

<!--====== BRAND PART ENDS ======-->

@endsection