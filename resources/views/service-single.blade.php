@extends('layouts.front.app')

@section('title',(!empty($service->seo->title) ? $service->seo->title : $service->title ))
@section('description',(!empty($service->seo->description)) ? $service->seo->description : $service->title )
@section('keywords',(!empty($service->seo->keywords) ? $service->seo->keywords : $service->title ))
@section('canonical',(!empty($service->seo->canonical) ? $service->seo->canonical : route('service.show',['id'=>$service->id,'title'=>$service->title])))
@section('image',(!empty($service->image) ? fileUploadUrl($service->image) : config('app.logo')))

@section('content')
<section class="blog-single-wrapper section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="post-details">
                    @if(!empty($service->image))
                        <div class="post-head text-right">
                            <img src="{{ fileUploadUrl($service->image) }}" class="mw-100" alt="{{ $service->image }}">
                        </div>
                    @endif
                    <div class="post-content">
                        <div class="post-header">
                            <h3>{{ $service->title }}</h3>
                            <ul >
                                <li>
                                    <span class="text-dark">تاریخ انتشار : </span>
                                    {{ (new Date($service->published_at))->toj()->format('d F Y') }}
                                </li>
                            </ul>
                        </div>
                        <div style="clear:both;"></div>
                        <div class="post-body">
                            <div class="text-right">
                                {!! $service->body !!}
                            </div>
                        </div>
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

