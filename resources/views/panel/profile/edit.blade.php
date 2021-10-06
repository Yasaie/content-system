@extends('panel.layouts.app')

@section('content')

<ol class="breadcrumb">
    <li>
        <a href="{{ route('panel.index') }}">داشبورد</a>
    </li>
    <li class="active">تنظیمات</li>
</ol>

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h4 class="text-dark header-title m-t-0">ویرایش پروفایل</h4>
            <hr>
            <form class="form" method="POST" action="{{ route('panel.profile.update',$user) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }} col-md-6">
                        <label class="control-label" for="name">نام</label>
                        <input id="name" name="name" class="form-control" placeholder="نام" value="{{ $user->name ?? old('name') }}" type="text">
                        @if($errors->has('name'))
                            <div>
                                <strong class="help-block text-danger">
                                    {{ $errors->first('name') }}
                                </strong>
                            </div>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }} col-md-6">
                        <label class="control-label" for="email">ایمیل</label>
                        <input id="email" name="email" class="form-control" placeholder="ایمیل" value="{{ $user->email ?? old('email') }}" type="text">
                        @if($errors->has('email'))
                            <div>
                                <strong class="help-block text-danger">
                                    {{ $errors->first('email') }}
                                </strong>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <hr>
                    </div>
                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }} col-md-6">
                        <label class="control-label" for="password">کلمه عبور</label>
                        <input id="password" name="password" class="form-control" placeholder="کلمه عبور" type="text">
                        @if($errors->has('password'))
                            <div>
                                <strong class="help-block text-danger">
                                    {{ $errors->first('password') }}
                                </strong>
                            </div>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }} col-md-6">
                        <label class="control-label" for="password_confirmation">تکرار کلمه عبور</label>
                        <input id="password_confirmation" name="password_confirmation" class="form-control" placeholder="تکرار کلمه عبور" type="text">
                        @if($errors->has('password_confirmation'))
                            <div>
                                <strong class="help-block text-danger">
                                    {{ $errors->first('password_confirmation') }}
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