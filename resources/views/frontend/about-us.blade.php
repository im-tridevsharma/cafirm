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
                            <li class="breadcrumb-item active" aria-current="page">{{ $page_data['title'] ?? '' }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="why-choose-area why-choose-about pt-120">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-9">
                <div class="why-choose-content">
                    <div class="content">
                        <span>Why Choose Us</span>
                        <h3 class="title">ABOUT US</h3>
                        <p>With an experience of over 22 years and having successfully served over 50,000 satisfied clients, HelpMyBiz is one of the leading Tax and Company/Individual Compliances Consultant in India. Our team is made up of extremely dedicated, professional and well trained CA/CS/Advocates experts from all over India. We take pride in providing seamless solutions for any issues related to Income Tax Filings, GST Filings, Company/Partnership formations, Compliances, Accounting and Legal Services.</p>
                        <p>“The reward for good work is more work”</p>
                        <p>Being an Industry Leader comes with an additional responsibility of maintaining the consistency and quality of work for each and every client.</p>
                        <p>Being an Industry Leader comes with an additional responsibility of maintaining the consistency and quality of work for each and every client.</p>
                        <h4>MISSION</h4>
                        <p>Our mission is to relieve our clients from tax and compliances burden completely. This is done by proper Tax Planning in accordance to government rules and regulations.</p>
                        <h4>VISION</h4>
                        <p>Our vision is to keep improving and updating ourself so as to live up to the immense trust our clients place on us as their own personal Financial and Tax Planner.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="why-choose-thumb">
                    <img src="/assets/images/why-choose-thumb.jpg" alt="">

                </div>
            </div>
        </div>
    </div>
</section>

@include('frontend.partials.teams')

@include('frontend.partials.contact_form')

@include('frontend.partials.associates')

@endsection