<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div id="sidebar-menu">
            <ul>
                <li>
                    <a href="{{ route('home') }}" target="_blank" class="waves-effect"><i class="ti-home"></i> <span> نمایش سایت </span> </a>
                </li>
                <li>
                    <a href="{{ route('panel.index') }}" class="waves-effect"><i class="ti-dashboard"></i> <span> داشبورد </span> </a>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect">
                        <i class="ti-layout-slider"></i>
                        <span> اسلایدر </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled" style="">
                        <li><a href="{{ route('panel.slide.index') }}">لیست اسلایدها</a></li>
                        <li><a href="{{ route('panel.slide.create') }}">افزودن اسلاید جدید</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect">
                        <i class="ti-menu"></i>
                        <span> منوها </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled" style="">
                        <li><a href="{{ route('panel.menu.index') }}">لیست منوها</a></li>
                        <li><a href="{{ route('panel.menu.create') }}">ایجاد منو جدید</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect">
                        <i class="ti-list"></i>
                        <span> دسته بندی ها </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled" style="">
                        <li><a href="{{ route('panel.category.index') }}">لیست دسته بندی ها</a></li>
                        <li><a href="{{ route('panel.category.create') }}">ایجاد دسته بندی جدید</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect">
                        <i class="ti-pencil"></i>
                        <span> مقالات </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled" style="">
                        <li><a href="{{ route('panel.blog.index') }}">لیست مطالب</a></li>
                        <li><a href="{{ route('panel.blog.create') }}">ایجاد مطلب جدید</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect">
                        <i class="ti-blackboard"></i>
                        <span> صفحه ساز </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled" style="">
                        <li><a href="{{ route('panel.page.index') }}">لیست صفحات</a></li>
                        <li><a href="{{ route('panel.page.create') }}">ایجاد صفحه جدید</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect">
                        <i class="ti-comments"></i>
                        <span> پرسش و پاسخ </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled" style="">
                        <li><a href="{{ route('panel.faq.index') }}">لیست پرسش و پاسخ</a></li>
                        <li><a href="{{ route('panel.faq.create') }}">ایجاد جدید</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect">
                        <i class="ti-themify-favicon-alt"></i>
                        <span> تست ایموشنال </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled" style="">
                        <li><a href="{{ route('panel.customer.index') }}">لیست ایموشنال ها</a></li>
                        <li><a href="{{ route('panel.customer.create') }}">ثبت ایموشنال جدید</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect">
                        <i class="ti-package"></i>
                        <span> خدمات </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('panel.service.index') }}">لیست خدمات</a></li>
                        <li><a href="{{ route('panel.service.create') }}">ثبت خدمات</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect">
                        <i class="ti-user"></i>
                        <span> اعضای تیم </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('panel.team.index') }}">لیست اعضای تیم</a></li>
                        <li><a href="{{ route('panel.team.create') }}">افزودن عضو جدید</a></li>
                    </ul>
                </li>
               <li>
                    <a href="{{ route('panel.contactUs.index') }}" class="waves-effect">
                        <i class="ti-comments-smiley"></i>
                        <span> لیست تماس با ما </span>
                    </a>
               </li>
               <li>
                    <a href="{{ route('panel.logout') }}" class="waves-effect">
                        <i class="ti-power-off"></i>
                        <span> خروج </span>
                    </a>
               </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

