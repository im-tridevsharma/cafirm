@extends('layouts.backend')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-user">
                <div class="card-header">
                    <h5 class="card-title">Update Review</h5>
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
                    <form method="POST" action="{{ route('admin.reviews.update', _e($review->id)??0) }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label>Fullname</label>
                                    <input type="text" class="form-control" placeholder="Full Name" value="{{ $review->fullname ??''}}" name="fullname">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Rating</label>
                                    <select name="rating" class="form-control">
                                        <option value="">Select</option>
                                        <option value="1" {{ $review->rating === 1.0 ? 'selected' :''}}>1</option>
                                        <option value="2" {{ $review->rating === 2.0 ? 'selected' :''}}>2</option>
                                        <option value="3" {{ $review->rating === 3.0 ? 'selected' :''}}>3</option>
                                        <option value="4" {{ $review->rating === 4.0 ? 'selected' :''}}>4</option>
                                        <option value="5" {{ $review->rating === 5.0 ? 'selected' :''}}>5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option value="">Select</option>
                                        <option value="1" {{ $review->status === 1 ? 'selected' :''}}>Approved</option>
                                        <option value="0" {{ $review->status === 0 ? 'selected' :''}}>Dis-Approved</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Content</label>
                                    <textarea name="content" class="form-control" placeholder="Review content">{{$review->content??''}}</textarea>
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
</script>
@endsection