@extends('panel.layouts.app')

@section('content')

<ol class="breadcrumb">
    <li>
        <a href="{{ route('panel.index') }}">داشبورد</a>
    </li>
    <li>
        <a href="{{ route('panel.comment.index') }}">ویرایش دیدگاه</a>
    </li>
    <li class="active">ویرایش دیدگاه</li>
</ol>

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h4 class="text-dark header-title m-t-0">ویرایش دیدگاه</h4>
            <hr>
            <form class="form" method="POST" action="{{ route('panel.comment.update',$comment) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }} col-md-6">
                        <label class="control-label" for="name">نام</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="نام" value="{{ $comment->name ?? old('name') }}">
                        @if($errors->has('name'))
                            <div>
                                <strong class="help-block text-danger">
                                    {{ $errors->first('name') }}
                                </strong>
                            </div>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }} col-md-6">
                        <label class="control-label" for="email">ایمیل</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="ایمیل" value="{{ $comment->email ?? old('email') }}">
                        @if($errors->has('email'))
                            <div>
                                <strong class="help-block text-danger">
                                    {{ $errors->first('email') }}
                                </strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="form-group {{ $errors->has('website') ? 'has-error' : '' }} col-md-6">
                        <label class="control-label" for="website">وبسایت</label>
                        <input type="url" name="website" id="website" class="form-control" placeholder="وبسایت" value="{{ $comment->website ?? old('website') }}">
                        @if($errors->has('website'))
                            <div>
                                <strong class="help-block text-danger">
                                    {{ $errors->first('website') }}
                                </strong>
                            </div>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('publish') ? 'has-error' : '' }} col-md-6">
                        <label class="control-label" for="publish">وضعیت</label>
                        <select id="publish" name="publish" class="form-control">
                            <option {{ ($comment->published() ? 'selected' : '') }} value="1">انتشار بده</option>
                            <option {{ ($comment->notPublished() ? 'selected' : '') }} value="0">پیش نویس کن</option>
                        </select>
                        @if($errors->has('publish'))
                            <div>
                                <strong class="help-block text-danger">
                                    {{ $errors->first('publish') }}
                                </strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="form-group {{ $errors->has('comment') ? 'has-error' : '' }} col-md-12">
                        <label class="control-label" for="comment">دیدگاه</label>
                        <textarea name="comment" id="comment" class="form-control" placeholder="دیدگاه" cols="30" rows="10">{{ $comment->comment ?? old('comment') }}</textarea>
                        @if($errors->has('comment'))
                            <div>
                                <strong class="help-block text-danger">
                                    {{ $errors->first('comment') }}
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