@extends('layouts.app_1')
@section('content')
<div class="wrapper-page">
    <div class="ex-page-content text-center">
        <div class="text-error"><span class="text-primary">4</span><span class="text-pink">0</span><span class="text-info">0</span></div>
        <h2>مشکلی پیش آمده :(</h2><br>
        <p class="text-muted">درخواست نامعتبر از سوی مروگر</p>
        <br>
        <a onclick="window.go(-1);return false;" class="btn btn-default waves-effect waves-light" href="{{ URL::previous() }}"> بازگشت </a>
    </div>
</div>
@endsection