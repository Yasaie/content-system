@extends('layouts.front.app')

@section('title',config('app.title'))
@section('description',config('app.description'))
@section('keywords',config('app.keywords'))
@section('canonical',route('home'))
@section('image',config('app.logo'))

@section('content')
    @include('layouts.front.slider')

    @if($services->isNotEmpty())
        <section class="carousel-wrapper p-top-50 p-bottom-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="carousel-two owl-carousel">
                            @foreach($services as $service)
                                <div class="carousel-two-single">
                                    <div class="card card--seven">
                                        <figure>
                                            @if($service->image)
                                                <img style="width: 100%;height:230px;" src="{{ fileUploadUrl($service->image) }}" alt="{{ $service->image }}">
                                            @else
                                                <img style="width: 100%;height:230px;" src="{{ config('app.noimage') }}" alt="no-image">
                                            @endif
                                        </figure>
                                        <div class="card-body text-center">
                                            <h5>
                                                <a href="#">{{ $service->title }}</a>
                                            </h5>
                                            <p>{{ str_limit($service->meta_excerpt) }}</p>
                                            <a href="{{ route('service.show',[ 'id' => $service->id ,'title' => $service->title ]) }}" class="btn btn-outline-secondary outline-thick-primary">بیشتر بدانید</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if($teams->isNotEmpty())
        <section class="bg-gray-light section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="m-bottom-65">
                            <div class="divider text-center">
                                <h1 class="color-dark">اعضای تیم</h1>
                                <span class="divider-straight"></span>
                                <p class="mx-auto d-none"></p>
                            </div>
                        </div>
                        <div class="team-carousel-two owl-carousel">
                            @foreach($teams as $team)
                                <div class="carousel-single">
                                    <div class="card card--team2">
                                        <figure class="mb-0">
                                            @if($team->image)
                                                <img src="{{ fileUploadUrl($team->image) }}" alt="{{ $team->image }}">
                                            @else
                                                <img src="{{ config('app.noimage') }}" alt="no-image">
                                            @endif
                                            <figcaption>
                                                <a href="{{ route('team.show', [$team, $team->title]) }}" class="btn btn-sm btn-outline-light">اطلاعات بیشتر</a>
                                            </figcaption>
                                        </figure>
                                        <div class="card-body bg-secondary">
                                            <a href="{{ route('team.show', [$team, $team->title]) }}">
                                                <h5>{{ $team->title }}</h5>
                                            </a>
                                            <span>{{ $team->meta_job }}</span>
                                        </div>
                                    </div><!-- End: .card -->

                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if($pages->isNotEmpty())
        <section class="p-top-30 p-bottom-10">
            <div class="tab tab--2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tab_nav2">
                                <ul class="nav justify-content-center" id="myTab" role="tablist">
                                    @foreach($pages as $page)
                                        <li class="nav-item">
                                            <a class="nav-link {{ $loop->last ? 'active' : '' }}" id="page_tab{!! $loop->index+1 !!}"
                                               data-toggle="tab" href="#page_{!! $loop->index+1 !!}"
                                               role="tab" aria-controls="page_{!! $loop->index+1 !!}"
                                               aria-selected="{!! $loop->last ? 'true' : 'false' !!}">
                                                {{ $page->meta_tabtitle }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-content tab--content2">
                    @foreach($pages as $page)
                        <div class="tab-pane animated fadeIn {!! $loop->last ? 'active show' : '' !!}"
                             id="page_{!! $loop->index+1 !!}" role="tabpanel"
                             aria-labelledby="page_{!! $loop->index+1 !!}">
                            <div class="container">
                                <div class="row">
                                    @if($page->image)
                                        <div class="col-lg-5">
                                            <div class="tab_text_module mb-sm-5">
                                                <h2 class="text-center">{{ $page->title }}</h2>
                                                <p style="font-family:Sans;text-align:justify;direction:rtl">
                                                    {!! str_limit(strip_tags($page->body),700) !!}
                                                    <a class="m-2" href="{{ route('page.show',[$page, $page->title]) }}">
                                                        <span class="la la-link"></span>
                                                        <span>نمایش بیشتر...</span>
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 offset-lg-1">
                                            <figure class="tab_image_module--right">
                                                <img src="{{ fileUploadUrl($page->image) }}" alt="{{ $page->image }}">
                                            </figure>
                                        </div>
                                    @else
                                        <div class="col-lg-12">
                                            <div class="tab_text_module mb-sm-5">
                                                <h2 class="text-right">{{ $page->title }}</h2>
                                                <p style="font-family:Sans;text-align:justify;direction:rtl">
                                                    {!! str_limit(strip_tags($page->body),700) !!}
                                                    <a class="m-2" href="{{ route('page.show',[$page, $page->title]) }}">
                                                        <span class="la la-link"></span>
                                                        <span>نمایش بیشتر...</span>
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if($faqs->isNotEmpty())
        <section class="section-padding section-bg">
            <div class="m-bottom-65">
                <div class="divider text-center">
                    <h1 class="color-dark">سوالات متداول</h1>
                    <span class="divider-straight"></span>
                    <p class="mx-auto d-none"></p>
                </div>
            </div>
            <div class="accordion-styles section-bg accordion--two">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
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
                        <div class="col-lg-4 offset-lg-1">
                            <div class="form-box">
                                <h4 class="color-dark text-right" >سوال یا مشکلی دارید؟</h4>
                                <h4 class="color-dark text-right">نیازمند ارتباط با ما هستید؟</h4>
                                <hr>
                                <p class="m-0 text-right">در صورتی که سوالی دارید بر روی دکمه ی زیر کلیک کنید و سوال خودتون رو مطرح کنید تا در اسرع وقت با شما تماس برقرار کنیم.</p>
                                <a href="{{ route('contactUs.create') }}" class="btn btn-primary btn--rounded mt-3">ارسال سوال</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if($blogs->isNotEmpty())
        <section class="section-padding">
            <div class="m-bottom-30">
                <div class="divider text-center">
                    <h1 class="color-dark">آخرین مقالات سایت</h1>
                    <span class="divider-straight"></span>
                    <p class="mx-auto d-none"></p>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="carousel-one owl-carousel">
                            @foreach($blogs as $blog)
                                <div class="carousel-one-single">
                                    <figure>
                                        <img style="max-height:200px !important;" src="{{ fileUploadUrl($blog->image) }}" alt="{{ $blog->image }}" class="img-fluid mw-100 m-auto">
                                    </figure>
                                    <h5 class="text-center">
                                        <a style="font-size:14px" href="{{ route('blog.show',['id'=>$blog->id,'title'=>$blog->title]) }}">{{ $blog->title }}</a>
                                    </h5>
                                    <p class="text-center" style="font-size:13px;">
                                        {{ str_limit(strip_tags($blog->body)) }}
                                    </p>
                                    <a href="{{ route('blog.show',['id'=>$blog->id,'title'=>$blog->title]) }}">
                                        <span class="la la-chevron-left"></span>
                                        <span>مشاهده بیشتر</span>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if($customers->isNotEmpty())
        <section class="carousel-wrapper section-padding carousel-bg bgimage">
            <div class="bg_image_holder">
                <img src="{{ asset('front/img/testibg2.jpg') }}" alt="">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="divider divider-light text-center">
                            <h5 class="color-light">نظر کاربران</h5>
                            <span class="divider-straight"></span>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="testimonial-carousel-two owl-carousel">
                            @foreach($customers as $customer)
                                <div class="carousel-single">
                                    <div class="card card-shadow card--testimonial">
                                        <div class="author d-flex">
                                            <div style="width:70px;" class="author-img">
                                                @if(!empty($customer->image))
                                                    <img src="{{ fileUploadUrl($customer->image) }}" alt="{{ $customer->name }}" class="rounded-circle w-100">
                                                @else
                                                    <img src="{{ config('app.authoravatar') }}" alt="{{ $customer->name }}" class="rounded-circle w-100">
                                                @endif
                                            </div>
                                            <div class="author-spec">
                                                <h5>{{ $customer->name }}</h5>
                                                @if($customer->meta_job)
                                                    <span style="font-family:Sans;">{{ $customer->meta_job }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="content" style="font-size:13px;text-align:right;direction:rtl;">
                                            <p>{{ strip_tags($customer->idea) }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
