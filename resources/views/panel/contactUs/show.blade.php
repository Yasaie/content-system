@extends('panel.layouts.app')

@section('content')

<ol class="breadcrumb">
    <li>
        <a href="{{ route('panel.index') }}">داشبورد</a>
    </li>
    <li>
        <a href="{{ route('panel.contactUs.index') }}">لیست تماس با ما</a>
    </li>
    <li class="active">نمایش تماس با ما</li>
</ol>

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <table class="table table-bordered table-responsive">
                <tr>
                    <td>نام</td>
                    <td>{{ $contactUs->name }}</td>
                </tr>
                <tr>
                    <td>ایمیل</td>
                    <td>{{ $contactUs->email }}</td>
                </tr>
                <tr>
                    <td>شماره تلفن</td>
                    <td>{{ $contactUs->phone }}</td>
                </tr>
                <tr>
                    <td>توضیحات</td>
                    <td>{{ $contactUs->content }}</td>
                </tr>
            </table>
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