@extends('home.layouts.master', ['settings' => $settings])
@section('content')
    <!--start slider-->
    {{-- @isset($settings['theme']->meta->banner_show) --}}
    <section class="home_slider">
        <div id="h_slider" class=" slide">
            <div class="banners">
                @if ($slides)
                    @foreach ($slides as $b => $banner)
                        <div class="-item @if (!$b) active @endif"
                            style="background-image: url({{ asset('images/slide1.jpg') }});">
                            <div class="container h-100">
                                <div class="row align-items-center h-100">
                                    <div class="col-xl-6 col-lg-6  col-md-5 col-12 me-5">
                                        <div class="fadeInDown h_slide_text text-center text-md-end mx-5">
                                            <h4 class="display-3">{{ $banner->title }}</h4>
                                            <p class="lh-3">{{ $banner->subtitle }}</p>
                                            @if ($banner->url)
                                                <a href="{{ $banner->url }}" class="h_slider_btn me-5"> احجز الآن <i
                                                        class="icofont icofont-rounded-double-left ms-3"></i></a>
                                            @endif
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-xl-4 col-lg-5 col-md-6 col-12 ms-auto align-self-end">
                                        <div class="h_slide_img fadeInUp"><img
                                                src="{{ asset('storage/images/slides/' . $banner->image) }}"></div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row -->
                            </div>
                            <!--end container-->
                        </div>
                    @endforeach
                @endif
                <!--end -item-->
            </div>
        </div>
        <!--end carousel-->
    </section>
    {{-- @endisset --}}
    <!--end home_slider-->
    <!--start About us-->
    {{-- @isset($settings['theme']->meta->about_show) --}}
    <section class="home_about">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 text-center">
                    <h3 class="about_title wow fadeInUp" data-wow-delay="0.5s"><img src="images/logosmall.png">احجز دكتور
                    </h3>
                    <p class="about_text wow fadeInUp" data-wow-delay="0.8s">#####</p>

                </div>
                <div class="col-xl-5 ml-xl-auto col-12 mx-auto">
                    <ul class="about_list">
                        <li class="wow fadeInUp" data-wow-delay="0.3s">
                            <span><img src="images/icon1.png"></span>
                            <h4>قيمنا </h4>
                            <p> التميز - الشفافية - الكفاءة - الإحسان </p>
                        </li>
                        <li class="wow fadeInUp" data-wow-delay="0.4s">
                            <span><img src="images/icon2.png"></span>
                            <h4>رؤيتنا</h4>
                            <p> عيادات رائدة في تقديم الخدمات الطبية التكاملية والتوعية والتثقيف الصحي تهتم بالتميز في تحقيق
                                تجربة علاجية فريدة.</p>
                        </li>
                        <li class="wow fadeInUp" data-wow-delay="0.5s">
                            <span><img src="images/icon3.png"></span>
                            <h4>رسالتنا </h4>
                            <p>تقديم الخدمات الطبية التكاملية التي تساهم في رفع جودة الحياة للفرد والمجتمع عن طريق الاهتمام
                                بجميع .</p>
                        </li>
                    </ul>
                </div>
                <!--end col-->
                <div class="col-xl-5 ml-xl-auto col-12 mx-auto">
                    <div class="bg-white  text-center">
                        <div class="card-body border-2">
                            <form action="{{ route('doctors.search') }}" method="get" class="p-5 my-5">
                                <div class="mb-5">
                                    <select class="form-select form-select-lg text-secondary py-3" name="city_id"
                                        id="">
                                        <option selected value="">اختار المدينة</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-5">
                                    <select class="form-select form-select-lg text-secondary py-3" name="specialty_id"
                                        id="">
                                        <option selected value="">اختار التخصص</option>
                                        @foreach ($specialties as $specialty)
                                            <option value="{{ $specialty->id }}">{{ $specialty->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-5">
                                    <input type="text" class="form-control form-control-lg text-secondary py-3"
                                        name="doctor" id="" placeholder="او ابحث باسم الطبيب" />
                                </div>
                                <button type="submit" class="btn h_slider_btn">
                                    ابحث
                                </button>

                            </form>
                        </div>
                    </div>

                </div>
                <!--end col-->
            </div>
            <!--end row -->
        </div>
        <!--end container-->
    </section>
    {{-- @endisset --}}
    <!--end home_about-->
    <!--start home doctors-->
    {{-- @isset($settings['theme']->meta->doctors_show) --}}
    <section class="home_doctors py-5 my-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="sec_title mb-5 wow bounceIn" data-wow-delay="0.5s">
                        <img src="images/logosmall.png">
                        <h3>الأطــبــــــــــــــاء</h3>
                        <p>أكثر من 25 إستشاري و ٣٠ من مقدمي الخدمات الصحية يعملون معاً لخدمتكم في جميع التخصصات </p>
                    </div>
                    <!--end sec_title-->
                </div>
                <!--end col-->
            </div>
            <!--end row -->
        </div>
        <!--end container-->
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="doctors_slider w-100 wow fadeInUp" data-wow-delay="0.7s">
                        @foreach ($doctors as $doctor)
                            <a href="{{ route('doctor.show', $doctor->id) }}">
                                <div class="slick_slider_item">
                                    <div class="doc_slider_item text-center bg-light"
                                        style="background-image: url({{ asset('storage/images/doctors/' . $doctor->image) }})">
                                        <h4>{{ $doctor->name }} </h4>
                                        <p>{{ optional($doctor->specialty)->title }}</p>
                                    </div>
                                    <!--end doc_slider_item-->
                                </div>
                            </a>
                        @endforeach
                        <!--end slick_slider_item-->
                    </div>
                    <!--end doctors_slider-->
                </div>
                <!--end col-->
            </div>
            <div class="col text-center">
                <a href="{{ route('doctors') }}" class="more_btn theme_btn wow flipInX" data-wow-delay="0.9s"> المزيد
                    <i class="icofont icofont-rounded-double-left ms-3"></i></a>
            </div>
            <!--end row -->
        </div>
        <!--end container-->

    </section>
    {{-- @endisset --}}
    <!--end doctors-->
    {{-- @isset($settings['theme']->meta->specialties_show) --}}
    <section class="home_services py-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="text-center pb-4 mb-5 wow bounceIn" data-wow-delay="0.5s">
                        <img src="images/logosmall.png">
                        <h3 class="text-white">الاقسام الطبية </h3>
                        <p class="text-green">أكثر من 25 إستشاري و ٣٠ من مقدمي الخدمات الصحية يعملون معاً لخدمتكم في جميع
                            التخصصات </p>
                    </div>
                    <!--end sec_title-->
                </div>
                <!--end col-->
            </div>
            <!--end row -->
            <div class="row">
                @foreach ($specialties as $c => $specialty)
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="serv_block wow fadeInUp" data-wow-delay="0.{{ 2 * $c + 5 }}s">
                            <a href="{{ route('doctors.search', ['specialty_id' => $specialty->id]) }}"><img
                                    src="{{ asset('storage/images/specialties/' . $specialty->logo) }}"></a>
                            <a href="{{ route('doctors.search', ['specialty_id' => $specialty->id]) }}"
                                class="serv_title">
                                {{ $specialty->name }}
                                <span>{{ mb_substr(strip_tags($specialty->description), 0, 100) }}</span>
                            </a>
                        </div>
                        <!--end serv_block-->
                    </div>
                @endforeach
                <!--end col-->
                <div class="py-5" id="offers"></div>
            </div>
            <!--end row -->
        </div>
        <!--end container-->
    </section>
    {{-- @endisset --}}
    <!--end home_services-->
    {{-- @isset($settings['theme']->meta->offers_show) --}}
    <section class="home_blog py-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="sec_title mb-5 wow bounceIn" data-wow-delay="0.4s">
                        <img src="images/logosmall.png">
                        <h3>العروض</h3>
                        <p>أكثر من 25 إستشاري و ٣٠ من مقدمي الخدمات الصحية يعملون معاً لخدمتكم في جميع التخصصات </p>
                    </div>
                    <!--end sec_title-->
                </div>
                <!--end col-->
            </div>
            <!--end row -->
            <div class="row">
                @foreach ($offers as $offer)
                    <div class="col-xxl-3 col-md-6 col-12">
                        <div class="blog_item mx-auto wow zoomIn" data-wow-delay="0.5s">
                            <a href="{{ route('offer.show', ['offer' => $offer->id]) }}" class="blog_img">
                                <img src="{{ asset('storage/images/offers/' . $offer->image) }}">
                                <span>{{ optional($offer->created_at)->format('d/m Y') }}</span>
                            </a>
                            <a href="{{ route('offer.show', ['offer' => $offer->id]) }}"
                                class="blog_title">{{ $offer->title }}</a>
                        </div>
                        <!--end blog_item-->
                    </div>
                    <!--end col-->
                @endforeach
                <div class="py-5" id="inquery"></div>
            </div>
            <!--end row -->
            <div class="row">
                <div class="col text-center">
                    <a href="{{ route('offers') }}" class="more_btn theme_btn wow flipInX" data-wow-delay="0.9s"> المزيد
                        <i class="icofont icofont-rounded-double-left ms-3"></i></a>
                </div>
                <!--end col-->
            </div>
            <!--end row -->
        </div>
        <!--end container-->
    </section>
    {{-- @endisset --}}
    <!--end home_blog-->
    <!--end home_blog-->
@endsection
