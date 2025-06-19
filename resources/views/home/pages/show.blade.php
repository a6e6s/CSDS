@extends('home.layouts.master')
@section('content')
<div class="px-5 home_services"  >
    <div class="p-5 about_title text-white">{!! $page->title !!}</div>
</div>
    <section class="home_about">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-5 ml-xl-auto col-md-8 col-12 mx-auto wow zoomIn mt-5">
                    {!! $page->body !!}
                </div>
                <!--end col-->
            </div>
            <!--end row -->
        </div>
        <!--end container-->
    </section>
@endsection
