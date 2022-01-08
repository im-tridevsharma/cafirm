@extends('layouts.backend')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-user">
                <div class="card-header">
                    <h5 class="card-title">Add Plans</h5>
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
                    <form method="POST" action="{{ route('admin.memberships.save') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" value="{{ old('title')??'' }}" placeholder="Plan Name" name="title">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select name="category_id" class="form-control selectpicker">
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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control textarea" placeholder="Description" name="description">{{ old('description')??'' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Validity</label>
                                    <input type="date" class="form-control date" name="validity" value="{{ old('validity')??'' }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Basic Price</label>
                                    <input type="text" class="form-control" id="basic_price" name="basic_price" value="{{ old('basic_price')??'' }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Discount Rate</label>
                                    <input type="number" min="0" class="form-control" id="discount_rate" name="discount_rate" value="{{ old('discount_rate')??'' }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Discounted Price</label>
                                    <input type="text" class="form-control" id="discounted_price" name="discounted_price" value="{{ old('discounted_price')??'' }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" id="features-container">
                                <div class="form-group">
                                    <label>Features</label>
                                    <input type="text" name="features[]" class="form-control" placeholder="Start adding features...">
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 d-flex justify-content-end">
                                <div data-toggle="tooltip" id="add-new-feature" title="Add New Feature" class="col-md-1 bg-warning rounded d-flex align-items-center justify-content-center py-3" style="cursor:pointer;">
                                    <i class="nc-icon nc-simple-add"></i>
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
    $("#add-new-feature").on("click", () => {
        const id = Math.floor(Math.random() * 1000);
        const html = `
        <div class="form-group" id="id-${id}">
            <div class="input-group mb-3">
                <input type="text" name="features[]" class="form-control" placeholder="Enter New Feature">
                <div class="input-group-append">
                    <div onclick="removeFeature('id-${id}')" class="px-3 py-2 bg-danger d-flex align-items-center justify-content-center" style="cursor: pointer;" data-toggle="tooltip" title="Remove">
                        <i class="nc-icon nc-simple-remove"></i>
                    </div>
                </div>
            </div>
        </div>
        `;
        $("#features-container").append(html);
    });

    function removeFeature(id) {
        $("#" + id).remove();
    }

    $("#discount_rate, #basic_price").on("change", () => {
        const basic_price = $("#basic_price").val();
        const rate = $("#discount_rate").val();

        $("#discounted_price").val(basic_price !== 0 ? basic_price - (basic_price * rate) / 100 : 0);
    });
</script>
@endsection