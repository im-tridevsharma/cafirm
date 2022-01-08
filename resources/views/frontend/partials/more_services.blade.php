@php 
$more_services = \App\Models\Page::where("business_category", $page->business_category ?? 0)->where("status", 1)->get();
@endphp

<section class="services-details-area pt-90 pb-120">
    <div class="container">
        <div class="row justify-content-center">
            @if(false)
            <div class="col-lg-4 col-md-7 order-lg-1 order-2">
                <div class="services-details-sedebar mt-30">
                    <div class="services-items">
                        <div class="services-items-title">
                            <h4 class="title">More Services</h4>
                        </div>
                        <div class="services-items-list">
                            @if($more_services && count($more_services) > 0)
                            @foreach($more_services as $service)
                            <div class="item">
                                <a href="{{ $service->slug ?? url('/') }}">
                                    <h5 class="title">{{ $service->name ?? '' }}</h5>
                                </a>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="services-items mt-50">
                        <div class="services-items-title">
                            <h4 class="title">Search</h4>
                        </div>
                        <div class="services-search">
                            <form action="#">
                                <div class="input-box">
                                    <input type="text" placeholder="Search...">
                                    <button><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="col-lg-12 order-lg-2 order-1">
                <div class="services-details-content mt-30">
                    <div class="services-details-thumb">
                        <img src="{{ $page->cover }}" alt="{{ $page->name }}">
                        <span>{{ _config('site_name') }}</span>
                        <h3 class="title mb-4">{{ strtoupper($page->name ?? '') }}</h3>
                        {{-- page content --}}
                        {!! $page->content ?? '' !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
