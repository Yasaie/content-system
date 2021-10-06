@extends('panel.layouts.app')

@section('content')

<ol class="breadcrumb">
    <li>
        <a href="{{ route('panel.index') }}">داشبورد</a>
    </li>
    <li>
        <a href="{{ route('panel.slide.index') }}">لیست اسلایدها</a>
    </li>
    <li class="active">ایجاد اسلاید جدید</li>
</ol>

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h4 class="text-dark header-title m-t-0">ایجاد اسلاید جدید</h4>
            <hr>
            <form class="form" method="POST" action="{{ route('panel.slide.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }} col-md-6">
                        <label class="control-label" for="title">عنوان</label>
                        <input id="title" name="title" class="form-control" placeholder="عنوان" value="{{ old('title') }}" type="text" required>
                        @if($errors->has('title'))
                            <div>
                                <strong class="help-block text-danger">
                                    {{ $errors->first('title') }}
                                </strong>
                            </div>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('url') ? 'has-error' : '' }} col-md-6">
                        <label class="control-label" for="name">آدرس</label>
                        <input id="url" name="url" class="form-control" placeholder="آدرس" value="{{ old('url') }}" type="text">
                        @if($errors->has('url'))
                            <div>
                                <strong class="help-block text-danger">
                                    {{ $errors->first('url') }}
                                </strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="form-group {{ $errors->has('color') ? 'has-error' : '' }} col-md-6">
                        <label class="control-label" for="color">رنگ</label>
                        <input id="color" name="color" class="form-control" placeholder="رنگ" value="{{ old('color') }}" type="color">
                        @if($errors->has('color'))
                            <div>
                                <strong class="help-block text-danger">
                                    {{ $errors->first('color') }}
                                </strong>
                            </div>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('publish') ? 'has-error' : '' }} col-md-6">
                        <label class="control-label" for="publish">وضعیت</label>
                        <select id="publish" name="publish" class="form-control">
                            <option {{ (old('publish')==1 ? 'selected' : '') }} value="1">انتشار بده</option>
                            <option {{ (!empty(old('publish')) && old('publish')==0 ? 'selected' : '') }} value="0">پیش نویس کن</option>
                        </select>
                        @if($errors->has('publish'))
                            <div>
                                <strong class="help-block text-danger">
                                    {{ $errors->first('publish') }}
                                </strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="form-group {{ $errors->has('body') ? 'has-error' : '' }} col-md-12">
                        <label class="control-label" for="body">توضیحات</label>
                        <textarea name="body" id="body" class="form-control" placeholder="توضیحات" cols="30" rows="10" required>{{ old('body') }}</textarea>
                        @if($errors->has('body'))
                            <div>
                                <strong class="help-block text-danger">
                                    {{ $errors->first('body') }}
                                </strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group {{ $errors->has('media') ? 'has-error' : '' }} col-md-12">
                        <label class="control-label" for="media">تصویر اسلاید</label>
                        <input  name="media" type="file" id="media" class="filestyle" data-input="false">
                        @if($errors->has('media'))
                            <div>
                                <strong class="help-block text-danger">
                                    {{ $errors->first('media') }}
                                </strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <hr>
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
    <script src="{{ asset('plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}"></script>
    <script src="{{ asset('js/jquery.core.js') }}"></script>
    <script src="{{ asset('js/jquery.app.js') }}"></script>
    <script src="{{ asset('pages/jquery.dashboard_2.js') }}"></script>
@endpush