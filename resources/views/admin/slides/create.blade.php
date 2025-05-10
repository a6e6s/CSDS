@extends('admin.layouts.backend')

@section('breadcrumbs')
    <li class="breadcrumb-item"><span><a href="{{ route('slides.index') }}">@lang('Pages')</a></span></li>
    <li class="breadcrumb-item active"><span>@lang('Add')</span></li>
@endsection
@section('style')
@endsection
@section('content')
    <div class="row">
        <div class="text-end pb-2">
            <a href="{{ route('slides.index') }}" class="col btn-sm btn btn-danger"><i class="icofont-undo"></i> @lang('Go back')</a>
        </div>
    </div>
    <form action="{{ route('slides.store') }}" method="post" class="row" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="col-lg-9 pb-2">
            <div class="card">
                <div class="card-header bg-white h5">
                    <i class="icofont-chart-flow text-dark"></i> @lang('Add New')
                </div>
                <div class="card-body">

                    <div class="mb-3">
                        <label for="slide" class="form-label">Upload Slide</label>
                        <input type="file" class="form-control @error('slide') is-invalid @enderror" id="slide" name="slide">
                        @error('slide')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="title" for="title">@lang('Title')</label>
                        <div class="input-group mb-3">
                            <input class="form-control" onchange="updateInput()" value="{{ old('title') }}" name="title" type="text" placeholder="@lang('Title')" aria-label="title" id="title">
                            @error('title')
                                <span class="break p-2 text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="body">@lang('Subtitle')</label>
                        <div class="input-group mb-3">
                            <textarea class="form-control " name="subtitle" id="">{{ old('subtitle') }}</textarea>
                            @error('subtitle')
                                <div class="break p-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="url" for="url">@lang('URL')</label>
                        <div class="input-group mb-3">
                            <input class="form-control" onchange="updateInput()" value="{{ old('url') }}" name="url" type="text" placeholder="@lang('Title')" aria-label="url" id="url">
                            @error('url')
                                <span class="break p-2 text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header bg-dark text-white"><i class="icofont-gear"></i> @lang('Options')</div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label" for="mobile">@lang('Status')</label>
                        <div class="form-check mb-3">
                            <input {{ old('status') == '0' ? 'checked' : '' }} class="btn-check" id="blocked" type="radio" value="0" name="status">
                            <label class="btn btn-sm btn-outline-danger" for="blocked"><i class="icofont-ban pe-2"></i>@lang('Block')</label>
                            <input {{ old('status') != '0' ? 'checked' : '' }} class="btn-check" id="active" type="radio" value="1" name="status">
                            <label class="btn btn-sm btn-outline-success" for="active"><i class="icofont-ui-check pe-2"></i>@lang('Active')</label>
                        </div>
                        @error('status')
                            <span class="break p-2 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
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
