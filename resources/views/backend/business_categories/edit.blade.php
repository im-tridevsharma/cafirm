@extends('layouts.backend')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-user">
                <div class="card-header">
                    <h5 class="card-title">Update Business Category</h5>
                </div>
                <div class="card-body">
                    @if($errors->any())
                    @foreach($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                        </button>
                        <span>{{ $error }}</span>
                    </div>
                    @endforeach
                    @endif
                    <form method="POST" action="{{ route('admin.business_categories.update', _e($category->id)??'') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" value="{{ $category->name??'' }}" placeholder="Category Name" name="name">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option value="">Select</option>
                                        <option value="1" {{ $category->status === 1 ? 'selected':'' }}>Active</option>
                                        <option value="0" {{ $category->status === 0 ? 'selected':'' }}>De-Active</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="update ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary btn-round">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection