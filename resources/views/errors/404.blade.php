@extends('layouts.app_1')
@section('content')
<div class="wrapper-page">
    <div class="ex-page-content p-t-10 text-center">
        <div class="text-error"><span class="text-primary">4</span><i class="ti-face-sad text-pink"></i><span class="text-info">4</span></div>
        <h2>صفحه مورد نظر پیدا نشد</h2><br>
        <p class="text-muted">صفحه ای که به دنبال آن هستید پیدا نشد !!</p>
        <br>
        <a onclick="window.go(-1);return false;" class="btn btn-default waves-effect waves-light" href="{{ URL::previous() }}"> بازگشت </a>
    </div>
</div>
@endsection