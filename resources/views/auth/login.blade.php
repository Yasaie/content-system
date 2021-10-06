@extends('layouts.app_1')

@section('content')
<div class="account-pages"></div>
<div class="clearfix"></div>
<div class="wrapper-page">
    <div class=" card-box">
        <div class="panel-heading">
            <h3 class="text-center"> ورود  به حساب <strong class="text-custom">{{ config('app.name') }}</strong> </h3>
        </div>
        <div class="panel-body">
            <form method="POST" class="form-horizontal m-t-20" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="form-group {{ $errors->has('email') ? 'has-errors' : '' }}">
                    <div class="col-xs-12">
                        <input name="email" class="form-control" type="text" placeholder="نام کاربری">
                    </div>
                    @if($errors->has('email'))
                       <span class="help-doc text-danger">
                           <strong>{{ $errors->first('email') }}</strong>
                       </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('password') ? 'has-errors' : '' }}">
                    <div class="col-xs-12">
                        <input name="password" class="form-control" type="password" required="" placeholder="پسورد">
                    </div>
                    @if($errors->has('password'))
                       <span class="help-doc text-danger">
                           <strong>{{ $errors->first('password') }}</strong>
                       </span>
                    @endif
                </div>

                <div class="form-group ">
                    <div class="col-xs-12">
                        <div class="checkbox checkbox-primary">
                            <input name="remember" id="checkbox-signup" type="checkbox">
                            <label for="checkbox-signup">
                               منو به خاطر بسپار
                            </label>
                        </div>

                    </div>
                </div>

                <div class="form-group text-center m-t-40">
                    <div class="col-xs-12">
                        <button class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit">ورود</button>
                    </div>
                </div>

                <div class="form-group m-t-30 m-b-0">
                    <div class="col-sm-12">
                        <a href="{{ route('password.request') }}" class="text-dark"><i class="fa fa-lock m-r-5"></i> فراموش کلمه عبور</a>
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
