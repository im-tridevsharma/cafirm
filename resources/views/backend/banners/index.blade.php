@extends('layouts.backend')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Banners</h4>
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
                                        Image
                                    </th>
                                    <th>
                                        Link
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
                                @if(isset($banners) && count($banners) > 0)
                                @foreach($banners as $banner)
                                <tr>
                                    <td>
                                        {{ $banner->title??'' }}
                                    </td>
                                    <td>
                                        @if($banner->image_url)
                                        <img style="height: 60px;object-fit:contain;" src="{{ $banner->image_url }}" alt="{{ $banner->title }}" />
                                        @endif
                                    </td>
                                    <td>
                                        {{ $banner->link??'' }}
                                    </td>
                                    <td>
                                        {{ $banner->status === 1 ? 'Active' : 'De-Active' }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.banners.edit', _e($banner->id)) }}" class="btn btn-info btn-sm" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
                                        <a href=" {{ route('admin.banners.delete', _e($banner->id)) }}" class="confirmation btn btn-danger btn-sm" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan=" 6" class="text-danger">No Banners found!
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