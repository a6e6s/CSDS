@extends('admin.layouts.backend')

@section('breadcrumbs')
    <li class="breadcrumb-item"><span><a href="{{ route('doctors.index') }}">@lang('Doctors')</a></span></li>
    <li class="breadcrumb-item active"><span>@lang('Add')</span></li>
@endsection
@section('style')
@endsection
@section('content')
    <div class="row">
        <div class="text-end pb-2">
            <a href="{{ route('doctors.index') }}" class="col btn-sm btn btn-danger"><i class="icofont-undo"></i>
                @lang('Go back')</a>
        </div>
    </div>
    <form action="{{ route('doctors.store') }}" method="post" class="row" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="col-lg-9 pb-2">
            <div class="card">
                <div class="card-header bg-white h5">
                    <i class="icofont-chart-flow text-dark"></i> @lang('Add New')
                </div>
                <div class="card-body">
                    <div class="mb-3 row">
                        <div class="col-md-3"> <label class="title" for="title">@lang('Doctor title')</label>
                            <div class="input-group mb-3">
                                <input class="form-control" value="{{ old('title', 'دكتور ') }}" name="title"
                                    type="text" placeholder="@lang('Doctor title')" aria-label="title" id="title">
                                @error('title')
                                    <span class="break p-2 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-9">
                            <label class="name" for="name">@lang('Doctor name')</label>
                            <div class="input-group mb-3">
                                <input class="form-control" value="{{ old('name') }}" name="name" type="text"
                                    placeholder="@lang('Doctor name')" aria-label="name" id="name">
                                @error('name')
                                    <span class="break p-2 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="name" for="name">@lang('Image')</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                            name="image">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="email" for="email">@lang('Email')</label>
                        <div class="input-group mb-3">
                            <input class="form-control" value="{{ old('email') }}" name="email" type="text"
                                placeholder="@lang('Email')" aria-label="email" id="email">
                            @error('email')
                                <span class="break p-2 text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="password" for="password">@lang('Password')</label>
                        <div class="input-group mb-3">
                            <input class="form-control" value="{{ old('password') }}" name="password" type="password"
                                placeholder="@lang('Password')" aria-label="password" id="password">
                            @error('password')
                                <span class="break p-2 text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="password_repeat" for="password_repeat">@lang('Password repeat')</label>
                        <div class="input-group mb-3">
                            <input class="form-control" value="{{ old('password_repeat') }}" name="password_repeat"
                                type="password" placeholder="@lang('Password repeat')" aria-label="password_repeat"
                                id="password_repeat">
                            @error('password_repeat')
                                <span class="break p-2 text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="certifications" for="certifications">@lang('certifications')</label>
                        <div class="input-group mb-3">
                            <textarea class="form-control" name="certifications" placeholder="@lang('certifications')" aria-label="certifications"
                                rows="5" id="certifications">{{ old('certifications') }}</textarea>
                            @error('certifications')
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
                        <label for="" class="form-label">@lang('City')</label>
                        <select class="form-select " name="city_id" id="city_id">
                            <option value="" selected>Select one</option>
                            @foreach ($cities as $city)
                                <option @selected(old('city_id') == $city->id) value="{{ $city->id }}">{{ $city->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">@lang('Hospital')</label>
                        <select class="form-select " name="hospital_id" id="hospital_id">
                            <option value="" selected>Select one</option>
                            @foreach ($hospitals as $hospital)
                                <option @selected(old('hospital_id') == $hospital->id) value="{{ $hospital->id }}">{{ $hospital->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">@lang('Specialty')</label>
                        <select class="form-select " name="specialty_id" id="specialty_id">
                            <option value="" selected>Select one</option>
                            @foreach ($specialties as $specialty)
                                <option @selected(old('specialty_id') == $specialty->id) value="{{ $specialty->id }}">{{ $specialty->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
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
@endsection
