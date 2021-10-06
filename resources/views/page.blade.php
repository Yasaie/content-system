@extends('layouts.front.app')

@section('title',(!empty($page->seo->title) ? $page->seo->title : $page->title ))
@section('description',(!empty($page->seo->description)) ? $page->seo->description : $page->title )
@section('keywords',(!empty($page->seo->keywords) ? $page->seo->keywords : $page->title ))
@section('canonical',(!empty($page->seo->canonical) ? $page->seo->canonical : route('page.show',['id'=>$page->id,'title'=>$page->title])))
@section('image',(!empty($page->image) ? fileUploadUrl($page->image) : config('app.logo')))

@section('content')

@if(!empty($page->image))
	<section class="about-intro bgimage p-top-140 p-bottom-140">
		<div class="bg_image_holder" style="opacity: 1;background-attachment: fixed;background-image:url('{{ fileUploadUrl($page->image) }}')">
			<img src="{{ fileUploadUrl($page->image) }}" alt="{{ $page->image }}">
		</div>
		<div class="container content_above">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="text-right text-white">{{ $page->title }}</h1>
					<p class="text-right text-white">{{ str_limit(strip_tags($page->body),70) }}</p>
				</div>
			</div>
		</div>
	</section>
@else
	<section class="breadcrumb_area breadcrumb2 bgimage overlay">
		<div class="bg_image_holder">
			<img src="{{ asset('front/img/breadbg.jpg') }}" alt="">
		</div>
		<div class="container content_above">
			<div class="row">
				<div class="col-md-12">
					<div class="breadcrumb_wrapper d-flex flex-column align-items-center">
						<h2 class="page_title">{{ $page->title }}</h2>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb m-bottom-30">
								<li class="breadcrumb-item active" aria-current="page">{{ $page->title }}</li>
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
@endif

<section class="section-padding">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 margin-md-60">
				<div class="m-bottom-35">
					<div class="divider divider-simple text-right">
						<h2 class="m-bottom-20">{{ $page->title }}</h2>
						<span class="divider-straight"></span>
					</div>
				</div>
				<div style="min-height:300px;" class="rtl text-right">
					{!! $page->body !!}
				</div>
			</div>
		</div>
	</div>
</section>


@include('layouts.front.testimotional')

@endsection

@section('footer')
	@include('layouts.front.footer')
@endsection

