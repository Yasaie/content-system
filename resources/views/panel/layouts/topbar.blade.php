<div class="topbar">
    <div class="topbar-left">
        <div class="text-center">
            <a href="{{ route('panel.index') }}" class="logo">
                <i class="icon-magnet icon-c-logo"></i>
                <span>{{ config('app.name') }}</span>
            </a>
        </div>
    </div>
    <div class="navbar navbar-default" role="navigation">
        <div class="container">
            <div>
                <div class="pull-left">
                    <button class="button-menu-mobile open-left waves-effect waves-light">
                        <i class="md md-menu"></i>
                    </button>
                    <span class="clearfix"></span>
                </div>

                <ul class="nav navbar-nav navbar-right pull-right">
                    <li class="dropdown top-menu-item-xs">
                        <a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true"><img src="{{ asset('images/avatar.png') }}" alt="user-img" class="img-circle"></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('panel.profile.edit') }}"><i class="ti-settings m-r-10 text-custom"></i>تنظیمات پروفایل</a></li>
                            <li class="divider"></li>
                            <form method="post" action="{{ route('panel.logout') }}">
                                @csrf
                                <button class="btn btn-block" type="submit">
                                    <i class="ti-power-off m-r-10 text-danger"></i>
                                    <span>خروج</span>
                                </button>
                            </form>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
