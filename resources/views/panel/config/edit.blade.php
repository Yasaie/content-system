@extends('panel.layouts.app')

@section('content')

<ol class="breadcrumb">
    <li>
        <a href="{{ route('panel.index') }}">داشبورد</a>
    </li>
    <li>
        <a href="{{ route('panel.config.edit') }}">تنظیمات</a>
    </li>
    <li class="active">ویرایش تنظیمات</li>
</ol>

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h4 class="text-dark header-title m-t-0">ویرایش تنظیمات</h4>
            <hr>
            <form class="form" method="POST" action="{{ route('panel.config.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-md-12">
                        <p class="alert alert-danger">قرار دادن عدد صفر (0) به منزله رایگان بودن است.</p>
                    </div>
                    <div class="form-group {{ $errors->has('reconsult.price') ? 'has-error' : '' }} col-md-6">
                        <label class="control-label" for="reconsult.price">هزینه انجام درخواست مجدد</label>
                        <input type="number" value="{{ $configs['reconsult.price'] }}" name="reconsult.price" id="reconsult.price" class="form-control" placeholder="هزینه انجام مشاوره">
                        @if($errors->has('reconsult.price'))
                            <div>
                                <strong class="help-block text-danger">
                                    {{ $errors->first('reconsult.price') }}
                                </strong>
                            </div>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('cancer.risk.price') ? 'has-error' : '' }} col-md-6">
                        <label class="control-label" for="cancer.risk.price">هزینه سنجش ریسک سرطان</label>
                        <input type="number" value="{{ $configs['cancer.risk.price'] }}" name="cancer.risk.price" id="cancer.risk.price" class="form-control" placeholder="هزینه انجام مشاوره">
                        @if($errors->has('cancer.risk.price'))
                            <div>
                                <strong class="help-block text-danger">
                                    {{ $errors->first('cancer.risk.price') }}
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