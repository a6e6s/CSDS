<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <style>
        .gradient-custom-2 {
            /* fallback for old browsers */
            background: #90cbfc;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, #90cbfc, #366fd8, #368cdd, #4571b4);

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, #90cbfc, #366fd8, #368cdd, #4571b4);
        }

        @media (min-width: 768px) {
            .gradient-form {
                height: 100vh !important;
            }
        }

        @media (min-width: 769px) {
            .gradient-custom-2 {
                border-top-right-radius: .3rem;
                border-bottom-right-radius: .3rem;
            }
        }
    </style>
    <!-- Bootstrap CSS v5.2.1 -->
    <link rel="icon" type="image/png" href="{{ asset('images/logosmall.png') }}" />
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@icon/icofont@1.0.1-alpha.1/icofont.min.css">
    <title>{{ env('APP_NAME') }}</title>
</head>

<body style="background: url({{ asset('images/slide1.jpg') }})">

    <section class="h-100 gradient-form" dir="rtl">
        <div class="container-sm py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    @include('home.layouts.flash-messages')

                    <div class="card rounded-3 text-black gradient-custom-2">
                        <div class="row g-0">

                            <div class="col-lg-6 mx-auto">
                                <div class="card-body p-md-5 mx-md-4">

                                    {{-- <div class="text-center">
                                        <a href="{{ route('home') }}" class=""><img
                                                src="{{ asset('images/logo.png') }}" alt="logo">
                                            <h4 class="mt-1 mb-5 pb-1 h6">أنشئ حسابك في دقائق لتبدأ رحلة رعايتك الصحية
                                                بكل سهولة </h4>
                                        </a>
                                    </div> --}}
                                    <form action="{{ route('doctor.signup') }}" method="POST">
                                        @csrf @method('POST')
                                        <p class="text-center">قم بأنشاء حسابك </p>

                                        <div class="mb-3">
                                            <select class="form-select " name="city_id" id="city_id">
                                                <option selected>Select one</option>
                                                @foreach ($cities as $city)
                                                    <option @selected(old('city_id') == $city->id) value="{{ $city->id }}">
                                                        {{ $city->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="" class="form-label"> المدينة</label>
                                        </div>
                                        <div class="mb-3">
                                            <select class="form-select " name="hospital_id" id="hospital_id">
                                                <option selected>Select one</option>
                                                @foreach ($hospitals as $hospital)
                                                    <option @selected(old('hospital_id') == $hospital->id) value="{{ $hospital->id }}">
                                                        {{ $hospital->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="" class="form-label">المستشفي</label>
                                        </div>
                                        <div class="mb-3">
                                            <select class="form-select " name="specialty_id" id="specialty_id">
                                                <option selected>Select one</option>
                                                @foreach ($specialties as $specialty)
                                                    <option @selected(old('specialty_id') == $specialty->id) value="{{ $specialty->id }}">
                                                        {{ $specialty->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="" class="form-label">التخصص</label>
                                        </div>
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input name="name" type="text" id="form2Example11"
                                                value="{{ old('name') }}" class="form-control"
                                                placeholder="fullname" />
                                            <label class="form-label" for="form2Example11">الاسم ثلاثي</label>
                                        </div>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input name="email" type="email" id="form2Example11"
                                                value="{{ old('email') }}" class="form-control"
                                                placeholder="email address" />
                                            <label class="form-label" for="form2Example11">البريد الالكتروني</label>
                                        </div>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input name="password" type="password" id="form2Example22"
                                                class="form-control" />
                                            <label class="form-label" for="form2Example22">كلمة المرور</label>
                                        </div>

                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <button data-mdb-button-init data-mdb-ripple-init
                                                class="btn btn-light btn-block fa-lg  mb-3"
                                                type="submit">انشاء</button>
                                            {{-- <a class="text-muted" href="#!">Forgot password?</a> --}}
                                        </div>

                                        <div class="d-flex align-items-center justify-content-center">
                                            <p class="mb-0 mx-2">مسجل بالفعل ? </p>
                                            <a href="{{ route('doctor.login') }}" class="btn btn-outline-light"> قم بتسجيل
                                                الدخول</a>

                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('assets/js/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/customjs.js') }}"></script>
</body>

</html>
