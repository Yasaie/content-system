@extends('panel.layouts.app')

@section('content')

<ol class="breadcrumb">
    <li>
        <a href="{{ route('panel.index') }}">داشبورد</a>
    </li>
    <li class="active">لیست تماس ها</li>
</ol>

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h4 class="text-dark header-title m-t-0">لیست تماس با ما</h4>
            <hr>
            <div>
                <table class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>موضوع</th>
                            <th>نام</th>
                            <th>ایمیل</th>
                            <th>تلفن</th>
                            <th>وضعیت</th>
                            <th>پیام</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($contactUses as $contactUs)
                            <tr>
                                <td class="text-center">{{ $loop->index+1 }}</td>
                                <td>{{ $contactUs->subject }}</td>
                                <td>{{ $contactUs->name }}</td>
                                <td>{{ $contactUs->email }}</td>
                                <td>{{ $contactUs->phone }}</td>
                                <td>{!! ($contactUs->readed() ? '<span class="label label-success">خوانده شده</span>' : '<span class="label label-danger">جدید</span>') !!}</td>
                                <td>{{ str_limit(strip_tags($contactUs->content)) }}</td>
                                <td class="text-center">
                                    <form method="POST" action="{{ route('panel.contactUs.destroy',$contactUs) }}">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-sm btn-success" href="{{ route('panel.contactUs.show',$contactUs) }}">
                                            <span class="fa fa-eye"></span>
                                        </a>
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <span class="fa fa-trash"></span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8">
                                    <p class="alert alert-danger">هیچ اطلاعاتی یافت نشد</p>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="text-center">
                {{ $contactUses->links() }}
            </div>
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