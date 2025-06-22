@extends('home.layouts.master')
@section('content')
    <div class="px-5 home_services">
        <div class="p-5 about_title text-white">{!! $doctor->name !!}</div>
    </div>
    <section class="home_about">
        <div class="container-lg">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-12 mb-2">
                    <div class="card">
                        <div class="card-body text-center">
                            <a href="{{ route('doctor.show', ['doctor' => $doctor->id]) }}"> <img class="card-img-top"
                                    height="280px" src="{{ asset('storage/images/doctors/' . $doctor->image) }}"
                                    alt="{{ $doctor->name }}" />

                                {{-- <h3 class="card-title h5 mt-3">{{ $doctor->name }}</h3>
                                <p class="card-text">{{ $doctor->specialty->name }}</p> --}}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-6 col-sm-12 mb-2">

                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title h5 mt-3 text-center">{{ $doctor->title }} / {{ $doctor->name }}</h3>
                            <p class="card-text text-center">{{ $doctor->specialty->name }}</p>
                            <div class="row justify-content-start align-items-start g-2 p-3">
                                <div class="col-6 text-end">مستشفي :
                                    {{-- {{ $doctor->hospital }} --}}
                                    <a class="text-info"
                                        href="{{ route('doctor.hospital', $doctor->hospital->id) }}">{{ $doctor->hospital->name }}</a>
                                </div>
                                <div class="col-6 text-start">المدينة : {{ $doctor->city->name }}</div>
                            </div>
                            <h6 class="p-3">معلومات عن الدكتور</h6>
                            <p class="card-text">{{ $doctor->certifications }}</p>


                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center align-items-start g-2">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center">المواعيد المتاحة</h4>
                        <div class="card-text row">
                            @auth
                                <form action="{{ route('order.store', ['id' => 1]) }}" method="post">
                                    @foreach ($appt as $date => $appointmentsOnSameDay)
                                        <div class="fw-bold me-3 mb-3 btn btn-primary col-2">
                                            {{ \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format('Y-M-d') }}
                                        </div>
                                        <div class="d-flex flex-wrap mb-3 align-items-center pb-3 border-bottom col-12  ">
                                            <div class="" role="group" aria-label="Basic checkbox toggle button group">

                                                @foreach ($appointmentsOnSameDay as $appointment)
                                                    <input type="radio" class="btn-check" name="appointment_id"
                                                        value="{{ $appointment->id }}" id="chek{{ $appointment->id }}"
                                                        @checked(old('appointment_id') == $appointment->id) />
                                                    <label class="btn btn-outline-primary my-1 "
                                                        for="chek{{ $appointment->id }}">{{ $appointment->date->format('h:i a') }}</label>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach

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
                                        <button type="submit" class="btn btn-primary"> حجز </button>
                                    </div>

                                </form>

                            @endauth
                            @guest
                                <h3 class="card-title h6 m-3 text-center">للحجز قم <a class="text-info"
                                        href="{{ route('login') }}">بتسجيل الدخول</a> اولا </h3>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>

            <!--end row -->
        </div>
        <!--end container-->
    </section>
@endsection
