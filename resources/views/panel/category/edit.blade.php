@extends('panel.layouts.app')

@section('content')

<ol class="breadcrumb">
    <li>
        <a href="{{ route('panel.index') }}">داشبورد</a>
    </li>
    <li>
        <a href="{{ route('panel.category.index') }}">دسته بندی ها</a>
    </li>
    <li class="active">ویرایش دسته بندی</li>
</ol>

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h4 class="text-dark header-title m-t-0">ویرایش منو</h4>
            <hr>
            <form class="form" method="POST" action="{{ route('panel.category.update',$category) }}">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }} col-md-6">
                        <label class="control-label" for="title">عنوان</label>
                        <input id="title" name="title" class="form-control" placeholder="عنوان" value="{{ $category->title ?? old('title') }}" type="text">
                        @if($errors->has('title'))
                            <div>
                                <strong class="help-block text-danger">
                                    {{ $errors->first('title') }}
                                </strong>
                            </div>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('label') ? 'has-error' : '' }} col-md-6">
                        <label class="control-label" for="label">برچسب</label>
                        <input id="label" name="label" class="form-control" placeholder="برچسب" value="{{ $category->label ?? old('label') }}" type="text">
                        @if($errors->has('label'))
                            <div>
                                <strong class="help-block text-danger">
                                    {{ $errors->first('label') }}
                                </strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }} col-md-8">
                        <label class="control-label" for="slug">اسلاگ</label>
                        <input id="slug" name="slug" class="form-control" placeholder="اسلاگ" value="{{ $category->slug ?? old('slug') }}" type="text">
                        @if($errors->has('slug'))
                            <div>
                                <strong class="help-block text-danger">
                                    {{ $errors->first('slug') }}
                                </strong>
                            </div>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('publish') ? 'has-error' : '' }} col-md-4">
                        <label class="control-label" for="publish">وضعیت</label>
                        <select id="publish" name="publish" class="form-control">
                            <option {{ ($category->published() ? 'selected' : '') }} value="1">انتشار بده</option>
                            <option {{ ($category->notPublished() ? 'selected' : '') }} value="0">پیش نویس کن</option>
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