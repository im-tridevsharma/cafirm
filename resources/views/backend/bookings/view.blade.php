@extends('layouts.backend')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title d-flex align-items-center justify-content-between">View Membership Booking <a href="{{ route('admin.bookings') }}" class="btn btn-info btn-sm">Back</a></h4>
                </div>
                <div class="card-body">
                    @php 
                    $page = \App\Models\Page::select(['name', 'slug'])->find($booking->page_id);
                    @endphp
                    @if($page)
                    <h5 style="margin-top: -15px;">Reference Page - <a target="_blank" href="{{ $page->slug ?? url('/') }}">{{ $page->name ?? '' }}</a></h5>
                    @endif
                    <h6>User Details-</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>First Name</label>
                                <p class="form-control">{{ $booking->user->first_name ?? '' }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Last Name</label>
                                <p class="form-control">{{ $booking->user->last_name ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <p class="form-control">{{ $booking->user->email ?? '' }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Mobile</label>
                                <p class="form-control">{{ $booking->user->mobile ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Address</label>
                                <p class="form-control">{{ $booking->user->address ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                    <h6>Plan Details (<i>information may be updated</i>)</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Plan Name</label>
                                <p class="form-control">{{ $booking->membership->title ?? '' }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Basic Amount</label>
                                <p class="form-control">{{ $booking->membership->basic_price ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Discount Rate</label>
                                <p class="form-control">{{ $booking->membership->discount_rate ?? 0 }}%</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Discounted Amount</label>
                                <p class="form-control">{{ $booking->membership->discounted_price ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                    <h6>Payment Details-</h6>
                    @php
                    $payment = \App\Models\Payment::where("user_membership_id", $booking->id)->first();
                    @endphp
                    @if($payment)
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Transaction ID</label>
                                <p class="form-control">{{ $payment->txn_id ?? '' }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Order ID</label>
                                <p class="form-control">{{ $payment->order_id ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Amount Paid</label>
                                <p class="form-control">{{ $payment->amount ?? '' }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Payment Time</label>
                                <p class="form-control">{{ $payment->created_at ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Payment Status</label>
                                <b style="font-weight: 800;" class="form-control {{ $payment->status==='success' ? 'text-success':'text-danger'}}">{{ $payment->status ?? '' }}</b>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Payment Through</label>
                                <p class="form-control">{{ $payment->gateway_used ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @if($payment->failed_reason)
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Failed Reason</label>
                                <p class="form-control">{{ $payment->failed_reason ?? '' }}</p>
                            </div>
                        </div>
                        @endif
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>User note</label>
                                <p class="form-control">{{ $booking->note ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                    @else
                    <i class="text-danger">No payment details found!</i>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection