@extends('layouts.backend')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Pages</h4>
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
                                        Slug
                                    </th>
                                    <th>
                                        Membership Category
                                    </th>
                                    <th>
                                        Business Category
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
                                @if(isset($pages) && count($pages) > 0)
                                @foreach($pages as $page)
                                <tr>
                                    <td>
                                        {{ $page->name??'' }}
                                    </td>
                                    <td>
                                        <a target="_blank" href="{{ $page->slug??'' }}">{{ $page->slug??''}}</a>
                                    </td>
                                    <td>
                                        {{ \App\Models\Category::find($page->membership_category)->name ??'' }}
                                    </td>
                                    <td>
                                        {{ \App\Models\BusinessCategory::find($page->business_category)->name ??'' }}
                                    </td>
                                    <td>
                                        {{ $page->status === 1 ? 'Active' : 'De-Active' }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.pages.edit', _e($page->id)) }}" class="btn btn-info btn-sm" data-toggle="tooltip" title="Edit"><i class=" fa fa-edit"></i></a>
                                        <a href="{{ route('admin.pages.delete', _e($page->id)) }}" class="btn btn-danger btn-sm confirmation" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="6" class="text-danger">No Pages found!</td>
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