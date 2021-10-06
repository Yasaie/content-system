@extends('panel.layouts.app')

@section('content')

<ol class="breadcrumb">
    <li>
        <a href="{{ route('panel.index') }}">داشبورد</a>
    </li>
    <li class="active">لیست دیدگاه ها</li>
</ol>

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h4 class="text-dark header-title m-t-0">لیست دیدگاه ها</h4>
            <hr>
            <div>
                <table class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>نام</th>
                            <th>ایمیل</th>
                            <th>وبسایت</th>
                            <th>کامنت</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($comments as $comment)
                            <tr>
                                <td class="text-center">{{ $loop->index+1 }}</td>
                                <td>{{ $comment->name }}</td>
                                <td>{{ $comment->email }}</td>
                                <td>{{ $comment->website }}</td>
                                <td>{{ str_limit($comment->comment) }}</td>
                                <td class="text-center">
                                    <form method="POST" action="{{ route('panel.comment.destroy',$comment) }}">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-sm btn-info" href="{{ route('panel.comment.edit',$comment) }}">
                                            <span class="fa fa-edit"></span>
                                        </a>
                                        @if($comment->published())
                                        <a class="btn btn-sm btn-default" title="برای عدم انتشار دیدگاه کلیک کنید" data-toggle="tooltip" data-placement="top" data-title="برای عدم انتشار دیدگاه کلیک کنید" href="{{ route('panel.comment.toggle.publish',$comment) }}">
                                            <span class="fa fa-toggle-on"></span>
                                        </a>
                                        @else
                                        <a class="btn btn-sm btn-inverse" title="برای انتشار دادن دیدگاه کلیک کنید" data-toggle="tooltip" data-placement="top" data-title="برای انتشار دادن دیدگاه کلیک کنید" href="{{ route('panel.comment.toggle.publish',$comment) }}">
                                            <span class="fa fa-toggle-off"></span>
                                        </a>
                                        @endif
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <span class="fa fa-trash"></span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    <p class="alert alert-danger">هیچ اطلاعاتی یافت نشد</p>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="text-center">
                {{ $comments->links() }}
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