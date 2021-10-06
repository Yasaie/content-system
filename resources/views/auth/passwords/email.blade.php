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
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" class="form-horizontal m-t-20" action="{{ route('password.email') }}">
                {{ csrf_field() }}
                <input type="hidden" name="token" value="{{ (!empty($token) ? $token : '') }}">

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


                <div class="form-group text-center m-t-40">
                    <div class="col-xs-12">
                        <button class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit">ارسال لینک بازیابی</button>
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
