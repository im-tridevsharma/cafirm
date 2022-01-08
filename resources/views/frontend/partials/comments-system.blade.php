@php
$comments = \App\Models\BlogComment::where("status", 1)->where("blog_id", $blog->id)->orderBy("id","desc")->get();
@endphp


<section class="mt-5" id="comment-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Comments({{ count($comments) }}) <button id="add-comment" class="btn btn-info ml-10">Add New</button></h4>
            </div>
            <!--add comment box-->
            <div class="col-md-12 mt-5" id="comment-box" style="display: none;">
                <p class="alert alert-success" id="success" style="display: none;"></p>
                <p class="alert alert-danger" id="error" style="display: none;"></p>
                <form id="comment-form" method="POST" class="row">
                    <input type="hidden" name="blog_id" value="{{ _e($blog->id) }}" />
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Fullname</label>
                            <input type="text" name="fullname" class="form-control" placeholder="Your Name" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Your Email" required />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Comment</label>
                            <textarea name="comment" class="form-control" placeholder="Write your comment here..." required></textarea>
                        </div>
                    </div>
                    <div class="col-md-12 text-right">
                        <button type="submit" id="sbtn" class="btn btn-info">Comment</button>
                    </div>
                </form>
            </div>
            <!--render comments-->
            <div class="col-md-12 mt-5">
                @if($comments && count($comments) > 0)
                @foreach($comments as $comment)
                @php
                $dl = '';
                $split = explode(" ",$comment->fullname);
                $dl .= substr($split[0],0,1);
                $dl .= count($split) > 1 ? substr($split[count($split) - 1],0,1) : '';
                @endphp
                <div class="bg-light p-3 rounded mb-2">
                    <div class="my-3 d-flex align-items-center" data-letters="{{ $dl }}">
                        <div class="d-flex justify-content-center flex-column">
                            <p style="line-height:20px;">{{ $comment->fullname }}</p>
                            <p style="line-height:20px;">{{ $comment->email ?? '' }}</p>
                        </div>
                    </div>
                    <p>{{ $comment->comment }}</p>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</section>

@push('script')
<script>
    $("#add-comment").click(function() {
        $("#comment-box").show("slow");
        document.querySelector("#comment-section").scrollIntoView({
            behavior: "smooth"
        });
        document.querySelector("#comment-section").classList.add('pt-200');
    });

    $("#comment-form").submit(function(e) {
        e.preventDefault();
        $("#sbtn").html("Adding...");
        $("#sbtn").attr("disabled", "disabled");
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            url: '{{ route("comments.add") }}',
            data: $(this).serialize(),
            method: "POST",
            success: function(response) {
                if (response.status) {
                    $("#success").show("slow");
                    $("#success").html(response.message);
                    setTimeout(() => {
                        $("#success").hide("slow");
                        $("#comment-box").hide("slow");
                    }, 5000);
                    $("#sbtn").html("Comment");
                    $("#sbtn").removeAttr("disabled");
                    document.querySelector("#comment-form").reset();
                }
            },
            error: function(response) {
                response = response.responseJSON;
                $("#error").show("slow");
                $('#error').html(response.message);
                setTimeout(() => {
                    $("#error").hide("slow");
                }, 5000);
                $("#sbtn").html("Comment");
                $("#sbtn").removeAttr("disabled");
            }
        });

        setTimeout(() => {
            document.querySelector("#comment-section").classList.remove('pt-200');
        }, 6000);
    });
</script>
@endpush