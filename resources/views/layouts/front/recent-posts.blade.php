<div class="widget-wrapper">
    <div class="widget-default">
        <div class="widget-header">
            <h6 class="widget-title">مطالب تصادفی</h6>
        </div>
        <div class="widget-content">
            <div class="sidebar-post">
                @foreach($randomBlogs as $randomBlog)
                    <div class="post-single">
                        <div class="d-flex justify-content-end align-items-center">
                            <a class="post-title" href="{{ route('blog.show',['id'=>$randomBlog->id,'title'=>$randomBlog->title]) }}">{{ $randomBlog->title }}</a>
                            @if(!empty($randomBlog->image))
                                <a href="{{ fileUploadUrl($randomBlog->image) }}">
                                    <img style="width: 50px;" class="rounded ml-2" src="{{ fileUploadUrl($randomBlog->image) }}" alt="">
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

