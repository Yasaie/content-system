@extends('layouts.front.app')

@section('title',config('app.name').' - خدمات')
@section('description','خدمات و سرویس هایی که از طرف شرکت ما ارائه می شود')
@section('keywords','سرویس ها,خدمات,امکانات,کارها')
@section('canonical',route('service.index'))
@section('image',config('app.logo'))

@section('content')
   <section id="main-container" class="main-container">
       <div class="container">
           <div class="row">
               <div class="col">
                   <div class="showcase text-center showcase--title1">
                       <h3>
                           <span>سرویس ها و خدمات</span>
                       </h3>
                   </div>
               </div>
           </div>
       </div>
       <section class="list-types">
           <div class="container">
               <div class="row">
                   <div class="col-lg-12">
                       @if(!empty($services->isNotEmpty()))
                           <ul class="image--list">
                               @foreach($services as $service)
                                   <li class="image-list d-flex rtl text-right pb-4">
                                       <div class="contents">
                                           <div class="heading">
                                               <h6>
                                                   <span class="la la-check-circle text-success"></span>
                                                   <a href="{{ route('service.show',[ 'id' => $service->id ,'title' => $service->title ]) }}">
                                                       {{ $service->title }}
                                                   </a>
                                               </h6>
                                           </div>
                                           <p>{{ $service->meta_excerpt }}</p>
                                           <a class="" href="{{ route('service.show',[ 'id' => $service->id ,'title' => $service->title ]) }}">
                                               <span>مشاهده بیشتر</span>
                                               <span class="la la-chevron-left"></span>
                                           </a>
                                       </div>
                                   </li>
                               @endforeach
                           </ul>
                       @endif
                   </div>
               </div>
           </div>
       </section>
       <div class="col-md-12 text-center">
           {{ $services->links() }}
       </div>
   </section>
@endsection

@section('footer')
	@include('layouts.front.footer')
@endsection

