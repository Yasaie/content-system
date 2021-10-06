@extends('panel.layouts.app')

@section('content')

<ol class="breadcrumb">
    <li>
        <a href="{{ route('panel.index') }}">داشبورد</a>
    </li>
    <li class="active">خدمات</li>
</ol>

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h4 class="text-dark header-title m-t-0">لیست نمونه خدمات</h4>
            <hr>
            <div>
                <table class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>عنوان</th>
                            <th class="text-center">تاریخ انتشار</th>
                            <th class="text-center">تاریخ ارسال</th>
                            <th class="text-center">تگ ها</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($services as $service)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td class="text-center">{{ ($service->title) ?? '---' }}</td>
                            @if($service->published())
                                <td class="text-center">{{ (new \Date\Date($service->published_at))->toJ() }}</td>
                            @else
                                <td class="text-center text-danger">
                                    <span class="fa fa-close"></span>
                                </td>
                            @endif
                            <td class="text-center">{{ (new \Date\Date($service->created_at))->toJ() }}</td>
                            <td class="text-center">
                                @forelse($service->tags as $tag)
                                    <span class="label label-inverse">{{ $tag->name }}</span>
                                @empty
                                    <span class="text-danger fa fa-close"></span>
                                @endforelse
                            </td>
                            <td class="text-center">
                                <form method="POST" action="{{ route('panel.service.destroy',$service) }}">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-sm btn-info" href="{{ route('panel.service.edit',$service) }}">
                                        <span class="fa fa-edit"></span>
                                    </a>
                                    <a class="btn btn-sm btn-success" href="{{ route('panel.service.show',$service) }}">
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
                            <td colspan="7">
                                <p class="alert alert-danger">هیچ اطلاعاتی یافت نشد</p>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="text-center">
                {{ $services->links() }}
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