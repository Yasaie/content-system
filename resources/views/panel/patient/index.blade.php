@extends('panel.layouts.app')

@section('content')

    <ol class="breadcrumb">
        <li>
            <a href="{{ route('panel.index') }}">داشبورد</a>
        </li>
        <li class="active">لیست بیماران(کاربران)</li>
    </ol>

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <div class="pull-right">
                    <a class="btn btn-primary btn-sm" href="{{ route('panel.patient.create') }}">
                        <span>ثبت اطلاعات بیمار</span>
                        <span class="fa fa-plus"></span>
                    </a>
                </div>
                <h4 class="text-dark header-title m-t-0">لیست بیماران(کاربران)</h4>
                <hr>
                <div>
                    <table class="table table-bordered table-responsive">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>نام</th>
                            <th>سن</th>
                            <th>جنسیت</th>
                            <th>تلفن تماس</th>
                            <th>شماره موبایل</th>
                            <th>کد پستی</th>
                            <th>آدرس</th>
                            <th>#</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($patients as $patient)
                            <tr>
                                <td class="text-center">{{ $loop->index+1 }}</td>
                                <td>
                                    @if($patient->name)
                                        {{ $patient->name }}
                                    @else
                                        <span class="fa fa-times text-danger"></span>
                                    @endif
                                </td>
                                <td>
                                    @if($patient->age)
                                        {{ $patient->age }}
                                    @else
                                        <span class="fa fa-times text-danger"></span>
                                    @endif
                                </td>
                                <td>
                                    @if($patient->gender)
                                        {{ $patient->gender }}
                                    @else
                                        <span class="fa fa-times text-danger"></span>
                                    @endif
                                </td>
                                <td>
                                    @if($patient->phone)
                                        {{ $patient->phone }}
                                    @else
                                        <span class="fa fa-times text-danger"></span>
                                    @endif
                                </td>
                                <td>
                                    @if($patient->mobile)
                                        {{ $patient->mobile }}
                                    @else
                                        <span class="fa fa-times text-danger"></span>
                                    @endif
                                </td>
                                <td>
                                    @if($patient->postal_code)
                                        {{ $patient->postal_code }}
                                    @else
                                        <span class="fa fa-times text-danger"></span>
                                    @endif
                                </td>
                                <td>
                                    @if($patient->address)
                                        {{ str_limit($patient->address,50) }}
                                    @else
                                        <span class="fa fa-times text-danger"></span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <form method="POST" action="{{ route('panel.patient.destroy',$patient) }}">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-sm btn-info" href="{{ route('panel.patient.edit',$patient) }}">
                                            <span class="fa fa-edit"></span>
                                        </a>
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <span class="fa fa-trash"></span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9">
                                    <p class="alert alert-danger">هیچ اطلاعاتی یافت نشد</p>
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
                <div class="text-center">
                    {{ $patients->links() }}
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