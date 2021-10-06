@extends('layouts.front.app')

@section('title',config('app.name').' - تماس با ما')
@section('description','تماس با ما')
@section('keywords','تماس با ما,ارتباط با ما,ارسال پیام به ما')
@section('canonical',route('contactUs.create'))
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
                        <h2 class="page_title">تماس با ما</h2>
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

    <section class="contact--four">
        <div class="container p-top-100 p-bottom-120">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-wrapper">
                        <div class="m-bottom-30">
                            <div class="divider divider-simple text-right">
                                <h3>تماس با ما</h3>
                                <span class="divider-straight"></span>
                            </div>
                        </div>
                        <form id="contact-form" class="contact-form" action="{{ route('contactUs.store') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-3 {{ $errors->has('name') ? 'has-error' : '' }}">
                                        <input class="form-control form-outline mb-1" name="name" id="name" value="{{ old('name') }}" placeholder="نام" type="text" required>
                                        @if($errors->has('name'))
                                            <div class="text-right rtl">
                                                <strong class="help-block text-danger">
                                                    {{ $errors->first('name') }}
                                                </strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <!-- Col end -->
                                <div class="col-lg-6">
                                    <div class="form-group mb-3 {{ $errors->has('phone') ? 'has-error' : '' }}">
                                        <input class="form-control form-outline mb-1" name="phone" id="phone" value="{{ old('phone') }}" placeholder="تلفن" type="phone" required>
                                        @if($errors->has('phone'))
                                            <div class="text-right rtl">
                                                <strong class="help-block text-danger">
                                                    {{ $errors->first('phone') }}
                                                </strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-3 {{ $errors->has('email') ? 'has-error' : '' }}">
                                        <input class="form-control form-outline mb-1" name="email" id="email" value="{{ old('email') }}" placeholder="ایمیل" type="email">
                                        @if($errors->has('email'))
                                            <div class="text-right rtl">
                                                <strong class="help-block text-danger">
                                                    {{ $errors->first('email') }}
                                                </strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-3 {{ $errors->has('subject') ? 'has-error' : '' }}">
                                        <input class="form-control form-outline mb-1" placeholder="موضوع" name="subject" id="subject" value="{{ old('subject') }}" type="text" required>
                                        @if($errors->has('subject'))
                                            <div class="text-right rtl">
                                                <strong class="help-block text-danger">
                                                    {{ $errors->first('subject') }}
                                                </strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-3 {{ $errors->has('content') ? 'has-error' : '' }}">
                                        <textarea class="form-control form-outline mb-1 required-field" id="content" name="content" placeholder="پیام شما" rows="5" required>{{ old('content') }}</textarea>
                                        @if($errors->has('content'))
                                            <div class="text-right rtl">
                                                <strong class="help-block text-danger">
                                                    {{ $errors->first('content') }}
                                                </strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary tw-mt-30" type="submit">
                                    <span>ارسال پیام</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="list-inline-wrapper p-top-70 p-bottom-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="banner-title text-right mt-0">:راه های ارتباطی</h1>
                        <p class="text-right">میتوانید از طریق راه های ارتباطی زیر نیز با ما در تماس باشید</p>
                        <hr>
                        <ul class="icon-list--three d-flex list--inline">
                            <li class="d-flex justify-content-center align-items-center">
                                <div class="contents text-right">
                                    <h4>{!! config('app.contactphone') !!}</h4>
                                    <span class="sub-text" style="font-family:sans;">شنبه تا پنجشنبه  8:00 تا 17:00</span>
                                </div>
                                <div class="icon ml-2"><span><i class="la la-headphones"></i></span></div>
                            </li>
                            <li class="d-flex justify-content-center align-items-center">
                                <div class="contents text-right">
                                    <h4>{{ config('app.contactmail') }}</h4>
                                    <span class="sub-text" style="font-family:sans;">تماس از طریق ایمیل</span>
                                </div>
                                <div class="icon ml-2"><span><i class="la la-envelope"></i></span></div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('footer')
	@include('layouts.front.footer')
@endsection
