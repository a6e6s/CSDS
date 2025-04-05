@extends('admin.layouts.backend')

@section('breadcrumbs')
    <li class="breadcrumb-item"><span><a href="{{ route('pages.index') }}">@lang('Pages')</a></span></li>
    <li class="breadcrumb-item active"><span>@lang('edit')</span></li>
@endsection
@section('style')
@endsection
@section('content')
    <div class="row">
        <div class="text-end pb-2">
            <a href="{{ route('pages.index') }}" class="col btn btn-sm btn-danger"><i class="icofont-undo"></i> @lang('Go back')</a>
        </div>
    </div>
    <form action="{{ route('pages.update', $page->id) }}" method="post" class="row" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-lg-8 pb-2">
            <div class="card">
                <div class="card-header bg-white h5">
                    <i class="icofont-chart-flow text-dark"></i> @lang('Edit')
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="title" for="title">@lang('Title')</label>
                        <div class="input-group mb-3">
                            <input class="form-control" onchange="updateInput()" value="{{ $page->title }}" name="title" type="text" placeholder="@lang('Title')" id="title">
                            @error('title')
                                <span class="break p-2 text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="content">@lang('Content')</label>
                        <div class="input-group mb-3">
                            <textarea class="form-control ckeditor" name="content" id="ckeditor" rows="6">{{ $page->content }}</textarea>
                            @error('content')
                                <div class="break p-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header bg-dark text-white"><i class="icofont-gear"></i> @lang('Options')</div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label" for="mobile">@lang('Status')</label>
                        <div class="form-check mb-3">
                            <input {{ $page->status == '0' ? 'checked' : '' }} class="btn-check" id="blocked" type="radio" value="0" name="status">
                            <label class="btn btn-sm btn-outline-danger" for="blocked"><i class="icofont-ban pe-2"></i>@lang('Block')</label>
                            <input {{ $page->status != '0' ? 'checked' : '' }} class="btn-check" id="active" type="radio" value="1" name="status">
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
    <script src="https://cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('ckeditor', {
            filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form',
        });
        CKEDITOR.config.width = '100%';
        CKEDITOR.config.height = '600px';
        //write on alias
        function updateInput() {
            let input1 = document.getElementById("title").value;
            document.getElementById("alias").value = input1.replace(/[&\/\\#, +()$~%.'":*?<>{}]/g, '_');
        }
    </script>
@endsection
