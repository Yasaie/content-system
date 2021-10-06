@extends('panel.layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-6 col-sm-6 col-lg-4">
            <div class="mini-stat clearfix card-box">
                <span class="mini-stat-icon bg-info"><i class="ion-edit text-white"></i></span>
                <div class="mini-stat-info text-right text-dark">
                    <span class="counter text-dark" data-plugin="counterup">{{ $blogsCount['all'] }}</span>
                    مجموع مقالات ها
                </div>
                <div class="tiles-progress">
                    @php
                        if ($blogsCount['all']) {
                            $blogPublishedPercent= intval(($blogsCount['published']/$blogsCount['all'])*100);
                        } else {
                            $blogPublishedPercent = 0;
                        }
                    @endphp
                    <div class="m-t-20">
                        <h5 class="text-uppercase">انتشار یافته <span class="pull-right">{{ $blogPublishedPercent }}%</span></h5>
                        <div class="progress progress-sm m-0">
                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="{{ $blogPublishedPercent }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $blogPublishedPercent }}%">
                                <span class="sr-only">{{ $blogPublishedPercent }}% انتشار یافته</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-4">
            <div class="mini-stat clearfix card-box">
                <span class="mini-stat-icon bg-success"><i class="ion-ios7-paper text-white"></i></span>
                <div class="mini-stat-info text-right text-dark">
                    <span class="counter text-dark" data-plugin="counterup">{{ $pagesCount['all'] }}</span>
                    صفحات
                </div>
                <div class="tiles-progress">
                    @php
                        if ($pagesCount['all']) {
                            $pagesPublishedPercent = intval(($pagesCount['published']/$pagesCount['all'])*100);
                        } else {
                            $pagesPublishedPercent = 0;
                        }
                    @endphp
                    <div class="m-t-20">
                        <h5 class="text-uppercase">انتشار یافته <span class="pull-right">{{ $pagesPublishedPercent }}%</span></h5>
                        <div class="progress progress-sm m-0">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{ $pagesPublishedPercent }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $pagesPublishedPercent }}%">
                                <span class="sr-only">{{ $pagesPublishedPercent }}% انتشار یافته</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-sm-12 col-lg-4">
            <div class="mini-stat clearfix card-box">
                <span class="mini-stat-icon bg-warning"><i class="ion-link text-white"></i></span>
                <div class="mini-stat-info text-right text-dark">
                    <span class="counter text-dark" data-plugin="counterup">{{ $catsCount['all'] }}</span>
                    دسته بندی ها
                </div>
                <div class="tiles-progress">
                    @php
                        if ($catsCount['all']) {
                            $catsPublishedPercent = intval(($catsCount['published']/$catsCount['all'])*100);
                        } else {
                            $catsPublishedPercent = 0;
                        }
                    @endphp
                    <div class="m-t-20">
                        <h5 class="text-uppercase">فعال <span class="pull-right">{{ $catsPublishedPercent }}%</span></h5>
                        <div class="progress progress-sm m-0">
                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="{{ $catsPublishedPercent }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $catsPublishedPercent }}%">
                                <span class="sr-only">{{ $catsPublishedPercent }}% فعال</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-6">
            <div class="panel panel-border panel-custom">
                <div class="panel-heading">
                    <h4 class="panel-title">پیش نویس سریع پست</h4>
                    <hr>
                </div>
                <div class="panel-body p-t-0">
                    <p class="text-muted text-justify">اگر چیزی در ذهنتان است که ممکن است بعدا فراموش کنید , می توانید هم اکنون آن را پیش نویس کرده و در زمانی مناسب تکمیل و انتشار دهید</p>
                    <hr>
                    <form class="row" method="post" action="{{ route('panel.blog.note') }}">
                        @csrf
                        <div class="form-group col-sm-12">
                            <label class="form-label" for="title">عنوان</label>
                            <input class="form-control" id="title" name="title" type="text">
                        </div>
                        <div class="form-group col-sm-12">
                            <label class="form-label" for="body">محتوا</label>
                            <textarea class="form-control" name="body" id="body" cols="30" rows="8"></textarea>
                        </div>
                        <div class="form-group col-sm-12">
                            <input class="btn btn-success" value="ذخیره کن" type="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 col-lg-6">

            <div class="row p-b-10">

                <div class="col-md-4 p-b-10">
                    <a class="btn btn-block btn-success" href="{{ route('panel.menu.index') }}">منو ها</a>
                </div>
                <div class="col-md-4 p-b-10">
                    <a class="btn btn-block btn-inverse" href="{{ route('panel.category.index') }}">دسته بندی ها</a>
                </div>
                <div class="col-md-4 p-b-10">
                    <a class="btn btn-block btn-primary" href="{{ route('panel.page.index') }}">صفحه ها</a>
                </div>

                <div class="col-md-6 p-b-10">
                    <a class="btn btn-block btn-success" href="{{ route('panel.blog.index') }}">پست های مقالات</a>
                </div>
                <div class="col-md-6 p-b-10">
                    <a class="btn btn-block btn-primary" href="{{ route('panel.faq.index') }}">پرسش و پاسخ</a>
                </div>

            </div>

            <div class=" panel panel-color panel-primary">
                <!-- Default panel contents -->
                <div class="panel-heading">
                    <h3 class="panel-title">آخرین پست ها</h3>
                </div>
                <div class="nicescroll mx-box" style="overflow: hidden;">
                    <!-- Table -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">عنوان</th>
                                <th class="text-center">وضعیت</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($blogs as $blog)
                            <tr>
                                <th class="text-center" scope="row">{{ $loop->index+1 }}</th>
                                <td class="text-center">{{ str_limit($blog->title,20) }}</td>
                                <td class="text-center">
                                    @if($blog->published())
                                        <span class="label label-success">منتشر شده</span>
                                    @else
                                        <span class="label label-danger">انتشار داده نشده</span>
                                    @endif
                                </td>
                                <td class="text-right">
                                    <form method="POST" action="{{ route('panel.blog.destroy',$blog) }}">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-sm btn-info" href="{{ route('panel.blog.edit',$blog) }}">
                                            <span class="fa fa-edit"></span>
                                        </a>
                                        <a class="btn btn-sm btn-success" href="{{ route('panel.blog.show',$blog) }}">
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
                                <td colspan="4">
                                    <p class="alert alert-danger">هیچ اطلاعاتی یافت نشد</p>
                                    <p class="text-center">
                                        <a class="btn btn-inverse" href="{{ route('panel.blog.create') }}">ارسال اولین پست</a>
                                    </p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box widget-inline">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="widget-inline-box text-center">
                            <h3><i class="text-primary md md-account-balance"></i> <b data-plugin="counterup">{{ $servicesCount['all'] }}</b></h3>
                            <h4 class="text-muted">خدمات</h4>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="widget-inline-box text-center">
                            <h3><i class="text-custom md md-contacts"></i> <b data-plugin="counterup">{{ $slidesCount['all'] }}</b></h3>
                            <h4 class="text-muted">اسلایدها</h4>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="widget-inline-box text-center">
                            <h3><i class="text-pink md md-contacts"></i> <b data-plugin="counterup">{{ $customersCount['all'] }}</b></h3>
                            <h4 class="text-muted">تست ایموشنال ها</h4>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="widget-inline-box text-center b-0">
                            <h3><i class="text-purple md md-person"></i> <b data-plugin="counterup">{{ $teamCount['all'] }}</b></h3>
                            <h4 class="text-muted">اعضای تیم</h4>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="widget-panel widget-style-2 bg-white">
                <i class="md md-menu text-info"></i>
                <h2 class="m-0 text-dark counter font-600">{{ $menusCount['all'] }}</h2>
                <div class="text-muted m-t-5">منو ها</div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="widget-panel widget-style-2 bg-white">
                <i class="md md-question-answer text-pink"></i>
                <h2 class="m-0 text-dark counter font-600">{{ $faqsCount['all'] }}</h2>
                <div class="text-muted m-t-5">پرسش و پاسخ</div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="widget-panel widget-style-2 bg-white">
                <i class="md md-quick-contacts-mail text-custom"></i>
                <h2 class="m-0 text-dark counter font-600">{{ $contactUsCount['all'] }}</h2>
                <div class="text-muted m-t-5">تماس با ما</div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="widget-panel widget-style-2 bg-white">
                <i class="md md-link text-custom"></i>
                <h2 class="m-0 text-dark counter font-600">{{ $tagsCount['all'] }}</h2>
                <div class="text-muted m-t-5">تگ ها</div>
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
    <script src="{{ asset('plugins/bootstrap-sweetalert/sweet-alert.min.js') }}"></script>
    <script src="{{ asset('pages/jquery.todo.js') }}"></script>
    <script src="{{ asset('plugins/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('js/jquery.core.js') }}"></script>
    <script src="{{ asset('js/jquery.app.js') }}"></script>
    <script src="{{ asset('pages/jquery.dashboard_2.js') }}"></script>
@endpush