@extends('layouts.backend')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Membership Bookings</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <tr>
                                    <th>
                                        Fullname
                                    </th>

                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Mobile
                                    </th>
                                    <th>
                                        Plan Name
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($bookings) && count($bookings) > 0)
                                @foreach($bookings as $booking)
                                <tr>
                                    <td>
                                        {{ $booking->first_name??'' }}
                                    </td>
                                    <td>
                                        {{ $booking->email??'' }}
                                    </td>
                                    <td>
                                        {{ $booking->mobile??'' }}
                                    </td>
                                    <td>
                                        {{ $booking->plan??'' }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.bookings.view', _e($booking->id)) }}" class="btn btn-info btn-sm" data-toggle="tooltip" title="View"><i class=" fa fa-eye"></i></a>
                                        <a href="{{ route('admin.bookings.delete', _e($booking->id)) }}" class="btn btn-danger btn-sm confirmation-restrict" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="6" class="text-danger">No Bookings found!</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection