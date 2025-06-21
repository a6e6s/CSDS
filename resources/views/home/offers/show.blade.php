@extends('home.layouts.master')
@section('content')
    <div class="px-5 home_services">
        <div class="p-5 about_title text-white">{!! $offer->name !!}</div>
    </div>
    <section class="home_about">
        <div class="container-lg">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 mb-2">
                    <div class="card">
                        <div class="card-body text-center">
                            <a href="{{ route('offer.show', ['offer' => $offer->id]) }}"> <img class="card-img-top"
                                    height="280px" src="{{ asset('storage/images/offers/' . $offer->image) }}"
                                    alt="{{ $offer->name }}" />
                                <div class="card-text row ">
                                    <s class="col badge bg-danger"> السعر: {{ $offer->price }}</s>

                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6 col-sm-12 mb-2">

                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title h5 mt-3 text-center">{{ $offer->title }} </h3>
                            <p class="card-text text-center">{{ $offer->hospital->name }}</p>
                            <div class="row justify-content-start align-items-start g-2 p-3">
                                <div class="col-6 text-end">مستشفي :
                                    {{-- {{ $offer->hospital }} --}}
                                    <a class="text-info"
                                        href="{{ route('doctor.hospital', $offer->hospital->id) }}">{{ $offer->hospital->name }}</a>
                                </div>
                            </div>
                            <h6 class="p-3">تفاصيل العرض</h6>
                            <p class="card-text">{!! $offer->body !!}</p>
                            <div class="text-start">
                                <div class="card-title px-3 pt-2 badge bg-success mt-3">
                                    <h6>بعد الخصم : {{ $offer->new_price }} </h6>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center align-items-start g-2">
                <div class="card">
                    @auth
                        <div class="card-body">
                            <h3 class="card-title h5 mt-3 text-center">طلب العرض </h3>
                            <p class="card-text text-center">
                            <form action="{{ route('order.store', ['offer_id' => $offer->id]) }}" method="post" class="mx-5">
                                @csrf
                                <div class="mb-3">
                                    <label for="patient" class="form-label">الاسم</label>
                                    <input type="text" class="form-control" name="patient" id="patient"
                                        value="{{ old('patient', Auth::user()->name) }}" aria-describedby="helpId"
                                        placeholder="الاسم بالكامل" />
                                    @error('patient')
                                        <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="contact" class="form-label">رقم التواصل</label>
                                    <input type="text" class="form-control" name="contact" id="contact"
                                        value="{{ old('contact') }}" aria-describedby="helpId" placeholder="رقم التواصل" />
                                    @error('contact')
                                        <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="body">ملاحظات اضافية</label>
                                    <div class="input-group mb-3">
                                        <textarea class="form-control ckeditor" name="body" id="ckeditor">{{ old('body') }}</textarea>
                                        @error('body')
                                            <div class="break p-2 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary"> طلب العرض </button>
                                </div>
                            </form>
                            </p>
                        </div>

                    @endauth
                    @guest
                        <h3 class="card-title h6 m-3 text-center">للحجز قم <a class="text-info"
                                href="{{ route('login') }}">بتسجيل الدخول</a> اولا </h3>
                    @endguest
                </div>
            </div>

            <!--end row -->
        </div>
        <!--end container-->
    </section>
@endsection
