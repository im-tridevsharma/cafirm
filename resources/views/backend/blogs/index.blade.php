@extends('layouts.backend')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Blogs</h4>
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
                                        Slug
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
                                @if(isset($blogs) && count($blogs) > 0)
                                @foreach($blogs as $blog)
                                <tr>
                                    <td>
                                        {{ $blog->title??'' }}
                                    </td>
                                    <td>
                                        <a target="_blank" href="{{ $blog->slug??'' }}">{{ $blog->slug??'' }}</a>
                                    </td>
                                    <td>
                                        {{ $blog->status === 1 ? 'Active' : 'De-Active' }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.blogs.comments', _e($blog->id)) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Comments"><i class=" fa fa-comment"></i> {{ \App\Models\BlogComment::where("blog_id", $blog->id)->count() }}</a>
                                        <a href="{{ route('admin.blogs.edit', _e($blog->id)) }}" class="btn btn-info btn-sm" data-toggle="tooltip" title="Edit"><i class=" fa fa-edit"></i></a>
                                        <a href="{{ route('admin.blogs.delete', _e($blog->id)) }}" class="btn btn-danger btn-sm confirmation" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="6" class="text-danger">No Blogs found!</td>
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