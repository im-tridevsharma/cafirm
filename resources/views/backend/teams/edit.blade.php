@extends('layouts.backend')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-user">
                <div class="card-header">
                    <h5 class="card-title">Update Team</h5>
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
                    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.teams.update', _e($team->id)??0) }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" class="form-control" placeholder="Team Name" name="name" value="{{$team->name??old('name')}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option value="">Select</option>
                                        <option value="1" {{$team->status === 1 ? 'selected' : ''}}>Active</option>
                                        <option value="0" {{$team->status === 0 ? 'selected' : ''}}>De-Active</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" placeholder="Team Email" name="email" value="{{$team->email??old('email')}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input type="text" class="form-control" placeholder="Team Mobile" name="mobile" value="{{$team->mobile??old('mobile')}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Designation</label>
                                    <input type="text" class="form-control" placeholder="Team Role" name="designation" value="{{$team->designation??old('designation')}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Content</label>
                                    <textarea class="form-control textarea" name="content" placeholder="Write About...">{{$team->content??old('content')}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="bannerPreview" {{$team->image ? '' : 'style="display:none;"' }}>
                            <div class="col-md-12">
                                <label>Preview</label>
                                <div style="width:100%; height:100px; overflow:hidden;">
                                    <img src="{{$team->image}}" alt="banner-preview" id="imagePrv" style="height:100px;object-fit:contain;" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-file-upload form-file-simple">
                                    <label>Image</label>
                                    <input type="text" id="fileName" class="form-control inputFileVisible" placeholder="Choose New Image to update...">
                                    <input type="file" class="inputFileHidden" name="file" id="file" accept=".jpg,.png,.jpeg">
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
