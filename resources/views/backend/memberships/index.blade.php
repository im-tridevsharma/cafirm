@extends('layouts.backend')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Plans</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <tr>
                                    <th>
                                        Title
                                    </th>
                                    <th>
                                        Category
                                    </th>
                                    <th>
                                        Validity
                                    </th>
                                    <th>
                                        Basic Price
                                    </th>
                                    <th>
                                        Discount Rate
                                    </th>
                                    <th>
                                        Discounted Price
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($memberships) && count($memberships) > 0)
                                @foreach($memberships as $membership)
                                <tr>
                                    <td>
                                        {{ $membership->title??'' }}
                                    </td>
                                    <td>
                                        {{ \App\Models\Category::find($membership->category_id)->name??'' }}
                                    </td>
                                    <td>
                                        {{ date("d-m-Y", strtotime($membership->validity))??'' }}
                                    </td>
                                    <td>
                                        {{ $membership->basic_price??'' }}
                                    </td>
                                    <td>
                                        {{ $membership->discount_rate??'' }}%
                                    </td>
                                    <td>
                                        {{ $membership->discounted_price??'' }}
                                    </td>
                                    <td>
                                        {{ $membership->status === 1 ? 'Active' : 'De-Active' }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.memberships.edit', _e($membership->id)) }}" class="btn btn-info btn-sm" data-toggle="tooltip" title="Edit"><i class=" fa fa-edit"></i></a>
                                        <a href="{{ route('admin.memberships.delete', _e($membership->id)) }}" class="btn btn-danger btn-sm confirmation" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="10" class="text-danger">No Memberships found!</td>
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