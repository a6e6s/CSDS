@extends('admin.layouts.backend')

@section('breadcrumbs')
    <li class="breadcrumb-item"><span><a href="{{ route('hospitals.index') }}">@lang('Hospitals')</a></span></li>
    <li class="breadcrumb-item active"><span>@lang('Add')</span></li>
@endsection
@section('style')
@endsection
@section('content')
    <div class="row">
        <div class="text-end pb-2">
            <a href="{{ route('hospitals.index') }}" class="col btn-sm btn btn-danger"><i class="icofont-undo"></i>
                @lang('Go back')</a>
        </div>
    </div>
    <form action="{{ route('hospitals.store') }}" method="post" class="row" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="col-lg-9 pb-2">
            <div class="card">
                <div class="card-header bg-white h5">
                    <i class="icofont-chart-flow text-dark"></i> @lang('Add New')
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="name" for="name">@lang('Hospital name')</label>
                        <div class="input-group mb-3">
                            <input class="form-control" value="{{ old('name') }}" name="name" type="text"
                                placeholder="@lang('Hospital name')" aria-label="name" id="name">
                            @error('name')
                                <span class="break p-2 text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="name" for="name">@lang('Hospital name')</label>
                        <input type="file" class="form-control @error('logo') is-invalid @enderror" id="logo" name="logo">
                        @error('logo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="phone" for="phone">@lang('Hospital phone')</label>
                        <div class="input-group mb-3">
                            <input class="form-control" value="{{ old('phone') }}" name="phone" type="text"
                                placeholder="@lang('Hospital phone')" aria-label="phone" id="phone">
                            @error('phone')
                                <span class="break p-2 text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="address" for="address">@lang('Hospital address')</label>
                        <div class="input-group mb-3">
                            <textarea class="form-control" name="address" type="text" placeholder="@lang('Hospital address')" id="address">{{ old('address') }}</textarea>
                            @error('address')
                                <span class="break p-2 text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-6">
                            <label class="latitude" for="latitude">@lang('Latitude')</label>
                            <div class="input-group mb-3">
                                <input class="form-control" value="{{ old('latitude') }}" name="latitude" type="text"
                                    placeholder="@lang('Hospital latitude')" aria-label="latitude" id="latitude">
                                @error('latitude')
                                    <span class="break p-2 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 col-6">
                            <label class="longitude" for="longitude">@lang('Longitude')</label>
                            <div class="input-group mb-3">
                                <input class="form-control" value="{{ old('longitude') }}" name="longitude" type="text"
                                    placeholder="@lang('Hospital longitude')" aria-label="longitude" id="longitude">
                                @error('longitude')
                                    <span class="break p-2 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="description" for="description">@lang('Hospital description')</label>
                        <div class="input-group mb-3">
                            <textarea class="form-control ckeditor" name="description" type="text" placeholder="@lang('Hospital description')"
                                id="description">{{ old('description') }}</textarea>
                            @error('description')
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
                            <input {{ old('status') == '0' ? 'checked' : '' }} class="btn-check" id="blocked"
                                type="radio" value="0" name="status">
                            <label class="btn btn-sm btn-outline-danger" for="blocked"><i
                                    class="icofont-ban pe-2"></i>@lang('Block')</label>
                            <input {{ old('status') != '0' ? 'checked' : '' }} class="btn-check" id="active"
                                type="radio" value="1" name="status">
                            <label class="btn btn-sm btn-outline-success" for="active"><i
                                    class="icofont-ui-check pe-2"></i>@lang('Active')</label>
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
    <script src="{{ asset('assets/js/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript">
        CKEDITOR.replace('ckeditor', {
            filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form',
        });
        CKEDITOR.config.width = '100%';
        CKEDITOR.config.height = '400px';
        //write on alias
        function updateInput() {
            let input1 = document.getElementById("title").value;
            document.getElementById("alias").value = input1.replace(/[&\/\\#, +()$~%.'":*?<>{}]/g, '_');
        }
    </script>
@endsection
