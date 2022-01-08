@extends('layouts.backend')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Menus</h4>
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
                                        Icon
                                    </th>
                                    <th>
                                        Slug/Redirect
                                    </th>
                                    <th>
                                        Sort Order
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
                                @if(isset($menus) && count($menus) > 0)
                                @foreach($menus as $menu)
                                <tr>
                                    <td>
                                        {{ $menu->title??'' }}
                                    </td>
                                    <td>
                                        {!! $menu->icon??'' !!}
                                    </td>
                                    <td>
                                        <a href="{{ $menu->redirect !== '' ? $menu->redirect : $menu->slug }}" target="_blank">{{ $menu->redirect !== '' ? $menu->redirect : $menu->slug }}</a>
                                    </td>
                                    <td>
                                        {{ $menu->sort_order }}
                                    </td>
                                    <td>
                                        {{ $menu->parent_id ? (\App\Models\Menu::find($menu->parent_id) ? \App\Models\Menu::find($menu->parent_id)->title : '-') : '' }}
                                    </td>
                                    <td>
                                        {{ $menu->status === 1 ? 'Active' : 'De-Active' }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.menus.edit', _e($menu->id)) }}" class="btn btn-info btn-sm" data-toggle="tooltip" title="Edit"><i class=" fa fa-edit"></i></a>
                                        <a href="{{ route('admin.menus.delete', _e($menu->id)) }}" class="btn btn-danger btn-sm confirmation" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="6" class="text-danger">No Menus found!</td>
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