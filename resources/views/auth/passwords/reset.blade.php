@extends('layouts.app_1')

@section('content')
<div class="account-pages"></div>
<div class="clearfix"></div>
<div class="wrapper-page">
    <div class=" card-box">
        <div class="panel-heading">
            <h3 class="text-center"> بازیابی کلمه عبور </h3>
        </div>
        <div class="panel-body">
            <form method="POST" class="form-horizontal m-t-20" action="{{ route('password.request') }}">
                {{ csrf_field() }}
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group {{ $errors->has('email') ? 'has-errors' : '' }}">
                    <div class="col-xs-12">
                        <input name="email" class="form-control" type="text" placeholder="نام کاربری">
                    </div>
                    @if($errors->has('email'))
                       <span class="help-doc">
                           <strong>{{ $errors->first('email') }}</strong>
                       </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('password') ? 'has-errors' : '' }}">
                    <div class="col-xs-12">
                        <input name="password" class="form-control" type="password" required="" placeholder="پسورد">
                    </div>
                    @if($errors->has('password'))
                       <span class="help-doc">
                           <strong>{{ $errors->first('password') }}</strong>
                       </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('password_confirmation') ? 'has-errors' : '' }}">
                    <div class="col-xs-12">
                        <input name="password_confirmation" class="form-control" type="password_confirmation" required="" placeholder="تکرار کلمه عبور">
                    </div>
                    @if($errors->has('password_confirmation'))
                       <span class="help-doc">
                           <strong>{{ $errors->first('password_confirmation') }}</strong>
                       </span>
                    @endif
                </div>

                <div class="form-group text-center m-t-40">
                    <div class="col-xs-12">
                        <button class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit">ریست کلمه عبور</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
    {{--<div class="row">--}}
        {{--<div class="col-sm-12 text-center">--}}
            {{--<p>--}}
                {{--حساب کاربری ندارید؟<a href="{{ route('register') }}" class="text-primary m-l-5">عضو شوید</a>--}}
            {{--</p>--}}
        {{--</div>--}}
    {{--</div>--}}
</div>
@endsection
