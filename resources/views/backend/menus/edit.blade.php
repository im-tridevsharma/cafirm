@extends('layouts.backend')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-user">
                <div class="card-header">
                    <h5 class="card-title">Update Menu</h5>
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
                    <form method="POST" action="{{ route('admin.menus.update', _e($menu->id)??0) }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" placeholder="Menu Name" name="title" value="{{ $menu->title??'' }}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Order</label>
                                    <input type="number" min="0" class="form-control" name="sort_order" value="{{ $menu->sort_order??'' }}"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Position</label>
                                    <select name="position" class="form-control">
                                        <option value="">Select</option>
                                        <option value="top" {{ $menu->position === 'top' ? 'selected':'' }}>Top</option>
                                        <option value="bottom" {{ $menu->position === 'bottom' ? 'selected':'' }}>Bottom</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option value="">Select</option>
                                        <option value="1" {{ $menu->status === 1 ? 'selected':'' }}>Active</option>
                                        <option value="0" {{ $menu->status === 0 ? 'selected':'' }}>De-Active</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Slug(for pages or blog)</label>
                                    <input type="text" readonly name="slug" id="slug" class="form-control" value="{{ $menu->slug??'' }}" placeholder="auto filled for pages or blogs"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Redirect</label>
                                    <input type="text" name="redirect" class="form-control" value="{{ $menu->redirect??'' }}" placeholder="Redirect Link"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Pages</label>
                                    <select class="form-control" name="page_id" id="page" data-type="page">
                                        <option value="">From Page</option>
                                        @if($pages && count($pages) > 0)
                                        @foreach($pages as $page)
                                        <option value="{{ _e($page->id) }}" data-link="{{$page->slug}}" {{ $menu->page_id === $page->id ? 'selected' : '' }}>{{ $page->name }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Blogs</label>
                                    <select class="form-control" name="blog_id" id="blog" data-type="blog">
                                        <option value="">From Blog</option>
                                        @if($blogs && count($blogs) > 0)
                                        @foreach($blogs as $blog)
                                        <option value="{{ _e($blog->id) }}" data-link="{{$blog->slug}}" {{ $menu->blog_id === $blog->id ? 'selected' : '' }}>{{ $blog->title }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Icon <span id="iprev" class="ml-5">{!! $menu->icon !!}</span></label>
                                    <input type="text" name="icon" id="icon" value="{{ $menu->icon ?? ''}}" class="form-control" placeholder="Paste Font Awesome icon tag here" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Parent</label>
                                    <select class="form-control" name="parent_id">
                                        <option value="">Select</option>
                                        @if($menus && count($menus) > 0)
                                        @foreach($menus as $m)
                                        <option value="{{ _e($m->id) }}" {{ $menu->parent_id === $m->id ? 'selected' : '' }}>{{ $m->title }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="update ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary btn-round">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $("#blog, #page").change(function(){
        const el = $(this).data("type");
        if(el === 'page'){
            $("#slug").val($("#page option:selected").data('link'));
            $("#blog").val("");
        }else if(el === 'blog'){
            $("#slug").val($("#blog option:selected").data('link'));
            $("#page").val("");
        }
    });
    $("#icon").keyup(function(){
        $("#iprev").html($(this).val());
    });
</script>
@endsection