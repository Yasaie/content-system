<footer class="footer4 footer--colored">
   <div class="footer__small">
      <div class="container">
         <div class="row">
            <div class="col d-flex flex-wrap justify-content-between align-items-center">
               <div class="content-left">
                  <div class="social  square">
                     <ul class="d-flex flex-wrap">
                        <li><a href="{{ config('app.instagram') }}" class="facebook"><span class="fab fa-instagram"></span></a></li>
                        <li><a href="{{ config('app.telegram') }}" class="gplus"><span class="fab fa-telegram"></span></a></li>
                        <li><a href="{{ config('app.linkedin') }}" class="linkedin"><span class="fab fa-linkedin-in"></span></a></li>
                     </ul>
                  </div>
               </div>
               <div class="d-flex flex-wrap align-items-center content-right">
                  <p>
                     <span>تمامی حقوق مادی و معنوی محفوظ می باشد</span>
                     <span style="visibility: hidden">
                        (
                        طراحی توسط
                        <a href="http://patronic.ir/">گروه پاترونیک</a>
                        )
                     </span>
                  </p>
               </div>
            </div>
         </div>
      </div>
   </div>
</footer>

{{--<footer id="tw-footer" class="tw-footer">--}}
  {{--<div class="container">--}}
     {{--<div class="row">--}}
        {{--<div class="col-md-12 col-lg-4">--}}
           {{--<div class="tw-footer-info-box">--}}
              {{--<a href="{{ route('home') }}" class="footer-logo">--}}
                 {{--<img src="{{ config('app.lightlogo')  }}" alt="{{ config('app.name') }}" class="img-fluid">--}}
              {{--</a>--}}
              {{--<p class="footer-info-text">اگر کسب و کارتون رو مثل شخصی در نظر بگیرید که قراره بین کلی آدم دیگه سخنرانی کنه, طراحی گرافیک و برندسازی و تبلیغاتش مثل آرایش مو, لباس و عطری هست که استفاده میکنه. چقدر برند شما برای این موضوع آماده و برازنده است؟</p>--}}
              {{--<div class="footer-social-link">--}}
                 {{--<h3>ما رو دنبال کنید</h3>--}}
                 {{--<ul>--}}
                    {{--<li><a target="_blank" href="{{ config('app.linkedin') }}"><i class="fa fa-linkedin"></i></a></li>--}}
                    {{--<li><a target="_blank" href="{{ config('app.instagram') }}"><i class="fa fa-instagram"></i></a></li>--}}
                    {{--<li><a target="_blank" href="{{ config('app.telegram') }}"><i class="bg-info fa fa-send"></i></a></li>--}}
                 {{--</ul>--}}
              {{--</div>--}}
              {{--<!-- End Social link -->--}}
           {{--</div>--}}
           {{--<!-- End Footer info -->--}}
           {{--<div class="footer-awarad">--}}
              {{--<img src="{{ asset('front/images/icon/best.png') }}" alt="">--}}
              {{--<p>{{ config('app.name') }}</p>--}}
           {{--</div>--}}
        {{--</div>--}}
        {{--<!-- End Col -->--}}
        {{--<div class="col-md-12 col-lg-8">--}}
           {{--<div class="row">--}}
              {{--<div class="col-md-12">--}}
                 {{--<div class="contact-us contact-us-last">--}}
                    {{--<div class="contact-icon">--}}
                       {{--<i class="icon fa-rotate-180 icon-phone3"></i>--}}
                    {{--</div>--}}
                    {{--<!-- End contact Icon -->--}}
                    {{--<div class="contact-info">--}}
                       {{--<h3>{!! config('app.contactphone')!!}</h3>--}}
                       {{--<p>برای مشاوره رایگان تماس بگیرید</p>--}}
                    {{--</div>--}}
                    {{--<!-- End Contact Info -->--}}
                 {{--</div>--}}
                 {{--<!-- End Contact Us -->--}}
              {{--</div>--}}
              {{--<!-- End Col -->--}}
           {{--</div>--}}
           {{--<!-- End Contact Row -->--}}
           {{--<div class="row">--}}
              {{--<div class="col-md-5 col-lg-6">--}}
                 {{--<div class="footer-widget footer-left-widget">--}}
                    {{--<div class="section-heading">--}}
                       {{--<h3>لینک های مفید</h3>--}}
                       {{--<span class="border-black"></span>--}}
                    {{--</div>--}}
                    {{--<ul>--}}
                       {{--<li><a href="{{ route('home') }}">صفحه اصلی</a></li>--}}
                       {{--<li><a href="{{ route('contactUs.create') }}">تماس با ما</a></li>--}}
                       {{--<li><a href="{{ route('faq.show') }}">پرسش و پاسخ</a></li>--}}
                    {{--</ul>--}}
                 {{--</div>--}}
                 {{--<!-- End Footer Widget -->--}}
              {{--</div>--}}
              {{--<div class="col-md-7 col-lg-6">--}}
                 {{--<div class="footer-widget footer-left-widget">--}}
                    {{--<div class="section-heading">--}}
                       {{--<h3>آخرین مطالب</h3>--}}
                       {{--<span class="border-black"></span>--}}
                    {{--</div>--}}
                    {{--<ul>--}}
                       {{--@foreach($randomBlogs as $randomBlog)--}}
                          {{--<li>--}}
                              {{--<a href="{{ route('blog.show',['id'=>$randomBlog->id,'title'=>$randomBlog->title]) }}">{{ $randomBlog->title }}</a>--}}
                          {{--</li>--}}
                       {{--@endforeach--}}
                    {{--</ul>--}}
                 {{--</div>--}}
                 {{--<!-- End Footer Widget -->--}}
              {{--</div>--}}
              {{--<!-- End Col -->--}}
           {{--</div>--}}
           {{--<!-- End Row -->--}}
        {{--</div>--}}
        {{--<!-- End Col -->--}}
     {{--</div>--}}
     {{--<!-- End Widget Row -->--}}
  {{--</div>--}}
  {{--<!-- End Contact Container -->--}}

  {{--<div class="copyright">--}}
     {{--<div class="container">--}}
        {{--<div class="row">--}}

           {{--<div class="col-md-6">--}}
              {{--<div class="copyright-menu text-sm-center text-md-left">--}}
                 {{--<p>طراحی و اجرا توسط--}}
                    {{--<a target="_blank" href="http:\\shetabit.com">شتابیت</a>--}}
                 {{--</p>--}}
              {{--</div>--}}
           {{--</div>--}}
           {{--<!-- End col -->--}}
           {{--<div class="col-md-6">--}}
              {{--<span>تمامی حقوق این وب سایت برای مجموعه ی</span>--}}
              {{--<a class="text-white" href="{{ route('home') }}">{{ config('app.name') }}</a>--}}
              {{--<span>محفوظ می باشد</span>--}}
           {{--</div>--}}
           {{--<!-- End Col -->--}}
        {{--</div>--}}
        {{--<!-- End Row -->--}}
     {{--</div>--}}
     {{--<!-- End Copyright Container -->--}}
  {{--</div>--}}
  {{--<!-- End Copyright -->--}}
  {{--<!-- Back to top -->--}}
   {{--<div id="back-to-top" class="back-to-top">--}}
      {{--<button class="btn btn-dark" title="Back to Top">--}}
         {{--<i class="fa fa-angle-up"></i>--}}
      {{--</button>--}}
   {{--</div>--}}
   {{--<!-- End Back to top -->--}}
{{--</footer>--}}
