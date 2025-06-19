@extends('home.layouts.master')
@section('content')
    <div class="px-5 home_services">
        <div class="p-5 about_title text-white">الاطباء</div>
    </div>
    <section class="home_about">
        <div class="container-lg text-center">
            <h1 class="h2 text-secondary">قائمة الاطباء</h1>
            <h4 class="text-info h5 my-3">صحتك أولويتنا... اختر طبيبك بثقة. </h4>
            <div class="row justify-content-center align-items-start mx-auto wow zoomIn mt-5">
                @foreach ($doctors as $doctor)
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-2">

                        <div class="card">
                            <div class="card-body text-center">
                                <a href="{{ route('doctor.show', ['doctor' => $doctor->id]) }}"> <img class="card-img-top"
                                        height="280px" src="{{ asset('storage/images/doctors/' . $doctor->image) }}"
                                        alt="{{ $doctor->name }}" />

                                    <h3 class="card-title h5 mt-3">{{ $doctor->name }}</h3>
                                    <p class="card-text">{{ $doctor->specialty->name }}</p>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>







        <!--end container-->
    </section>
@endsection
