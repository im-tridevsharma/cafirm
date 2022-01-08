@extends('layouts.backend')

@section('content')

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-user">
                <div class="card-header">
                    <h5 class="card-title">General Settings</h5>
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
                    <form method="POST" action="{{ route('admin.settings.config-save') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Site Name</label>
                                    <input type="text" class="form-control" placeholder="Site Name" value="{{ $settings['site_name'] ?? '' }}" name="key[site_name]">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group form-file-upload form-file-simple">
                                    <label>Site Logo</label>
                                    <input type="text" id="fileName" class="form-control inputFileVisible" placeholder="Choose Image...">
                                    <input type="file" class="inputFileHidden" name="site_logo" id="file" accept=".jpg,.png,.jpeg">
                                </div>
                            </div>
                            <div class="col-md-3" id="bannerPreview" {{ $settings['site_logo'] ? '' : 'style="display: none;"' }}>
                                
                                <div style="width:100%; height:100px; overflow:hidden;">
                                    <img src="{{ $settings['site_logo'] ?? '' }}" alt="logo-preview" id="imagePrv" style="height:100px;object-fit:contain;" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="key[email]" class="form-control" value="{{ $settings['email'] ?? '' }}" placeholder="Your email"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input type="text" name="key[mobile]" class="form-control" value="{{ $settings['mobile'] ?? '' }}" placeholder="Your mobile"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Footer Content</label>
                                    <textarea name="key[footer_content]" class="form-control" placeholder="Footer content">{{$settings['footer_content']??''}}</textarea>
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