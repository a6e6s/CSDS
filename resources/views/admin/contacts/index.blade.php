@extends('admin.layouts.backend')

@section('breadcrumbs')
    <li class="breadcrumb-item active"><span>@lang('Contacts')</span></li>
@endsection

@section('style')
@endsection
@section('content')
    <div class="row">
        <div class="text-end pb-2">
            <a href="{{ route('contacts.create') }}" class="col btn btn-sm btn-primary"><i class="icofont-plus"></i> @lang('Add New')</a>
        </div>
    </div>
    <div class="card">
        <div class="card-header bg-white h5">
            <i class="icofont-chart-flow text-dark"></i> @lang('Contacts')
        </div>
        <div class="card-body">
            <table class="table table-responsive-lg table-bordered table-striped table-bordered text-center" id="datatable">
                <thead class="thead-inverse">
                    <tr class="bg-dark">
                        <th class="text-light"><input class="form-check-input me-2" id="checkAll" onclick="checkAll('datatable');isChecked()" type="checkbox"></th>
                        <th class="text-light">@lang('Name')</th>
                        <th class="text-start text-light"> @lang('Email')</th>
                        <th class="text-light">@lang('Status')</th>
                        <th class="text-light">@lang('Created at')</th>
                        <th class="text-light">@lang('Actions')</th>
                    </tr>
                    <tr class="search-row">
                        <form action="{{ route('contacts.index') }}" method="get" id="search-form">
                            <th class="p-1"></th>
                            <th class="p-1"><input type="text" class="form-control form-control-sm" value="{{ optional(request('search'))['name'] }}" name="search[name]"></th>
                            <th class="p-1"></th>
                            <th class="p-1">
                                <select class="form-select form-select-sm" name="search[status]">
                                    <option value="">Choose</option>
                                    <option {{ optional(request('search'))['status'] == 1 ? 'selected' : '' }} value="1">@lang('Readed')</option>
                                    <option {{ optional(request('search'))['status'] == '0' ? 'selected' : '' }} value="0">@lang('Unreaded')</option>
                                </select>
                            </th>
                            <th class="p-1"></th>
                            <th class="p-1">
                                <input type="submit" class="btn btn-sm btn-success" value="@lang('Search')">
                                <input type="submit" class="btn btn-sm btn-danger " name="reset" value="@lang('Reset')">
                            </th>
                        </form>
                    </tr>
                </thead>
                <tbody>
                    <tr class="d-none actionRow">
                        <td colspan="8" class="text-start bg-white">
                            <form action="{{ route('contacts.actions') }}" method="post" id="multi-actions-form">
                                @csrf @method('PATCH')
                                <button type="submit" value="1" name="blockAll" class="btn btn-sm btn-warning"><i class="icofont-ban"></i> @lang('Mark all read')</button>
                                <button type="submit" value="1" name="ActivateAll" class="btn btn-sm btn-success"><i class="icofont-check-circled"></i> @lang('Mark all unread')</button>
                                <button type="submit" onclick="return confirm('Are You Sure ?')"  value="1" name="DeleteAll" class="btn btn-sm btn-danger"><i class="icofont-trash"></i> @lang('Delete selected')</button>
                                <input type="hidden" id="allrecords" name="allrecords">
                            </form>
                        </td>
                    </tr>
                    @forelse ($contacts as $contact)
                        <tr>
                            <td class="text-start"><input name="record[]" class="form-check-checkbox me-2" onclick="isChecked()" type="checkbox" value="{{ $contact->id }}"> </td>
                            <td class="text-start">{{  $contact->name }}</td>
                            <td> {{ ucfirst($contact->email) }} </td>
                            <td> {!! $contact->status ? '<i class="icofont-envelope text-success icofont-lg"></i>' : '<i class="icofont-envelope-open icofont-lg text-dark"></i>' !!}</td>
                            <td> {{ optional($contact->created_at)->format('d-m-Y') }} </td>
                            <td>
                                <div>
                                    <button class="btn btn-info dropdown-toggle btn-sm" type="button" data-coreui-toggle="dropdown" aria-expanded="false">@lang('Actions')</button>
                                    <ul class="dropdown-menu p-0 ltr">
                                        {{-- <li><a class="dropdown-item" href="{{ route('contacts.show', ['contact'=>$contact->id]) }}"><i class="icofont-eye-alt text-info pe-3"></i>@lang('Show')</a></li> --}}
                                        <li><a class="dropdown-item" href="{{ route('contacts.show', ['contact' => $contact->id]) }}"><i class="icofont-edit text-info pe-3"></i>@lang('Show')</a></li>
                                        @if ($contact->status)
                                            <li>
                                                <form action="{{ route('contacts.actions', ['id' => $contact->id]) }}" method="post">
                                                    @csrf @method('PATCH')
                                                    <button type="submit" name="block" value="1" class="dropdown-item"><i class="icofont-ban text-warning pe-3"></i>@lang('Unreaded')</button>
                                                </form>
                                            </li>
                                        @else
                                            <li>
                                                <form action="{{ route('contacts.actions', ['id' => $contact->id]) }}" method="post">
                                                    @csrf @method('PATCH')
                                                    <button type="submit" name="activate" value="1" class="dropdown-item"><i class="icofont-check-circled text-success pe-3"></i>@lang('Readed')</button>
                                                </form>
                                            </li>
                                        @endif
                                        <li>
                                            <form action="{{ route('contacts.destroy', ['contact' => $contact->id]) }}" method="post">
                                                @csrf @method('DELETE')
                                                <button onclick="return confirm('Are You Sure ?')" type="submit" name="delete" class="dropdown-item"><i class="icofont-trash text-danger pe-3"></i>@lang('Delete')</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <td colspan="8"></td>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer text-muted d-flex pb-0">
            <div class="col-6">@lang('Total') : {{ $contacts->total() }}</div>
            <div class="col-6">{{ $contacts->appends(Request::all())->links() }}</div>
        </div>
    </div>
@endsection
@section('script')
@endsection
