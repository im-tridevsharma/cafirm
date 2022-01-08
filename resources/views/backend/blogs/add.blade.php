@extends('layouts.backend')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-user">
                <div class="card-header">
                    <h5 class="card-title">Add Blog</h5>
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
                    <form method="POST" action="{{ route('admin.blogs.save') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" id="title" class="form-control" value="{{ old('title')??'' }}" placeholder="Blog Title" name="title">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option value="">Select</option>
                                        <option value="1" {{ old('status') === 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ old('status') === 0 ? 'selected' : '' }}>De-Active</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Slug</label>
                                    <input type="text" id="slug" class="form-control" value="{{ old('slug')??'' }}" placeholder="Blog Slug(auto generated)" name="slug">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Sub Title</label>
                                    <input type="text" class="form-control" value="{{ old('subtitle')??'' }}" placeholder="Blog Sub Title" name="subtitle">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Content</label>
                                    <textarea id="ckeditor" name="content" class="form-control">{{ old('content')??'' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="coverPreview" style="display:none;">
                            <div class="col-md-12">
                                <label>Preview</label>
                                <div style="width:100%; height:100px; overflow:hidden;">
                                    <img src="" alt="banner-preview" id="imagePrv" style="height:100px;object-fit:contain;" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-file-upload form-file-simple">
                                    <label>Cover Image</label>
                                    <input type="text" id="fileName" class="form-control inputFileVisible" placeholder="Choose Image...">
                                    <input type="file" class="inputFileHidden" name="cover_image" id="file" accept=".jpg,.png,.jpeg">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Category</label>
                                    <input type="text" name="category" class="form-control" value="{{ old('category') ?? '' }}" placeholder="Type Category"/>
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
<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content');

    $("#title").on("keyup", () => {
        const host = "{{ url('/') }}";
        $("#slug").val(host + '/blog/' + $("#title").val().toLowerCase().replace(/ /g, '-')
            .replace(/[^\w-]+/g, ''));
    });

    $("#file").on("change", function(e) {
        const ext = $(this).val().split(".").reverse()[0];
        if (!["png", "jpeg", "jpg"].includes(ext)) {
            alert("Please select valid file for image.");
        }
        $("#fileName").val(e.target.files[0].name);
        $("#coverPreview").css("display", "flex");
        $("#imagePrv").attr("src", URL.createObjectURL(e.target.files[0]));
    });
</script>
@endsection