@extends('layouts.app_1')

@section('content')

<div class="account-pages"></div>
<div class="clearfix"></div>
<div class="wrapper-page">
    <div class=" card-box">

        <div class="panel-heading">
            <h3 class="text-center"> ایجاد حساب کاربری </h3>
        </div>

        <div class="panel-body">
            <form class="form-horizontal m-t-20" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                <div class="form-group {{ $errors->has('name') ? 'has-errors' : '' }}">
                    <div class="col-xs-12">
                        <input name="name" class="form-control" type="text" required="" placeholder="نام">
                    </div>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('email') ? 'has-errors' : '' }}">
                    <div class="col-xs-12">
                        <input name="email" class="form-control" type="email" required="" placeholder="ایمیل">
                    </div>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('password') ? "has-errors" : '' }}">
                    <div class="col-xs-12">
                        <input name="password" class="form-control" type="password" required="" placeholder="پسورد">
                    </div>
                    @if($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input name="password_confirmation" class="form-control" type="password" required="" placeholder="تکرار پسوورد">
                    </div>
                </div>

                <div class="form-group text-center m-t-40">
                    <div class="col-xs-12">
                        <button class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit">
                            عضویت
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 text-center">
            <p>
                حساب کاربری دارید؟<a href="{{ route('login') }}" class="text-primary m-l-5"><b>وارد شوید</b></a>
            </p>
        </div>
    </div>
</div>
@endsection
