@extends('layouts.frontend')

@section('content')
<!--====== BLOG TITLE PART START ======-->
<div class="page-title-area d-flex align-items-center bg_cover" style="background-image: url(/assets/images/page-title-bg.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title-content mt-5 pt-5 text-center">
                    <h3 class="title">{{ $page_data['title'] ?? '' }}</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">All Blogs</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!--====== BLOG TITLE PART ENDS ======-->

<section class="blog-3-area pt-3">
    <div class="container">
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
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>
@endsection