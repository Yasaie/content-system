@extends('layouts.front.app')

@section('title',(!empty($team->seo->title) ? $team->seo->title : $team->title ))
@section('description',(!empty($team->seo->description)) ? $team->seo->description : $team->title )
@section('keywords',(!empty($team->seo->keywords) ? $team->seo->keywords : $team->title ))
@section('canonical',(!empty($team->seo->canonical) ? $team->seo->canonical : route('page.show',['id'=>$team->id,'title'=>$team->title])))
@section('image',(!empty($team->image) ? fileUploadUrl($team->image) : config('app.logo')))

@section('content')

<section class="section-padding">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 margin-md-60">
				<div class="m-bottom-35">
					<div class="divider divider-simple text-right">
						<h2 class="m-bottom-20">
							{{ $team->title }}
							@if(!empty($team->image))
								<img style="border-radius: 100%;max-width:100px;" src="{{ fileUploadUrl($team->image) }}" alt="{{ $team->image }}">
							@endif
						</h2>
						<span class="divider-straight w-100"></span>
					</div>
				</div>
				<div style="min-height:300px;" class="rtl text-right">
					{!! $team->body !!}
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

