@extends('home.layouts.master')
@section('content')
    <div class="px-5 home_services">
        <div class="p-5 about_title text-white">الاطباء</div>
    </div>
    <section class="home_about">
        <div class="container-lg text-center">
            <h1 class="h2 text-secondary">قائمة العروض</h1>
            <h4 class="text-info h5 my-3">صحتك أولويتنا... اختر من افضل العروض . </h4>
            <div class="row justify-content-center align-items-start mx-auto wow zoomIn mt-5">
                @foreach ($offers as $offer)
                    <div class="col-lg-4 col-md-6 col-sm-1 mb-2">

                        <div class="card">
                            <div class="card-body text-center">
                                <a href="{{ route('offer.show', ['offer' => $offer->id]) }}"> <img class="card-img-top"
                                        height="280px" src="{{ asset('storage/images/offers/' . $offer->image) }}"
                                        alt="{{ $offer->name }}" />
                                    <h3 class="card-title h5 mt-3">{{ $offer->name }}</h3>
                                    <p class="card-text">{{ $offer->hospital->name }}</p>
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
