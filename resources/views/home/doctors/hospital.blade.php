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
                                    <a
                                        href="{{ route('hospitals', $doctor->hospital->id) }}">{{ $doctor->hospital->name }}</a>
                                </div>
                                <div class="col-6 text-start">المدينة : {{ $doctor->city->name }}</div>
                            </div>
                            <h6 class="p-3">معلومات عن الدكتور</h6>
                            <p class="card-text">{{ $doctor->certifications }}</p>


                        </div>
                    </div>
                </div>
            </div>
            <!--end row -->
        </div>
        <!--end container-->
    </section>
@endsection
