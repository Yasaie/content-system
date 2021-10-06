@extends('panel.layouts.app')

@section('content')

<ol class="breadcrumb">
    <li>
        <a href="{{ route('panel.index') }}">داشبورد</a>
    </li>
    <li>
        <a href="{{ route('panel.patient.index') }}">لیست بیماران(کاربران)</a>
    </li>
    <li class="active">ثبت اطلاعات بیمار</li>
</ol>

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h4 class="text-dark header-title m-t-0">ثبت اطلاعات بیمار</h4>
            <hr>
            <form class="form" method="POST" action="{{ route('panel.patient.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }} col-md-4">
                        <label class="control-label" for="name">نام و نام خانوادگی</label>
                        <input type="text" name="name" value="{{ old('name') }}" id="name" class="form-control" placeholder="نام و نام خانوادگی">
                        @if($errors->has('name'))
                            <div>
                                <strong class="help-block text-danger">
                                    {{ $errors->first('name') }}
                                </strong>
                            </div>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('age') ? 'has-error' : '' }} col-md-4">
                        <label class="control-label" for="age">سن</label>
                        <input type="text" name="age" value="{{ old('age') }}" id="age" class="form-control" placeholder="سن">
                        @if($errors->has('age'))
                            <div>
                                <strong class="help-block text-danger">
                                    {{ $errors->first('age') }}
                                </strong>
                            </div>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('gender') ? 'has-error' : '' }} col-md-4">
                        <label class="control-label" for="price">جنسیت</label>
                        <select name="gender" id="gender" class="form-control">
                            <option {{ (old('gender') == 'male' ? 'selected' : '') }} value="male">مذکر</option>
                            <option {{ (old('gender') == 'female' ? 'selected' : '') }} value="female">مونث</option>
                        </select>
                        @if($errors->has('gender'))
                            <div>
                                <strong class="help-block text-danger">
                                    {{ $errors->first('gender') }}
                                </strong>
                            </div>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }} col-md-6">
                        <label class="control-label" for="phone">شماره تماس (تلفن ثابت)</label>
                        <input type="text" name="phone" value="{{ old('phone') }}" id="phone" class="form-control" placeholder="شماره تماس">
                        @if($errors->has('phone'))
                            <div>
                                <strong class="help-block text-danger">
                                    {{ $errors->first('phone') }}
                                </strong>
                            </div>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('mobile') ? 'has-error' : '' }} col-md-6">
                        <label class="control-label" for="mobile">شماره موبایل</label>
                        <input type="text" name="mobile" value="{{ old('mobile') }}" id="mobile" class="form-control" placeholder="شماره موبایل">
                        @if($errors->has('mobile'))
                            <div>
                                <strong class="help-block text-danger">
                                    {{ $errors->first('mobile') }}
                                </strong>
                            </div>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('postal_code') ? 'has-error' : '' }} col-md-12">
                        <label class="control-label" for="postal_code">کدپستی</label>
                        <input type="text" name="postal_code" value="{{ old('postal_code') }}" id="postal_code" class="form-control" placeholder="کدپستی">
                        @if($errors->has('postal_code'))
                            <div>
                                <strong class="help-block text-danger">
                                    {{ $errors->first('postal_code') }}
                                </strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }} col-md-12">
                        <label class="control-label" for="address">آدرس</label>
                        <textarea name="address" id="address" class="form-control" placeholder="آدرس (استان - شهرستان - خیابان - کوچه - ساختمان - طبقه - پلاک)" cols="30" rows="10">{{ old('address') }}</textarea>
                        @if($errors->has('address'))
                            <div>
                                <strong class="help-block text-danger">
                                    {{ $errors->first('address') }}
                                </strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="from-group col-md-12">
                        <input class="btn btn-success" type="submit" value="ذخیره کن">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script src="{{ asset('js/detect.js') }}"></script>
    <script src="{{ asset('js/fastclick.js') }}"></script>
    <script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('js/jquery.blockUI.js') }}"></script>
    <script src="{{ asset('js/waves.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('plugins/moment/moment.js') }}"></script>
    <script src="{{ asset('plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('plugins/raphael/raphael-min.js') }}"></script>
    <script src="{{ asset('pages/jquery.todo.js') }}"></script>
    <script src="{{ asset('plugins/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('js/jquery.core.js') }}"></script>
    <script src="{{ asset('js/jquery.app.js') }}"></script>
    <script src="{{ asset('pages/jquery.dashboard_2.js') }}"></script>
@endpush