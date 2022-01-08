@extends('layouts.backend')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Reviews</h4>
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
                                        Rating
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
                                @if(isset($reviews) && count($reviews) > 0)
                                @foreach($reviews as $review)
                                <tr>
                                    <td>
                                        {{ $review->fullname??'' }}
                                    </td>
                                    <td>
                                        {{ $review->rating??'' }}
                                    </td>
                                    <td>
                                        {{ $review->status === 1 ? 'Approved' : 'Dis-Approved' }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.reviews.edit', _e($review->id)) }}" class="btn btn-info btn-sm" data-toggle="tooltip" title="Edit"><i class=" fa fa-edit"></i></a>
                                        <a href="{{ route('admin.reviews.delete', _e($review->id)) }}" class="btn btn-danger btn-sm confirmation" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="6" class="text-danger">No Reviews found!</td>
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