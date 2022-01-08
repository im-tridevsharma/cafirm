@php 
$business_categories = \App\Models\BusinessCategory::where("status", 1)->get();
@endphp
@if($business_categories && count($business_categories) > 0)
<section class="services-3-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center">
                    <span>Our Services</span>
                    <h3 class="title">Bouquet of highly preferred services</h3>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="section-title text-center">
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        @foreach($business_categories as $key => $category)
                        <li class="nav-item">
                            <a class="nav-link {{$key === 0 ? 'active' : ''}}" id="pills-{{($category->id)}}-tab" data-toggle="pill" href="#pills-{{($category->id)}}" role="tab" aria-controls="pills-{{($category->id)}}" aria-selected="{{ $key === 0 ? true : false}}">{{ $category->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="services-3-box pt-50">
    <div class="container">
        <div class="tab-content" id="pills-tabContent">
            @foreach($business_categories as $key => $category)
            <div class="tab-pane fade {{$key === 0 ? 'show active' : ''}}" id="pills-{{($category->id)}}" role="tabpanel" aria-labelledby="pills-{{($category->id)}}-tab">
                <div class="row justify-content-center">
                    @php 
                    $services = \App\Models\Page::where("business_category", $category->id)->limit(3)->get();
                    @endphp
                    @if($services && count($services) > 0)
                    @foreach($services as $service)
                    <div class="col-lg-4 col-md-7 col-sm-9">
                        <div class="services-item mt-30">
                            <div class="services-thumb">
                                <img src="{{ $service->cover ?? '' }}" alt="{{ $service->name ?? '' }}">
                            </div>
                            <div class="services-content">
                                <div class="services-title">
                                    {{-- <img src="/assets/images/icon/icon-1.png" alt="services"> --}}
                                    <a href="{{ $service->slug ?? url('/') }}">
                                        <h5 class="title">{{ $service->name ?? '' }}</h5>
                                    </a>
                                </div>
                                <div class="text-center">
                                    <p>{{ $service->subtitle ?? '' }}</p>
                                    <a class="main-btn ml-20" href="{{ $service->slug ?? url('/') }}">Book Now <i class="flaticon-right-arrow"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif