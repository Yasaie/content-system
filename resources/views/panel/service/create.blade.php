@extends('panel.layouts.app')

@push('styles')
    <link href="{{ asset('plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')

<ol class="breadcrumb">
    <li>
        <a href="{{ route('panel.index') }}">داشبورد</a>
    </li>
    <li>
        <a href="{{ route('panel.service.index') }}">خدمات</a>
    </li>
    <li class="active">ثبت خدمات جدید</li>
</ol>

<div class="row">
    <form class="form" method="POST" action="{{ route('panel.service.store') }}" enctype="multipart/form-data">
        <div class="col-lg-8">
            <div class="card-box">
                <h4 class="text-dark header-title m-t-0">ایجاد خدمات جدید</h4>
                <hr>
                @csrf
                <div class="row">
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }} col-md-12">
                        <label class="control-label" for="title">عنوان</label>
                        <input id="title" name="title" class="form-control" placeholder="عنوان" value="{{ old('title') }}" type="text">
                        @if($errors->has('title'))
                            <div>
                                <strong class="help-block text-danger">
                                    {{ $errors->first('title') }}
                                </strong>
                            </div>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('body') ? 'has-error' : '' }} col-md-12">
                        <label class="control-label" for="body">محتوا</label>
                        <textarea id="body" name="body" class="form-control" placeholder="محتوا" cols="30" rows="10">{!! old('body') !!}</textarea>
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
                    <div class="form-group {{ $errors->has('meta_excerpt') ? 'has-error' : '' }} col-md-12">
                        <label class="control-label" for="meta_excerpt">توضیحات مختصر</label>
                        <input id="meta_excerpt" name="meta_excerpt" class="form-control" placeholder="توضیحات مختصر" value="{{ old('meta_excerpt') }}" type="text">
                        @if($errors->has('meta_excerpt'))
                            <div>
                                <strong class="help-block text-danger">
                                    {{ $errors->first('meta_excerpt') }}
                                </strong>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-box">
                <h4 class="text-dark header-title m-t-0">تنظیمات مرتبط با سئو</h4>
                <hr>
                <div class="row">
                    <div class="form-group {{ $errors->has('seo_title') ? 'has-error' : '' }} col-md-12">
                        <label class="control-label" for="seo_title">عنوان</label>
                        <input id="seo_title" name="seo_title" class="form-control" placeholder="عنوان در تگ title قرار میگیرد" value="{{ old('seo_title') }}" type="text">
                        @if($errors->has('seo_title'))
                            <div>
                                <strong class="help-block text-danger">
                                    {{ $errors->first('seo_title') }}
                                </strong>
                            </div>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('seo_description') ? 'has-error' : '' }} col-md-12">
                        <label class="control-label" for="seo_description">توضیحات</label>
                        <input id="seo_description" name="seo_description" class="form-control" placeholder="توضیحات در متا تگ description قرار میگیرد" value="{{ old('seo_description') }}" type="text">
                        @if($errors->has('seo_description'))
                            <div>
                                <strong class="help-block text-danger">
                                    {{ $errors->first('seo_description') }}
                                </strong>
                            </div>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('seo_keywords') ? 'has-error' : '' }} col-md-12">
                        <label class="control-label" for="seo_keywords">کلمات کلیدی(با ویرگول جدا شوند)</label>
                        <input id="seo_keywords" name="seo_keywords" class="form-control" placeholder="کلمات کلیدی در تگ meta قرار میگیرند" value="{{ old('seo_keywords') }}" type="text">
                        @if($errors->has('seo_keywords'))
                            <div>
                                <strong class="help-block text-danger">
                                    {{ $errors->first('seo_keywords') }}
                                </strong>
                            </div>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('seo_canonical') ? 'has-error' : '' }} col-md-12">
                        <label class="control-label" for="seo_canonical">لینک اصلی(canonical)</label>
                        <input id="seo_canonical" name="seo_canonical" class="form-control" placeholder="لینک در متا تگ canonical قرار میگیرد" value="{{ old('seo_canonical') }}" type="text">
                        @if($errors->has('seo_canonical'))
                            <div>
                                <strong class="help-block text-danger">
                                    {{ $errors->first('seo_canonical') }}
                                </strong>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card-box">
                <h4 class="text-dark header-title m-t-0">تنظیمات</h4>
                <hr>
                <div class="row">
                    <div class="form-group {{ $errors->has('publish') ? 'has-error' : '' }} col-md-12">
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
                    <div class="col-md-12">
                        <hr>
                    </div>
                    <div class="form-group {{ $errors->has('tags') ? 'has-error' : '' }} col-md-12">
                        <label class="control-label" for="tags">تگ ها</label>
                        <select id="tags" name="tags[]" class="form-control select2" multiple>
                            @if(!empty(old('tags')) && is_array(old('tags')))
                                @foreach(old('tags') as $tag)
                                    <option selected>{{ $tag }}</option>
                                @endforeach
                            @endif
                        </select>
                        @if($errors->has('tags'))
                            <div>
                                <strong class="help-block text-danger">
                                    {{ $errors->first('tags') }}
                                </strong>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <hr>
                    </div>
                    <div class="form-group {{ $errors->has('media') ? 'has-error' : '' }} col-md-12">
                        <label class="control-label" for="media">تصویر شاخص</label>
                        <input  name="media" type="file" id="media" class="filestyle" data-input="false">
                        @if($errors->has('media'))
                            <div>
                                <strong class="help-block text-danger">
                                    {{ $errors->first('media') }}
                                </strong>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="from-group col-md-12">
                        <input class="btn btn-success" type="submit" value="ذخیره کن">
                    </div>
                </div>
            </div>
        </div>
    </form>
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
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('plugins/select2/js/i18n/fa.js') }}"></script>
    <script src="{{ asset('js/jquery.core.js') }}"></script>
    <script src="{{ asset('js/jquery.app.js') }}"></script>
    <script src="{{ asset('pages/jquery.dashboard_2.js') }}"></script>

    <script>
        $('#tags').select2({
            dir: 'rtl',
            language: 'fa',
            multiple: true,
            tags: true,
            placeholder: "تگ ها را وارد کنید",
            tokenSeparators: [',','،'],
        });
    </script>
    <script src="{{ asset('plugins/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'body' );
        CKEDITOR.replace( 'meta_price' );
    </script>

@endpush