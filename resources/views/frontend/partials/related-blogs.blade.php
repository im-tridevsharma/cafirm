@php 
$related_blogs = \App\Models\Blog::where("category", $blog->category)->where("id", "!=", $blog->id)->get();
@endphp

<section class="blog-3-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title section-title-2">
                    <h3 class="title">Related Blogs</h3>
                </div>
            </div>
        </div>
        <div class="row team-active">
            @if(isset($related_blogs) && count($related_blogs) > 0)
            @foreach($related_blogs as $blog)
            <div class="col-lg-4">
                <div class="blog-item mt-30">
                    <div class="blog-thumb">
                        <img src="{{ url($blog->cover) }}" alt="{{ $blog->title }}" style="height: 250px; width:370x; object-fit:contain;">
                        <a href="#">{{ strtoupper($blog->category ?? '') }}</a>
                    </div>
                    <div class="blog-content">
                        <a href="{{ $blog->slug }}">
                            <h4 class="title">{{ $blog->title ?? '' }}</h4>
                        </a>
                        <ul>
                            <li><a href="#"><i class="fa fa-calendar"></i> {{ $blog->created_at->format('d M, Y') }}</a></li>
                            <li><a href="#"><i class="fa fa-user-o"></i> BY ADMIN</a></li>
                            <li><a href="#" class="ml-3"><i class="fa fa-comment-o"></i>{{ \App\Models\BlogComment::where("status",1)->where("blog_id", $blog->id)->count() }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>