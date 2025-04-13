<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="Cache-control" content="public">
    <link rel="icon" type="image/png" href="{{ asset('images/logosmall.png') }}" />
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@icon/icofont@1.0.1-alpha.1/icofont.min.css">
    <title>{{ env('APP_NAME') }}</title>

</head>

<body>
    <header>
        <div class="container">
            <div class="row align-items-center align-items-md-start">
                <div class="col-xl-2 col-md-3 col-4">
                    <div class="top_logo"><a href=""><img src="{{ asset('images/logo.png') }}" alt=""></a></div>
                    <!--end top_logo-->
                </div>
                <!--end col-->
                <div class="col-xl-10 col-md-9 col-8">
                    <div class="top_bar d-none d-md-block">
                        <div class="container">
                            <div class="row justify-content-between">

                                <div class="col-auto">
                                    <ul class="top_contact text-start">
                                        <li class="d-none d-md-block">
                                            {{-- @isset($settings['contacts']->meta->email) --}}
                                                <a href="mailto:"><i class="icofont icofont-envelope"></i></a>

                                        </li>
                                        <li class="d-none d-md-block">
                                            {{-- @isset($settings['contacts']->meta->mobile) --}}
                                                <a href="tel:"><i class="icofont icofont-phone"></i></a>

                                        </li>
                                    </ul>
                                </div>
                                <!--end col-->
                                <div class="col-auto">
                                    <ul class="top_social d-none d-lg-block">

                                            <li><a href=""><i class="icofont icofont-facebook"></i></a></li>


                                            <li><a href=""><i class="icofont icofont-twitter"></i></a></li>


                                            <li><a href=""><i class="icofont icofont-instagram"></i></a></li>


                                            <li><a href=""><i class="icofont icofont-youtube"></i></a></li>


                                            <li><a href=""><i class="icofont icofont-pinterest"></i></a></li>


                                            <li><a href=""><i class="icofont icofont-snapchat"></i></a></li>


                                            <li><a href=""><img src="{{ asset('images/tiktok.png') }}" alt=""></a></li>

                                    </ul>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end container-->
                    </div>
                    <!--end top_bar-->
                    <div class="main_nav text-center py-3">
                        <div class="main_menu ml-lg-4">
                            <ul class="ul_clear d-none d-xl-block">
                                <li class="active"><a href="{{ route('home') }}">الرئيسية</a></li>
                                {{-- @foreach (App\Models\Page::where('status', 1)->get(['title', 'id', 'alias']) as $page)
                                    <li><a href="{{ route('page.show', ['page' => $page->id]) . '/' . $page->alias }}">{{ $page->title }}</a></li>
                                @endforeach --}}
                                <li><a href="{{ route('doctors') }}">الأطباء</a></li>
                                <li><a href="{{ route('home') }}#offers">العروض</a></li>
                                <li><a href="{{ route('home') }}#inquery">حجز موعد</a></li>
                            </ul>
                            <a href="" class="d-xl-none top_menu_btn"><i class="icofont icofont-navigation-menu"></i></a>

                            <div class="clearfix"></div>
                        </div>
                        <!--end main_menu-->

                    </div>
                    <!--end main_nav-->
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </header>
    @include('admin.layouts.flash-messages')
    @yield('content')
    <section class="home_blog py-5">
        <!--end top_footer-->
        <div class="site_copyrights">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-7 col-12">

                    </div>
                    <!--end col-->
                    <div class="col-md-5 col-12">
                        <ul class="footer_social">

                                <li><a href=""><i class="icofont icofont-facebook"></i></a></li>


                                <li><a href=""><i class="icofont icofont-twitter"></i></a></li>


                                <li><a href=""><i class="icofont icofont-instagram"></i></a></li>


                                <li><a href=""><i class="icofont icofont-youtube"></i></a></li>


                                <li><a href=""><i class="icofont icofont-pinterest"></i></a></li>


                                <li><a href=""><i class="icofont icofont-snapchat"></i></a></li>


                                <li><a href=""><img src="{{ asset('images/tiktok.png') }}" alt=""></a></li>

                        </ul>
                    </div>
                    <!--end col-->
                </div>
                <!--end row -->
            </div>
            <!--end container-->
        </div>
    </section>
    <a href="" class="page_scoll"><i class="icofont icofont-arrow-up"></i></a>
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('assets/js/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/customjs.js') }}"></script>

</body>

</html>
