@extends('layouts.backend')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Comments</h4>
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
                                        Email
                                    </th>
                                    <th>
                                        Comment
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
                                @if(isset($comments) && count($comments) > 0)
                                @foreach($comments as $comment)
                                <tr>
                                    <td>
                                        {{ $comment->fullname??'' }}
                                    </td>
                                    <td>
                                        {{ $comment->email??'' }}
                                    </td>
                                    <td>
                                        {{ $comment->comment??'' }}
                                    </td>
                                    <td>
                                        {{ $comment->status === 1 ? 'Approved' : 'Dis-Approved' }}
                                    </td>
                                    <td>
                                        @if(false)
                                        <a href="{{ route('admin.comments.edit', _e($comment->id)) }}" class="btn btn-info btn-sm" data-toggle="tooltip" title="Edit"><i class=" fa fa-edit"></i></a>
                                        <a href="{{ route('admin.comments.delete', _e($comment->id)) }}" class="btn btn-danger btn-sm confirmation" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="6" class="text-danger">No Comments found!</td>
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