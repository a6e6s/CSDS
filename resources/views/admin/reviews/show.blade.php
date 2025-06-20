@extends('admin.layouts.backend')

@section('breadcrumbs')
    <li class="breadcrumb-item"><span><a href="{{ route('reviews.index') }}">@lang('Reviews')</a></span></li>
    <li class="breadcrumb-item active"><span>@lang('Edit')</span></li>
@endsection
@section('style')
@endsection
@section('content')
    <div class="row">
        <div class="text-end pb-2">
            <a href="{{ route('reviews.index') }}" class="col btn-sm btn btn-danger"><i class="icofont-undo"></i> @lang('Go back')</a>
        </div>
    </div>

        <div class="col-lg-12 pb-2">
            <div class="card">
                <div class="card-header bg-white h5">
                    <i class="icofont-chart-flow text-dark"></i> @lang('Show')
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="name" for="name">@lang('Rating')</label>
                        <div class="input-group mb-3 h4 text-info ">
                            {!! str_repeat('<i class="icofont-star text-warning"></i>', $review->rating) !!}

                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="name" for="name">@lang('User name')</label>
                        <div class="input-group mb-3 h4 text-info">
                            {{ $review->user->name }}

                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="email" for="email">@lang('Doctor')</label>
                        <div class="input-group mb-3 h4">
                            {{ $review->doctor->name }}

                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="email" for="email">@lang('Message')</label>
                        <div class="input-group mb-3">
                            {{ $review->body }}

                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="mobile">@lang('Status')</label>
                        <div class="form-check mb-3">
                            <input {{ $review->status == '0' ? 'checked' : '' }} class="btn-check" id="blocked" type="radio" value="0" name="status">
                            <label class="btn btn-sm btn-outline-danger" for="blocked"><i class="icofont-ban pe-2"></i>@lang('Block')</label>
                            <input {{ $review->status != '0' ? 'checked' : '' }} class="btn-check" id="active" type="radio" value="1" name="status">
                            <label class="btn btn-sm btn-outline-success" for="active"><i class="icofont-ui-check pe-2"></i>@lang('Active')</label>
                        </div>
                        @error('status')
                            <span class="break p-2 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
@endsection
