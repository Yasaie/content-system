@extends('layouts.front.app')

@section('title',config('app.name').' - سوالات متداول')
@section('description','سوالات متداول')
@section('keywords','پرسش و پاسخ,سوالات متداول,سوالاتی که ممکن است برای شما پیش بیاید')
@section('canonical',route('faq.show'))
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
                  <h2 class="page_title">سوالات متداول</h2>
                  <nav aria-label="breadcrumb">
                     <ol class="breadcrumb m-bottom-30">
                        <li class="breadcrumb-item active" aria-current="page">تماس با ما</li>
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

   <section class="section-padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="mb-5">
                  <div class="divider divider-simple text-center">
                     <h3>سوالات متداول</h3>
                     <span class="divider-straight"></span>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-8 col-md-8">
               @if($faqs->isNotEmpty())
                  <section class="section-padding">
                     <div class="accordion-styles accordion--two">
                        <div class="container">
                           <div class="row">
                              <div class="col-lg-12">
                                 <div class="accordion accordion_two" id="accordion_two">
                                    @foreach($faqs as $faq)
                                       <div class="accordion-single">
                                          <div class="accordion-heading" id="heading2_{!! $loop->index+1 !!}">
                                             <h6 class="mb-0 text-right">
                                                <a href="#" data-toggle="collapse" data-target="#collapse2_{!! $loop->index+1 !!}" aria-expanded="{!! $loop->first ? 'true' : 'false' !!}" aria-controls="collapse2_{!! $loop->index+1 !!}" style="font-size:15px;">
                                                   {{ $faq->question }}
                                                </a>
                                             </h6>
                                          </div>
                                          <div id="collapse2_{!! $loop->index+1 !!}" class="collapse {!! $loop->first ? 'show' : '' !!}" aria-labelledby="heading2_{!! $loop->index+1 !!}" data-parent="#accordion_two">
                                             <div class="accordion-contents">
                                                <p class="text-justify" style="direction:rtl;font-size:13px;">{{ $faq->answer }}</p>
                                             </div>
                                          </div>
                                       </div>
                                    @endforeach
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </section>
               @endif
            </div>
            <div class="col-lg-4 col-md-4">
               <div class="sidebar p-4 sidebar-right section-bg faq-right">
                  <div class="text-right">
                     <img style="max-width:120px;" src="{{ config('app.authoravatar') }}" alt="" class="img-fluid">
                  </div>
                  <div class="text-right">
                     <h4>
                        <span>{{ config('app.author') }}</span>
                     </h4>
                  </div>
                  <div class="text-justify">
                     <p>خوشحالیم که به ما اعتماد کرده اید، دوست داریم بیشتر در مورد ما بدونی،ممکنه یه سری سوال برات پیش بیاد و ما بهشون جواب دادیم.</p>
                  </div>
               </div>
               <!-- End Sidebar Right -->
            </div>
         </div>
      </div>
   </section>
@endsection

@section('footer')
	@include('layouts.front.footer')
@endsection

