@extends('admin.layouts.backend')

@section('breadcrumbs')
    <li class="breadcrumb-item active"><span>@lang('Settings')</span></li>
@endsection

@section('style')
@endsection
@section('content')
    <div class="row">
        <div class="text-end pb-2">
            {{-- <a href="{{ route('settings.create') }}" class="col btn btn-sm btn-primary"><i class="icofont-plus"></i> @lang('Add New')</a> --}}
        </div>
    </div>
    <div class="card">
        <div class="card-header bg-white h5">
            <i class="icofont-chart-flow text-dark"></i> @lang('Settings')
        </div>
        <div class="card-body">
            <table class="table table-responsive-lg table-bordered table-striped table-bordered text-center" id="datatable">
                <thead class="thead-inverse">
                    <tr class="bg-dark">
                        <th class="text-start text-light"> @lang('Title')</th>
                        <th class="text-light"> @lang('description')</th>
                        <th class="text-light">@lang('Created at')</th>
                        <th class="text-light">@lang('Actions')</th>
                    </tr>
                    <tr class="search-row">
                        <form action="{{ route('settings.index') }}" method="get" id="search-form">
                            <th class="p-1"><input type="text" class="form-control form-control-sm" value="{{ optional(request('search'))['name'] }}" name="search[name]"></th>
                            <th class="p-1"></th>
                            <th class="p-1"></th>
                            <th class="p-1">
                                <input type="submit" class="btn btn-sm btn-success" value="@lang('Search')">
                                <input type="submit" class="btn btn-sm btn-danger " name="reset" value="@lang('Reset')">
                            </th>
                        </form>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($settings as $setting)
                        <tr>
                            <td> {{ $setting->name }} </td>
                            <td> {{ $setting->description }} </td>
                            <td> {{ optional($setting->created_at)->format('d-m-Y') }} </td>
                            <td>
                                <a class="btn btn-info btn-sm" href="{{ route('settings.edit', ['setting' => $setting->id]) }}"><i class="icofont-edit mx-2"></i>@lang('Edit')</a></li>
                            </td>
                        </tr>
                    @empty
                        <td colspan="8"></td>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer text-muted d-flex pb-0">
            <div class="col-6">@lang('Total') : {{ $settings->total() }}</div>
            <div class="col-6">{{ $settings->appends(Request::all())->links() }}</div>
        </div>
    </div>
@endsection
@section('script')
@endsection
