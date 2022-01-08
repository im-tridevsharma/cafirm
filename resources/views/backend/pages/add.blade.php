@extends('layouts.backend')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-user">
                <div class="card-header">
                    <h5 class="card-title">Add Page</h5>
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
                    <form method="POST" action="{{ route('admin.pages.save') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" id="name" value="{{ old('name')??'' }}" class="form-control" placeholder="Page Name" name="name">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option value="">Select</option>
                                        <option value="1">Active</option>
                                        <option value="0">De-Active</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Slug</label>
                                    <input type="text" id="slug" value="{{ old('slug')??'' }}" class="form-control" placeholder="Page Slug(auto generated)" name="slug">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Business Category</label>
                                    <select name="business_category" class="form-control">
                                        <option value="">Select</option>
                                        @if(isset($b_categories) && count($b_categories) > 0)
                                        @foreach($b_categories as $category)
                                        <option value="{{ _e($category->id) }}">{{ $category->name }}</option>
                                        @endforeach
                                        @else
                                        <option value="">Add New Business Category to Select</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Membership Category</label>
                                    <select name="membership_category" class="form-control">
                                        <option value="">Select</option>
                                        @if(isset($categories) && count($categories) > 0)
                                        @foreach($categories as $category)
                                        <option value="{{ _e($category->id) }}">{{ $category->name }}</option>
                                        @endforeach
                                        @else
                                        <option value="">Add New Category to Select</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Sub Title</label>
                                    <input type="text" id="subtitle" value="{{ old('subtitle')??'' }}" class="form-control" placeholder="Page Sub Title" name="subtitle">
                                </div>
                            </div>
                        </div>
                        <div class="row" id="bannerPreview" style="display:none;">
                            <div class="col-md-12">
                                <label>Preview</label>
                                <div style="width:100%; height:100px; overflow:hidden;">
                                    <img src="" alt="banner-preview" id="imagePrv" style="height:100px;object-fit:contain;" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-file-upload form-file-simple">
                                    <label>Cover</label>
                                    <input type="text" id="fileName" class="form-control inputFileVisible" placeholder="Choose Image...">
                                    <input type="file" class="inputFileHidden" name="cover" id="file" accept=".jpg,.png,.jpeg">
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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>More Description 1</label>
                                    <textarea id="ckeditor2" name="description1" class="form-control">{{ old('description1')??'' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>More Description 2</label>
                                    <textarea id="ckeditor3" name="description2" class="form-control">{{ old('description2')??'' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Enable Contact Form</label>
                                    <input type="checkbox" name="is_contact_form" value="1" class="d-block" {{ old('is_contact_form') == 1 ? 'checked' : '' }} />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Contact Form Order</label>
                                    <input type="number" min="0" name="contact_form_order" class="form-control" placeholder="eg: 0" value="{{ old('contact_form_order')??'' }}" />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Membership Order</label>
                                    <input type="number" min="0" name="membership_order" class="form-control" placeholder="eg: 1" value="{{ old('membership_order')??'' }}" />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Content Order</label>
                                    <input type="number" min="0" name="content_order" class="form-control" placeholder="eg: 2" value="{{ old('content_order')??'' }}" />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Discription 1 Order</label>
                                    <input type="number" min="0" name="discription1_order" class="form-control" placeholder="eg: 3" value="{{ old('description1_order')??'' }}" />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Description 2 Order</label>
                                    <input type="number" min="0" name="description2_order" class="form-control" placeholder="eg: 4" value="{{ old('description2_order')??'' }}" />
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
    CKEDITOR.replace('description1');
    CKEDITOR.replace('description2');

    $("#name").on("keyup", () => {
        const host = "{{ url('/') }}";
        $("#slug").val(host + '/' + $("#name").val().toLowerCase().replace(/ /g, '-')
            .replace(/[^\w-]+/g, ''));
    });
    $("#file").on("change", function(e) {
        const ext = $(this).val().split(".").reverse()[0];
        if (!["png", "jpeg", "jpg"].includes(ext)) {
            alert("Please select valid file for image.");
        }
        $("#fileName").val(e.target.files[0].name);
        $("#bannerPreview").css("display", "flex");
        $("#imagePrv").attr("src", URL.createObjectURL(e.target.files[0]));
    });
</script>
@endsection