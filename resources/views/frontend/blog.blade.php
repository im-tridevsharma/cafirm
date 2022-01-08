@extends('layouts.frontend')

@section('content')
<!--====== BLOG TITLE PART START ======-->

<div class="page-title-area d-flex align-items-center bg_cover" style="background-image: url(/assets/images/page-title-bg.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title-content mt-5 pt-5 text-center">
                    <h3 class="title">{{ $blog->title ?? '' }}</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/blogs') }}">Blogs</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $blog->title ?? '' }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<!--====== BLOG TITLE PART ENDS ======-->

<section class="services-details-area pt-90">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 order-lg-2 order-1">
                <div class="services-details-content mt-30">
                    <div class="services-details-thumb">
                        <img src="{{ $blog->cover }}" alt="{{ $blog->title }}">
                        <span>{{ $blog->category }}</span>
                        <h3 class="title mb-4">{{ strtoupper($blog->title ?? '') }}</h3>
                        {{-- blog content --}}
                        {!! $blog->content ?? '' !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('frontend.partials.comments-system')

@include('frontend.partials.related-blogs')

@endsection
