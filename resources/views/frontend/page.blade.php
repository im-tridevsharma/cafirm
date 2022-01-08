@extends('layouts.frontend')

@section('content')
<!--====== PAGE TITLE PART START ======-->
@php

$orders = [];

$orders[$page->content_order] = 'page_content';
$orders[$page->description1] = 'description1';
$orders[$page->description2] = 'description2';
$orders[$page->membership_order] = 'membership';
$orders[$page->contact_form_order] = 'contact_form';

ksort($orders)

@endphp
<div class="page-title-area d-flex align-items-center bg_cover" style="background-image: url(/assets/images/page-title-bg.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title-content mt-5 pt-5 text-center">
                    <h3 class="title">{{ $page->name ?? '' }}</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $page->name ?? '' }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<!--====== PAGE TITLE PART ENDS ======-->


@if($orders && count($orders) > 0)

    @foreach($orders as $order)
        @if($order === 'page_content')   
            <!--====== contains services and default page contnt ======-->
            @include('frontend.partials.more_services')
            <!--====== end ======-->
        @endif
        @if($order === 'description1')   
            <!--description 1-->
            <div class="services-details-area">
                <div class="container">
                    <div class="row mt-5">
                        <div class="col-lg-12 col-md-12 services-details-content">
                            <div class="services-details-play-content">
                                {!! $page->description1 ?? '' !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if($order === 'description2')   
            <!--description 2-->
            <div class="services-details-area">
                <div class="container">
                    <div class="row mt-5">
                        <div class="col-lg-12 col-md-12 services-details-content">
                            <div class="services-details-play-content">
                                {!! $page->description2 ?? '' !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if($order === 'membership')   
            @include('frontend.partials.packages')
        @endif
        @if($order === 'contact_form')   
            @if($page->is_contact_form)
                @include('frontend.partials.contact_form')
            @endif
        @endif
    @endforeach

@endif


<!--why content-->
@include('frontend.partials.why')

<!--pages services-->
@include('frontend.partials.services')

<!--clients-->
@include('frontend.partials.clients')

<!--associtates-->
@include('frontend.partials.associates')

@endsection