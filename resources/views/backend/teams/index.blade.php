@extends('layouts.backend')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Teams</h4>
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
                                        Designation
                                    </th>
                                    <th>
                                        Email
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
                                @if(isset($teams) && count($teams) > 0)
                                @foreach($teams as $team)
                                <tr>
                                    <td>
                                        {{ $team->name??'' }}
                                    </td>
                                    <td>
                                        @if($team->image)
                                        <img style="height: 60px;object-fit:contain;" src="{{ $team->image }}" alt="{{ $team->title }}" />
                                        @endif
                                    </td>
                                    <td>
                                        {{ $team->designation??'' }}
                                    </td>
                                    <td>
                                        {{ $team->email??'' }}
                                    </td>
                                    <td>
                                        {{ $team->status === 1 ? 'Active' : 'De-Active' }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.teams.edit', _e($team->id)) }}" class="btn btn-info btn-sm" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
                                        <a href=" {{ route('admin.teams.delete', _e($team->id)) }}" class="confirmation btn btn-danger btn-sm" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan=" 6" class="text-danger">No Teams found!
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