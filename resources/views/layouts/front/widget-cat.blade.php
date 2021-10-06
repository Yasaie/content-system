<div class="widget-wrapper">
    <div class="widget-default">
        <div class="widget-header">
            <h6 class="widget-title">دسته بندی مطالب</h6>
        </div>
        <div class="widget-content">
            <div class="category-widget">
                <ul>
                    @foreach($categories as $category)
                        <li class="arrow-list4">
                            <span>
                                <i class="la la-angle-double-left"></i>
                            </span>
                            <span class="posts-count">({{ intval($category->blogs_count) }})</span>
                            <a href="{{ route('category.show',['id'=>$category->id,'title'=>$category->title]) }}">{{ $category->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
