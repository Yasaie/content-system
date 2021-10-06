<footer class="site-footer footer-light">
    <div class="footer-bottom overlay-wraper bg-white">
        <div class="overlay-main"></div>
        <div class="container p-t20">
            <div class="row">
                <div class="wt-footer-bot-left">
                    <a href="{{ route('welcome') }}"><img src="{{ config('app.footLogo') }}" width="171" height="49" alt=""/></a>
                    <span class="copyrights-text">&copy;{{trans('general.copyrights',['name'=>config('app.name')])}}</span>
                </div>
                <div class="wt-footer-bot-right">
                    <ul class="copyrights-nav pull-right">
                        <li><a href="javascript:void(0);">{{ trans('general.rules') }}</a></li>
                        <li><a href="{{ route('contactUs.create') }}">{{ trans('general.contactUs') }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- BUTTON TOP -->
<button class="scroltop">
    <span class=" iconmoon-house relative" id="btn-vibrate"></span>
</button>
