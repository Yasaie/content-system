@extends('layouts.front.app')

@section('title',config('app.name').' - مقالات')
@section('description','مطالب ارسال شده در بخش مقالات')
@section('keywords','مقالات,ومقالات,مطالب,پست ها')
@section('canonical',route('blog.index'))
@section('image',config('app.logo'))

@section('content')
    <section class="breadcrumb_area breadcrumb2 bgimage overlay">
        <div class="bg_image_holder">
            <img src="{{ asset('front/img/breadbg.jpg') }}" alt="">
        </div>
        <div class="container content_above">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb_wrapper d-flex flex-column align-items-center">
                        <h2 class="page_title">مقالات</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-bottom-30">
                                <li class="breadcrumb-item active" aria-current="page">مقالات</li>
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

    <section class="blog-wrapper section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 margin-md-60">
                    <div class="blog-posts">
                        @forelse($blogs as $blog)
                            <div class="blog-single">
                                <div class="card post--card post--card2 ">
                                    @if(!empty($blog->image))
                                        <figure>
                                            <img class="w-100" src="{{ fileUploadUrl($blog->image) }}" alt="{{ $blog->image }}">
                                            <figcaption>
                                                <a title="{{ $blog->image }}" href="{{ fileUploadUrl($blog->image) }}"><i class="la la-image"></i></a>
                                            </figcaption>
                                        </figure>
                                    @endif
                                    <div class="card-body">
                                        <h5>
                                            <a href="{{ route('blog.show',['id'=>$blog->id,'title'=>$blog->title]) }}">{{ $blog->title }}</a>
                                        </h5>
                                        <p>{{ str_limit(strip_tags($blog->body),500) }}</p>
                                        <a href="{{ route('blog.show',['id'=>$blog->id,'title'=>$blog->title]) }}" class="rm-link">
                                            <span>بیشتر بخوانید</span>
                                            <span class="la la-angle-double-left"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center">
                                <p class="alert alert-danger">هیچ اطلاعاتی یافت نشد</p>
                            </div>
                        @endforelse
                    </div>
                    <div class="m-top-60 text-center">
                        {{ $blogs->links() }}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="widget-wrapper">
                            <div class="search-widget">
                                <form method="get" action="{{ route('blog.index') }}" id="search">
                                    <div class="input-group">
                                        <input name="search" type="text" class="fc--rounded" value="{{ old('search') }}" placeholder="جستجو">
                                        <button type="submit"><i class="la la-search"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @include('layouts.front.recent-posts')

                        @include('layouts.front.widget-cat')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer')
	@include('layouts.front.footer')
@endsection

