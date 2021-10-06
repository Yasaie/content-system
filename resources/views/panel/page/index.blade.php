@extends('panel.layouts.app')

@section('content')

<ol class="breadcrumb">
    <li>
        <a href="{{ route('panel.index') }}">داشبورد</a>
    </li>
    <li class="active">صفحات</li>
</ol>

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h4 class="text-dark header-title m-t-0">لیست صفحات</h4>
            <hr>
            <div>
                <table class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>عنوان</th>
                            <th class="text-center">تاریخ انتشار</th>
                            <th class="text-center">تاریخ ارسال</th>
                            <th class="text-center">نمایش در صفحه اول</th>
                            <th class="text-center">تگ ها</th>
                            <th class="text-center">آدرس صفحه</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($pages as $page)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td class="text-center">
                                @if($page->published())
                                <a target="_blank" href="{{ route('page.show',['id'=>$page,'title'=>$page->title]) }}">
                                    {{ ($page->title) ?? '---' }}
                                </a>
                                @else
                                <a class="publish_at_first" target="_blank" href="{{ route('page.show',['id'=>$page,'title'=>$page->title]) }}">
                                    {{ ($page->title) ?? '---' }}
                                </a>
                                @endif
                            </td>
                            @if($page->published())
                                <td class="text-center">{{ (new \Date\Date($page->published_at))->toJ() }}</td>
                            @else
                                <td class="text-center text-danger">
                                    <span class="fa fa-close"></span>
                                </td>
                            @endif
                            <td class="text-center">{{ (new \Date\Date($page->created_at))->toJ() }}</td>
                            <td class="text-center">
                                @if($page->showInMainPage())
                                    <span class="fa fa-check text-success"></span>
                                @else
                                    <span class="fa fa-times text-danger"></span>
                                @endif
                            </td>
                            <td class="text-center">
                                @forelse($page->tags as $tag)
                                    <span class="label label-inverse">{{ $tag->name }}</span>
                                @empty
                                    <span class="text-danger fa fa-close"></span>
                                @endforelse
                            </td>
                            <td class="font-12">
                                <input class="form-control text-right" value="{{ route('page.show',['id'=>$page,'title'=>'pagelink']) }}" readonly type="text">
                            </td>
                            <td class="text-center">
                                <form method="POST" action="{{ route('panel.page.destroy',$page) }}">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-sm btn-info" href="{{ route('panel.page.edit',$page) }}">
                                        <span class="fa fa-edit"></span>
                                    </a>
                                    @if($page->published())
                                    <a target="_blank" class="btn btn-sm btn-success" href="{{ route('page.show',['id'=>$page,'title'=>$page->title]) }}">
                                        <span class="fa fa-eye"></span>
                                    </a>
                                    @else
                                    <a target="_blank" class="btn btn-sm btn-success publish_at_first" href="{{ route('page.show',['id'=>$page,'title'=>$page->title]) }}">
                                        <span class="fa fa-eye"></span>
                                    </a>
                                    @endif
                                    <button type="submit" type="submit" class="btn btn-sm btn-danger">
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
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="text-center">
                {{ $pages->links() }}
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