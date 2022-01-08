@php 
$packages = \App\Models\Membership::where("category_id", $page->membership_category)->
where("status", 1)->whereDate("validity", ">=", date("Y-m-d"))->get();
@endphp

<div class="brand-area brand-2-area my-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section-title text-center">
                    <span>Explore</span>
                    <h3 class="title">Our Packages</h3>
                </div>
            </div>

            @if($packages && count($packages) > 0)
            @foreach($packages as $package)
            <div class="col-lg-4 mb-2">
                <div class="package-box text-center">
                    <div class="package-head">
                        <h3>{{ $package->title ?? '' }}</h3>
                    </div>
                    <div class="package-body">
                        <ul class="package-list">
                            @foreach(json_decode($package->features) as $feature)
                            <li>{{ $feature ?? '-'}}</li>
                            @endforeach
                        </ul>
                        <del class="packAmt d-block">Pay Now->{{ intval($package->basic_price) }}</del>
                        <p class="packDis">Discount – {{ $package->discount_rate }}%</p>
                        <p class="packDisAmt">Rs. {{ intval($package->discounted_price) }}/-</p>
                        <a href="{{ route('membership-checkout', ['membership' => _e($package->id), 'page' => _e($page->id)]) }}" class="main-btn mt-4 mb-4">Buy Now</a>
                    </div>

                </div>
            </div>
            @endforeach
            @endif
            <div class="col-lg-12">
                <p class="hlTxt">*excluding income tax audit fees</p>
            </div>
        </div>
    </div>
</div>