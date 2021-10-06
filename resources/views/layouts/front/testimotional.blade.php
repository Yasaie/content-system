@if($customers->isNotEmpty())
    <section class="bgimage overlay overlay--dark p-top-120 p-bottom-75">
        <div class="bg_image_holder">
            <img src="{{ asset('front/img/map3.jpg') }}" alt="">
        </div>
        <div class="content_above">
            <div class="m-bottom-50">
                <div class="divider text-center">
                    <h1 class="color-light">نظرات کاربران</h1>
                    <span class="divider-straight"></span>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="testimonial-carousel-three owl-carousel">
                            @foreach($customers as $customer)
                                <div class="carousel-single">
                                    <div class="card card-shadow card--testimonial2">
                                        <div class="card-body text-center">
                                            @if(!empty($customer->image))
                                                <img style="max-width:80px" src="{{ fileUploadUrl($customer->image) }}" alt="{{ $customer->name }}" class="rounded-circle">
                                            @else
                                                <img style="max-width:100px" src="{{ config('app.authoravatar') }}" alt="{{ $customer->name }}" class="rounded-circle">
                                            @endif
                                            <h5>{{ $customer->name }}</h5>
                                            <p>{{ strip_tags($customer->idea) }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif