@extends('admin.layouts.backend')

@section('breadcrumbs')
    <li class="breadcrumb-item"><span><a href="{{ route('settings.index') }}">@lang('Settings')</a></span></li>
    <li class="breadcrumb-item active"><span>@lang('Add')</span></li>
@endsection
@section('style')
@endsection
@section('content')
    <div class="row">
        <div class="text-end pb-2">
            <a href="{{ route('settings.index') }}" class="col btn-sm btn btn-danger"><i class="icofont-undo"></i> @lang('Go back')</a>
        </div>
    </div>
    <form action="{{ route('settings.store') }}" method="post" class="row" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="col-lg-12 pb-2">
            <div class="card">
                <div class="card-header bg-white h5">
                    <i class="icofont-chart-flow text-dark"></i> @lang('Add New')
                </div>
                <div class="card-body row">
                    <div class="mb-3 col-md-6">
                        <label class="name" for="name">@lang('Name')</label>
                        <div class="input-group mb-3">
                            <input class="form-control" onchange="updateInput()" value="{{ old('name') }}" name="name" type="text" placeholder="@lang('Name')" aria-label="name" id="name">
                            @error('name')
                                <span class="break p-2 text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="slug" for="slug">@lang('Alias')</label>
                        <div class="input-group mb-3">
                            <input class="form-control" readonly value="{{ old('slug') }}" name="slug" type="text" placeholder="@lang('Alias')" aria-label="slug" id="slug">
                            @error('slug')
                                <span class="break p-2 text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="description">@lang('Description')</label>
                        <div class="input-group mb-3">
                            <textarea class="form-control ckeditor" name="description" id="ckeditor">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="break p-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="card-header bg-white h5">
                    <i class="icofont-chart-flow text-dark"></i> @lang('Settings')
                </div>
                <div class="card-body row">
                    <div class="mb-3">
                        <label class="site_name" for="site_name">@lang('Site Name')</label>
                        <div class="input-group mb-3">
                            <input class="form-control" value="{{ optional(old('meta'))['site_name'] }}" name="meta[site_name]" type="text" placeholder="@lang('Name')">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="site_description">@lang('Content')</label>
                        <div class="input-group mb-3">
                            <textarea class="form-control ckeditor" name="meta[site_description]" id="ckeditor">{{ optional(old('meta'))['site_description'] }}</textarea>
                        </div>
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
    <script type="text/javascript">
        //write on slug
        function updateInput() {
            let input1 = document.getElementById("name").value;
            document.getElementById("slug").value = input1.replace(/[&\/\\#, +()$~%.'":*?<>{}]/g, '_');
        }
    </script>
@endsection
