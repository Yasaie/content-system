@extends('panel.layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('plugins/jquery-nestable/nestable.css') }}">
@endpush

@section('content')

<ol class="breadcrumb">
    <li>
        <a href="{{ route('panel.index') }}">داشبورد</a>
    </li>
    <li class="active">دسته بندی ها</li>
</ol>

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h4 class="text-dark header-title m-t-0">مدیریت دسته بندی ها</h4>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    @if($category)
                        <div style="max-width:100%;" class="dd" id="nestable">
                            {!! $category !!}
                        </div>
                    @else
                        <p class="alert alert-danger">هیچ اطلاعاتی یافت نشد</p>
                    @endif
                </div>
                <div class="col-md-12">
                    <hr>
                    <a href="#newModal" class="btn btn-default pull-right" data-toggle="modal">
                        <span class="glyphicon glyphicon-plus-sign"></span> افزودن آیتم جدید
                    </a>
                </div>
            </div>
            <!-- Create new item Modal -->
            <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" class="form-horizontal" action="{{ route('panel.category.store') }}">
                            @csrf
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">مشخصات منو</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="title" class="col-lg-2 control-label">عنوان</label>
                                    <div class="col-lg-10">
                                        <input name="title" class="form-control" type="text" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="label" class="col-lg-2 control-label">برچسب</label>
                                    <div class="col-lg-10">
                                        <input name="label" class="form-control" type="text" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="slug" class="col-lg-2 control-label">اسلاگ</label>
                                    <div class="col-lg-10">
                                        <input name="slug" class="form-control" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">کنسل کن</button>
                                <button type="submit" class="btn btn-primary">ذخیره کن</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Delete item Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" action="{{ url('panel/category/delete') }}">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">حذف منو</h4>
                            </div>
                            <div class="modal-body">
                               <p>آیا مطمئن هستید میخواید این مورد حذف شود؟</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">بیخیال</button>
                                <input type="hidden" name="delete_id" id="postvalue" value="" />
                                <button type="submit" class="btn btn-danger">حذف کن</button>
                            </div>
                        </form>
                    </div>
                </div>
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
    <script src="{{ asset('plugins/jquery-nestable/nestable.js') }}"></script>
    <script src="{{ asset('plugins/notifyjs/js/notify.js') }}"></script>
    <script src="{{ asset('plugins/notifications/notify-metro.js') }}"></script>
    <script type="text/javascript">
    $(function() {
        $('#nestable').nestable({
            dropCallback: function(details) {

                var order = new Array();
                    $("li[data-id='"+details.destId +"']").find('ol:first').children().each(function(index,elem) {
                    order[index] = $(elem).attr('data-id');
                });

                if (order.length === 0){
                    var rootOrder = new Array();
                    $("#nestable > ol > li").each(function(index,elem) {
                        rootOrder[index] = $(elem).attr('data-id');
                    });
                }

               $.get('{{route('panel.category.modify')}}',
                {
                    source : details.sourceId,
                    destination: details.destId,
                    order:JSON.stringify(order),
                    rootOrder:JSON.stringify(rootOrder)
                },
                function(response) {
                    //console.log(response);
                })
                .done(function(response) {
                    $.Notification.autoHideNotify(
                        'success',
                        'bottom right',
                        'پیام سیستم',
                        response
                    );
                })
                .fail(function() {
                    $.Notification.autoHideNotify(
                        'error',
                        'bottom right',
                        'پیام سیستم',
                        'مشکلی در ذخیره اطلاعات به وجود آمده است لطفا دوباره تلاش کنید'
                    );
                 })
                .always(function() {  });

            }
        });

        $('.delete_toggle').each(function(index,elem) {
            $(elem).click(function(e){
                e.preventDefault();
                $('#postvalue').attr('value',$(elem).attr('rel'));
                $('#deleteModal').modal('toggle');
            });
        });

    });
    </script>
@endpush