@extends('home.layouts.master', ['settings' => $settings])
@section('content')
<div class="px-5 home_services"  >
    <div class="p-5 about_title ">{!! $page->title !!}</div>
</div>
    <section class="home_about">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-5 ml-xl-auto col-md-8 col-12 mx-auto wow zoomIn mt-5">
                    {!! $page->content !!}
                </div>
                <!--end col-->
                <div class="col-md-4 col-12 p-0 text-end">
                    <img class="wow zoomIn mt-5" data-wow-delay="0.6s" src="{{ asset('storage/images/pages/' . $page->image) }}">
                </div>
                <!--end col-->
            </div>
            <!--end row -->
        </div>
        <!--end container-->
    </section>
@endsection
