<header class="site-header header-style-6">
    <div class="top-bar top-bar-liner bg-gray">
        <div class="container">
            <div class="row">
                <div class="wt-topbar-left clearfix hidden-sm hidden-xs">
                    <ul class="list-unstyled pull-right tb-info-liner">
                        <li><i class="fa fa-envelope text-primary"></i>{!! config('app.mail') !!}</li>
                        <li><i class="fa fa-phone text-primary"></i>{!! config('app.phone') !!}</li>
                    </ul>
                </div>
                <div class="wt-topbar-right clearfix">
                    <ul class="list-inline pull-right tb-social-liner">
                        <li><a href="javascript:void(0);" class="fa fa-facebook"></a></li>
                        <li><a href="javascript:void(0);" class="fa fa-twitter"></a></li>
                        <li><a href="javascript:void(0);" class="fa fa-linkedin"></a></li>
                        <li><a href="javascript:void(0);" class="fa fa-rss"></a></li>
                        <li><a href="javascript:void(0);" class="fa fa-youtube"></a></li>
                        <li><a href="javascript:void(0);" class="fa fa-instagram"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="sticky-header main-bar-wraper">
        <div class="main-bar bg-white">
            <div class="container">
                <div class="logo-header">
                    <a href="{{ route('welcome') }}">
                        <img src="{{ config('app.headLogo') }}" width="216" height="37" alt="" />
                    </a>
                </div>
                <button data-target=".header-nav" data-toggle="collapse" type="button" class="navbar-toggle collapsed">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- MAIN Vav -->
                <div class="header-nav navbar-collapse collapse ">
                    <ul class=" nav navbar-nav">
                        <li class="active">
                            <a href="{{ route('welcome') }}">{{ trans('general.homePage') }}</a>
                        </li>
                        @if($organizations->isNotEmpty())
                        <li class="has-child">
                            <a href="javascript:;"><i class="fa fa-chevron-down"></i>{{ trans('general.organization') }}</a>
                            <div class=" glyphicon glyphicon-plus submenu-toogle"></div>
                            <ul class="sub-menu">
                                @foreach($organizations as $organization)
                                <li><a href="{{ route('organization.show',$organization) }}">{{ $organization->title }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        @endif
                        @if($ProductCategories->isNotEmpty())
                        <li class="has-child">
                            <a href="javascript:;"><i class="fa fa-chevron-down"></i>{{ trans('general.products') }}</a>
                            <div class=" glyphicon glyphicon-plus submenu-toogle"></div>
                            <ul class="sub-menu">
                                @foreach($ProductCategories as $ProductCategory)
                                <li><a href="{{ route('productCategory.show',$ProductCategory) }}">{{ $ProductCategory->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        @endif
                        <li>
                            <a href="{{ route('gallery.index') }}">{{ trans('general.gallery') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('blog.index') }}">{{ trans('general.blog') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('aboutUs.show') }}">{{ trans('general.aboutUs') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('contactUs.create') }}">{{ trans('general.contactUs') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
