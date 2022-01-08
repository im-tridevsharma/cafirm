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
                            <li class="breadcrumb-item"><a href="{{ $page->slug }}">{{ $page->name ?? '' }}</a></li>
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
            <div class="col-md-4">
                <h4>Package Selected-</h4>
                <div class="mt-3">
                    <h3 class="pl-2">{{ $membership->title ?? '' }}</h3>
                    <i class="pl-2">{{ $membership->description ?? '' }}</i>
                    <del class="packAmt d-block">Pay Now->{{ intval($membership->basic_price) }}</del>
                    <p class="packDis mx-2">Discount - {{ $membership->discount_rate }}%</p>
                    <p class="packDisAmt">Rs. {{ intval($membership->discounted_price) }}/-</p>
                </div>
            </div>
            <div class="col-md-8">
                @if($errors->any())
                @foreach($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show">
                    <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="fa fa-times"></i>
                    </button>
                    <span>{{ $error }}</span>
                </div>
                @endforeach
                @endif

                @if(!$user)
                <form action="{{ route('membership-checkout-proceed') }}" method="POST">
                    <h4>Your Information-</h4>
                    <div class="row mt-3">
                        @csrf
                        <input type="hidden" name="membership" value="{{ _e($membership->id) }}" />
                        <input type="hidden" name="page" value="{{ _e($page->id) }}" />
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control" required name="first_name" value="{{ old('first_name') ?? '' }}" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control" required name="last_name" value="{{ old('last_name') ?? '' }}" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" required name="email" value="{{ old('email') ?? '' }}" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Mobile</label>
                                <input type="text" class="form-control" required name="mobile" value="{{ old('mobile') ?? '' }}" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control" name="address">{{ old('address') ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Your Note</label>
                                <textarea class="form-control" name="note" placeholder="Your message for administrator...">{{ old('note') ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-info">Proceed to Payment</button>
                        </div>
                    </div>
                </form>

                @elseif($order)
                <h4>Order has been created- {{ $order->order_id ?? '' }}</h4>
                <i>Click on Pay Button to pay amount.</i>
                <div class="row mt-5">
                    <div class="col-md-12">
                        <button class="btn btn-info" id="rzp-button1" type="button">Pay Now</button>
                    </div>
                </div>
                @else
                <p class="text-danger">Something went wrong!</p>
                @endif
            </div>
        </div>
    </div>
</section>

@if($user && $order)
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    var options = {
        "key": "{{ env('RAZOR_KEY') }}",
        // Enter the Key ID generated from the Dashboard    
        "amount": "{{ $order->amount * 100 }}",
        // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise    
        "currency": "INR",
        "name": "CA Firm",
        "description": "CA Firm Description.",
        "image": "{{ _config('site_logo') }}",
        "order_id": "{{ $order->order_id }}",
        //This is a sample Order ID. Pass the `id` obtained in the response of Step 1   
        "handler": function(response) {
            location.href = "{{ route('membership-save-payment') }}?status=success&pid="+response.razorpay_payment_id+"&oid="+response.razorpay_order_id+"&signature="+response.razorpay_signature;
        },
        "prefill": {
            "name": "{{ $user->first_name ?? '' }}  {{ $user->last_name ?? '' }}",
            "email": "{{ $user->email ?? '' }}",
            "contact": "{{ $user->mobile ?? '' }}"
        },
        "notes": {
            "address": "{{ $user->address ?? '' }}"
        },
        "theme": {
            "color": "#3399cc"
        }
    };

    var rzp1 = new Razorpay(options);
    rzp1.on('payment.failed', function(response) {
        location.href = "{{ route('membership-save-payment') }}?status=failed&pid="+response.error.metadata.payment_id+"&oid="+response.error.metadata.order_id+"&reason="+response.error.reason;
    });

    document.getElementById('rzp-button1').onclick = function(e) {
        rzp1.open();
        e.preventDefault();
    }
    
    document.getElementById('rzp-button1').click();
</script>
@endif
@endsection