@extends('layouts.frontend')

@section('content')
<div class="page-title-area d-flex align-items-center bg_cover" style="background-image: url(/assets/images/page-title-bg.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title-content mt-5 pt-5 text-center">
                    <h3 class="title">{{ $page_data['title'] ?? '' }}</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Membership Checkout</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $page_data['title'] ?? '' }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="my-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex flex-column align-items-center justify-content-center">
                @if($status === 'success')
                <img src="{{ asset('/images/payment-success.png') }}" alt="successful" style="height: 350px;object-fit:contain;"/>
                @else
                <img src="{{ asset('/images/payment-failed.png') }}" alt="failed" style="height: 350px;object-fit:contain;"/>
                <h2 class="text-danger">Payment Failed</h2>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection