@extends('layouts.backend')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Business Categories</h4>
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
                                        Status
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($business_categories) && count($business_categories) > 0)
                                @foreach($business_categories as $category)
                                <tr>
                                    <td>
                                        {{ $category->name??'' }}
                                    </td>
                                    <td>
                                        {{ $category->status === 1 ? 'Active' : 'De-Active' }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.business_categories.edit', _e($category->id)) }}" class="btn btn-info btn-sm" data-toggle="tooltip" title="Edit"><i class=" fa fa-edit"></i></a>
                                        <a href="{{ route('admin.business_categories.delete', _e($category->id)) }}" class="btn btn-danger btn-sm confirmation" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="6" class="text-danger">No Business Categories found!</td>
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