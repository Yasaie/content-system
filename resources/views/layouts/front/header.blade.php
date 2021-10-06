<section class="header header--1">
    <div class="menu_area menu1">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light px-0">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="la la-bars"></span>
                </button>
                <div class="collapse navbar-collapse order-md-1" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        {!! $menu !!}
                        <li class="nav-item text-right">
                            <a class="nav-link" href="{{ route('home') }}" aria-haspopup="true" aria-expanded="false">
                                <span>صفحه اصلی</span>
                            </a>
                        </li>

                        @auth
                        <li class="nav-item text-right">
                            <a class="nav-link btn p-2 text-white btn-success" target="_blank" href="{{ route('panel.index') }}" aria-haspopup="true" aria-expanded="false">
                                <span class="la la-dashboard"></span>
                                <span>مدیریت</span>
                            </a>
                        </li>
                        @endauth
                    </ul>
                </div>
                <a class="navbar-brand order-sm-1 order-1" href="{{ route('home') }}">
                    <img src="{{ config('app.logo') }}" alt="{{ config('app.name') }}"/>
                </a>
            </nav>
        </div>
    </div>
</section>
