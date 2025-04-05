@extends('admin.layouts.backend')

@section('breadcrumbs')
    <li class="breadcrumb-item"><span><a href="{{ route('settings.index') }}">@lang('Settings')</a></span></li>
    <li class="breadcrumb-item active"><span>@lang('edit')</span></li>
@endsection
@section('style')
@endsection
@section('content')
    <div class="row">
        <div class="text-end pb-2">
            <a href="{{ route('settings.index') }}" class="col btn btn-sm btn-danger"><i class="icofont-undo"></i> @lang('Go back')</a>
        </div>
    </div>
    <form action="{{ route('settings.update', $setting->id) }}" method="post" class="row" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-lg-12 pb-2">
            <div class="card">
                <div class="card-header bg-white h5">
                    <i class="icofont-chart-flow text-dark"></i> @lang('Edit')
                </div>
                <div class="card-body row">
                    <div class="mb-3 col-md-12">
                        <label class="name" for="name">@lang('Name')</label>
                        <div class="input-group mb-3">
                            <input class="form-control" onchange="updateInput()" value="{{ $setting->name }}" name="name" type="text" placeholder="@lang('Name')" aria-label="name" id="name">
                            @error('name')
                                <span class="break p-2 text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="description">@lang('Description')</label>
                        <div class="input-group mb-3">
                            <textarea class="form-control" name="description">{{ $setting->description }}</textarea>
                            @error('description')
                                <div class="break p-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="card-body row">
                    <div class="card-header bg-white h5 mb-5">
                        <i class="icofont-chart-flow text-dark"></i> @lang('Settings')
                    </div>
                    @include('admin.settings.' . strtolower($setting->slug))
                </div>
            </div>
        </div>
        <div class="text-white pt-2">
            <button name="save" type="submit" class="btn btn-primary"><i class="icofont-save"></i>
                @lang('Save')</button>
        </div>
    </form>
@endsection
@section('script')
@endsection
