@extends('panel.layouts.app')

@section('content')

<ol class="breadcrumb">
    <li>
        <a href="{{ route('panel.index') }}">داشبورد</a>
    </li>
    <li>
        <a href="{{ route('panel.faq.index') }}">پرسش و پاسخ</a>
    </li>
    <li class="active">ویرایش پرسش و پاسخ</li>
</ol>

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h4 class="text-dark header-title m-t-0">ویرایش پرسش و پاسخ</h4>
            <hr>
            <form class="form" method="POST" action="{{ route('panel.faq.update',$faq) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="form-group {{ $errors->has('question') ? 'has-error' : '' }} col-md-12">
                        <label class="control-label" for="question">پرسش</label>
                        <textarea name="question" id="question" class="form-control" placeholder="پرسش" cols="30" rows="10">{{ $faq->question ?? old('question') }}</textarea>
                        @if($errors->has('question'))
                            <div>
                                <strong class="help-block text-danger">
                                    {{ $errors->first('question') }}
                                </strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="form-group {{ $errors->has('answer') ? 'has-error' : '' }} col-md-12">
                        <label class="control-label" for="name">پاسخ</label>
                        <textarea name="answer" id="answer" class="form-control" placeholder="پاسخ" cols="30" rows="10">{{ $faq->answer ?? old('answer') }}</textarea>
                        @if($errors->has('answer'))
                            <div>
                                <strong class="help-block text-danger">
                                    {{ $errors->first('answer') }}
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