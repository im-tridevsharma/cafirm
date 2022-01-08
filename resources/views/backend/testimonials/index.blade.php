@extends('layouts.backend')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Testimonials</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <tr>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Image
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
                                @if(isset($testimonials) && count($testimonials) > 0)
                                @foreach($testimonials as $testimonial)
                                <tr>
                                    <td>
                                        {{ $testimonial->name??'' }}
                                    </td>
                                    <td>
                                        @if($testimonial->image)
                                        <img style="height: 60px;object-fit:contain;" src="{{ $testimonial->image }}" alt="{{ $testimonial->title }}" />
                                        @endif
                                    </td>
                                    <td>
                                        {{ $testimonial->status === 1 ? 'Active' : 'De-Active' }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.testimonials.edit', _e($testimonial->id)) }}" class="btn btn-info btn-sm" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
                                        <a href=" {{ route('admin.testimonials.delete', _e($testimonial->id)) }}" class="confirmation btn btn-danger btn-sm" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan=" 6" class="text-danger">No Testimonials found!
                                    </td>
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