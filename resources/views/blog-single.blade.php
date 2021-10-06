@extends('layouts.front.app')

@section('title',(!empty($blog->seo->title) ? $blog->seo->title : $blog->title ))
@section('description',(!empty($blog->seo->description)) ? $blog->seo->description : $blog->title )
@section('keywords',(!empty($blog->seo->keywords) ? $blog->seo->keywords : $blog->title ))
@section('canonical',(!empty($blog->seo->canonical) ? $blog->seo->canonical : route('blog.show',['id'=>$blog->id,'title'=>$blog->title])))
@section('image',(!empty($blog->image) ? fileUploadUrl($blog->image) : config('app.logo')))

@section('content')
    <section class="breadcrumb_area breadcrumb2 bgimage overlay">
        <div class="bg_image_holder">
            <img src="{{ asset('front/img/breadbg.jpg') }}" alt="">
        </div>
        <div class="container content_above">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb_wrapper d-flex flex-column align-items-center">
                        <h2 class="page_title">{{ $blog->title }}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-bottom-30">
                                <li class="breadcrumb-item active" aria-current="blog">{{ $blog->title }}</li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('blog.index') }}">
                                        <span>مقالات</span>
                                        <span class="la la-book color-primary"></span>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home') }}">
                                        <span>صفحه اصلی</span>
                                        <span class="la la-home color-primary"></span>
                                    </a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="blog-single-wrapper section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="post-details">
                        @if(!empty($blog->image))
                            <div class="post-head text-right">
                                <img src="{{ fileUploadUrl($blog->image) }}" class="mw-100" alt="{{ $blog->image }}">
                            </div>
                        @endif
                        <div class="post-content">
                            <div class="post-header">
                                <h3>{{ $blog->title }}</h3>
                                <ul >
                                    <li>
                                        <span class="text-dark">تاریخ انتشار : </span>
                                        {{ (new Date($blog->published_at))->toj()->format('d F Y') }}
                                    </li>
                                    @if($blog->categories->isNotEmpty())
                                        <li>
                                            <span>دسته بندی : </span>
                                            @foreach($blog->categories as $category)
                                                <a href="{{ route('category.show',['id'=>$category->id,'title'=>$category->title]) }}">
                                                    {{ $category->title }}
                                                </a>
                                            @endforeach
                                        </li>
                                    @endif
                                </ul>
                            </div>
                            <div style="clear:both;"></div>
                            <div class="post-body">
                                <div class="text-right">
                                    {!! $blog->body !!}
                                </div>
                                <div class="m-top-45 m-bottom-50"></div>
                            </div>
                        </div>
                    </div>
                    @if($blog->tags->isNotEmpty())
                        <div class="post-bottom d-flex justify-content-between">
                            <div class="tags">
                                <ul class="d-flex">
                                    @foreach($blog->tags as $tag)
                                        <li>
                                            <a href="{{ route('tag.show',['id'=>$tag->id,'title'=>$tag->name]) }}">{{ $tag->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                    <div class="related-post m-top-70">
                        <div class="m-bottom-55">
                            <div class="divider divider-simple text-center">
                                <h3>مقالات پیشنهادی</h3>
                                <span class="divider-straight"></span>
                            </div>
                        </div>
                        <div class="row">
                            @forelse($randomBlogs as $blog)
                                <div class="col-lg-4 col-sm-6">
                                    <div class="single-post">
                                        @if(!empty($blog->image))
                                            <img src="{{ fileUploadUrl($blog->image) }}" class="mw-100" alt="{{ $blog->image }}">
                                        @endif
                                        <h6>
                                            <a href="{{ route('blog.show',[$blog,$blog->title]) }}">
                                                {{ $blog->title }}
                                            </a>
                                        </h6>
                                    </div>
                                </div>
                            @empty
                                <div class="col-md-12 text-center">
                                    <p class="alert alert-danger">هیچ مقاله پیشنهادی یافت نشد</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer')
	@include('layouts.front.footer')
@endsection

