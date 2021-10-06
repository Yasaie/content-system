@extends('panel.layouts.app')

@section('content')

<ol class="breadcrumb">
    <li>
        <a href="{{ route('panel.index') }}">داشبورد</a>
    </li>
    <li>
        <a href="{{ route('panel.customer.index') }}">لیست مشتریان</a>
    </li>
    <li class="active">ویرایش مشتری</li>
</ol>

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h4 class="text-dark header-title m-t-0">ویرایش مشتری</h4>
            <hr>
            <form class="form" method="POST" action="{{ route('panel.customer.update',$customer) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }} col-md-6">
                        <label class="control-label" for="name">نام مشتری</label>
                        <input id="name" name="name" class="form-control" placeholder="نام" value="{{ $customer->name ?? old('name') }}" type="text">
                        @if($errors->has('name'))
                            <div>
                                <strong class="help-block text-danger">
                                    {{ $errors->first('name') }}
                                </strong>
                            </div>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }} col-md-6">
                        <label class="control-label" for="name">شماره تماس</label>
                        <input id="phone" name="phone" class="form-control" placeholder="شماره تماس" value="{{ $customer->phone ?? old('phone') }}" type="text">
                        @if($errors->has('phone'))
                            <div>
                                <strong class="help-block text-danger">
                                    {{ $errors->first('phone') }}
                                </strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="form-group {{ $errors->has('meta_job') ? 'has-error' : '' }} col-md-6">
                        <label class="control-label" for="meta_job">مقام یا منصب مشتری(شغل)</label>
                        <input id="meta_job" name="meta_job" class="form-control" placeholder="مقام یا منصب" value="{{ $customer->meta_job ?? old('meta_job') }}" type="text">
                        @if($errors->has('meta_job'))
                            <div>
                                <strong class="help-block text-danger">
                                    {{ $errors->first('meta_job') }}
                                </strong>
                            </div>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('publish') ? 'has-error' : '' }} col-md-3">
                        <label class="control-label" for="publish">وضعیت</label>
                        <select id="publish" name="publish" class="form-control">
                            <option {{ ($customer->published() ? 'selected' : '') }} value="1">انتشار بده</option>
                            <option {{ ($customer->notPublished() ? 'selected' : '') }} value="0">پیش نویس کن</option>
                        </select>
                        @if($errors->has('publish'))
                            <div>
                                <strong class="help-block text-danger">
                                    {{ $errors->first('publish') }}
                                </strong>
                            </div>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('mainpage') ? 'has-error' : '' }} col-md-3">
                        <label class="control-label" for="mainpage">وضعیت در صفحه اول سایت</label>
                        <select id="publish" name="mainpage" class="form-control">
                            <option {{ ($customer->showInMainPage() ? 'selected' : '') }} value="1">نمایش بده</option>
                            <option {{ ($customer->notShowInMainPage() ? 'selected' : '') }} value="0">نمایش نده</option>
                        </select>
                        @if($errors->has('mainpage'))
                            <div>
                                <strong class="help-block text-danger">
                                    {{ $errors->first('mainpage') }}
                                </strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="form-group {{ $errors->has('idea') ? 'has-error' : '' }} col-md-12">
                        <label class="control-label" for="idea">نظر مشتری</label>
                        <textarea name="idea" id="idea" class="form-control" placeholder="نظر مشتری" cols="30" rows="10">{{ $customer->idea ?? old('idea') }}</textarea>
                        @if($errors->has('idea'))
                            <div>
                                <strong class="help-block text-danger">
                                    {{ $errors->first('idea') }}
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
                    <div>
                        @if(!empty($customer->image))
                            <img style="width:100px;" class="thumbnail" src="{{ fileUploadUrl($customer->image) }}">
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('media') ? 'has-error' : '' }} col-md-12">
                        <label class="control-label" for="media">تصویر مشتری</label>
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
    <script src="{{ asset('plugins/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'idea' );
    </script>

@endpush