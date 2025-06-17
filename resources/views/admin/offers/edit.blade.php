@extends('admin.layouts.backend')

@section('breadcrumbs')
    <li class="breadcrumb-item"><span><a href="{{ route('offers.index') }}">@lang('Offers')</a></span></li>
    <li class="breadcrumb-item active"><span>@lang('edit')</span></li>
@endsection
@section('style')
@endsection
@section('content')
    <div class="row">
        <div class="text-end pb-2">
            <a href="{{ route('offers.index') }}" class="col btn btn-sm btn-danger"><i class="icofont-undo"></i>
                @lang('Go back')</a>
        </div>
    </div>
    <form action="{{ route('offers.update', $offer->id) }}" method="post" class="row" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-lg-9 pb-2">
            <div class="card">
                <div class="card-header bg-white h5">
                    <i class="icofont-chart-flow text-dark"></i> @lang('Edit')
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="title" for="title">@lang('Title')</label>
                        <div class="input-group mb-3">
                            <input class="form-control" onchange="updateInput()" value="{{ $offer->title }}" name="title"
                                type="text" placeholder="@lang('Title')" id="title">
                            @error('title')
                                <span class="break p-2 text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">@lang('Image')</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                            name="image">
                        @if ($offer->image)
                            <img salt="image" width="100px" src="{{ asset('storage/images/offers/' . $offer->image) }}">
                        @endif
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="body">@lang('Content')</label>
                        <div class="input-group mb-3">
                            <textarea class="form-control ckeditor" name="body" id="ckeditor" rows="6">{{ $offer->body }}</textarea>
                            @error('body')
                                <div class="break p-2 text-danger">{{ $message }}</div>
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
                        <label for="" class="form-label">@lang('Hospitals')</label>
                        <select class="form-select form-select" name="hospital_id" id="hospital_id">
                            <option value="">@lang('Select Hospital')</option>
                            @foreach ($hospitals as $hospital)
                                <option @selected($offer->hospital_id == $hospital->id) value="{{ $hospital->id }}">{{ $hospital->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="price" for="price">@lang('Price')</label>
                        <div class="input-group mb-3">
                            <input class="form-control" value="{{ $offer->price }}" name="price" type="text"
                                placeholder="@lang('Price')" aria-label="price" id="price">
                            @error('price')
                                <span class="break p-2 text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="new_price" for="new_price">@lang('New price')</label>
                        <div class="input-group mb-3">
                            <input class="form-control" value="{{ $offer->new_price }}" name="new_price" type="text"
                                placeholder="@lang('New price')" aria-label="new_price" id="new_price">
                            @error('new_price')
                                <span class="break p-2 text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="start_at" for="start_at">@lang('Start at')</label>
                        <div class="input-group mb-3">
                            <input class="form-control" value="{{ $offer->start_at->format('Y-m-d') }}" name="start_at"
                                type="date" placeholder="@lang('Start at')" aria-label="start_at" id="start_at">
                            @error('start_at')
                                <span class="break p-2 text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="end_at" for="end_at">@lang('Ends at')</label>
                        <div class="input-group mb-3">
                            <input class="form-control" value="{{ $offer->end_at->format('Y-m-d') }}" name="end_at"
                                type="date" placeholder="@lang('Ends at')" aria-label="end_at" id="end_at">
                            @error('end_at')
                                <span class="break p-2 text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="mobile">@lang('Status')</label>
                        <div class="form-check mb-3">
                            <input {{ $offer->status == '0' ? 'checked' : '' }} class="btn-check" id="blocked"
                                type="radio" value="0" name="status">
                            <label class="btn btn-sm btn-outline-danger" for="blocked"><i
                                    class="icofont-ban pe-2"></i>@lang('Block')</label>
                            <input {{ $offer->status != '0' ? 'checked' : '' }} class="btn-check" id="active"
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
        CKEDITOR.config.height = '600px';
        //write on alias
        function updateInput() {
            let input1 = document.getElementById("title").value;
            document.getElementById("alias").value = input1.replace(/[&\/\\#, +()$~%.'":*?<>{}]/g, '_');
        }
    </script>
@endsection
