<div class=" bg-white h6 mb-3">
    <i class="icofont-image icofont-lg text-dark pe-2"></i> @lang('Banner section')
</div>

<div class="mb-3">
    <label class="form-label" for="banner_show">@lang('Show Banner')</label>
    <div class="form-check mb-3">
        <input {{ optional($meta)->banner_show != '0' ? 'checked' : '' }} class="btn-check" id="banner_show" type="radio" value="1" name="meta[banner_show]">
        <label class="btn btn-sm btn-outline-success" for="banner_show"><i class="icofont-ui-check pe-2"></i>@lang('Yes')</label>
        <input {{ optional($meta)->banner_show == '0' ? 'checked' : '' }} class="btn-check" id="banner_hide" type="radio" value="0" name="meta[banner_show]">
        <label class="btn btn-sm btn-outline-danger me-2" for="banner_hide"><i class="icofont-ban pe-2"></i>@lang('No')</label>
    </div>
</div>

<div class="card-header mb-2"></div>
<div class=" bg-white h6 mb-3">
    <i class="icofont-question icofont-lg text-dark pe-2"></i> @lang('About section')
</div>

<div class="mb-3">
    <label class="form-label" for="about_show">@lang('Show About')</label>
    <div class="form-check mb-3">
        <input {{ optional($meta)->about_show != '0' ? 'checked' : '' }} class="btn-check" id="about_show" type="radio" value="1" name="meta[about_show]">
        <label class="btn btn-sm btn-outline-success" for="about_show"><i class="icofont-ui-check pe-2"></i>@lang('Yes')</label>
        <input {{ optional($meta)->about_show == '0' ? 'checked' : '' }} class="btn-check" id="about_hide" type="radio" value="0" name="meta[about_show]">
        <label class="btn btn-sm btn-outline-danger me-2" for="about_hide"><i class="icofont-ban pe-2"></i>@lang('No')</label>
    </div>
</div>

<div class="card-header mb-2"></div>
<div class=" bg-white h6 my-3">
    <i class="icofont-doctor icofont-lg text-dark pe-2"></i> @lang('Doctors section')
</div>
<div class="mb-3">
    <label class="form-label" for="doctors">@lang('Doctors show')</label>
    <div class="form-check mb-3">
        <input {{ optional($meta)->doctors_show != '0' ? 'checked' : '' }} class="btn-check" id="doctors_show" type="radio" value="1" name="meta[doctors_show]">
        <label class="btn btn-sm btn-outline-success" for="doctors_show"><i class="icofont-ui-check pe-2"></i>@lang('Yes')</label>
        <input {{ optional($meta)->doctors_show == '0' ? 'checked' : '' }} class="btn-check" id="doctors_hide" type="radio" value="0" name="meta[doctors_show]">
        <label class="btn btn-sm btn-outline-danger me-2" for="doctors_hide"><i class="icofont-ban pe-2"></i>@lang('No')</label>
    </div>
</div>
<div class="mb-3">
    <label class="doctors_title" for="doctors_title">@lang('Doctors title')</label>
    <div class="input-group mb-3">
        <input class="form-control" value="{{ optional($meta)->doctors_title }}" name="meta[doctors_title]" type="text" placeholder="@lang('Doctors title')">
    </div>
</div>
<div class="mb-3">
    <label class="form-label" for="doctors_description">@lang('Doctors description')</label>
    <div class="input-group mb-3">
        <textarea class="form-control" name="meta[doctors_description]">{{ optional($meta)->doctors_description }}</textarea>
    </div>
</div>

<div class="card-header mb-2"></div>
<div class=" bg-white h6 my-3">
    <i class="icofont-hospital icofont-lg text-dark pe-2"></i> @lang('Clinics section')
</div>
<div class="mb-3">
    <label class="form-label" for="clinics">@lang('Clinics show')</label>
    <div class="form-check mb-3">
        <input {{ optional($meta)->clinics_show != '0' ? 'checked' : '' }} class="btn-check" id="clinics_show" type="radio" value="1" name="meta[clinics_show]">
        <label class="btn btn-sm btn-outline-success" for="clinics_show"><i class="icofont-ui-check pe-2"></i>@lang('Yes')</label>
        <input {{ optional($meta)->clinics_show == '0' ? 'checked' : '' }} class="btn-check" id="clinics_hide" type="radio" value="0" name="meta[clinics_show]">
        <label class="btn btn-sm btn-outline-danger me-2" for="clinics_hide"><i class="icofont-ban pe-2"></i>@lang('No')</label>
    </div>
</div>
<div class="mb-3">
    <label class="clinics_title" for="clinics_title">@lang('Clinics title')</label>
    <div class="input-group mb-3">
        <input class="form-control" value="{{ optional($meta)->clinics_title }}" name="meta[clinics_title]" type="text" placeholder="@lang('Clinics title')">
    </div>
</div>
<div class="mb-3">
    <label class="form-label" for="clinics_description">@lang('Clinics description')</label>
    <div class="input-group mb-3">
        <textarea class="form-control" name="meta[clinics_description]">{{ optional($meta)->clinics_description }}</textarea>
    </div>
</div>

<div class="card-header mb-2"></div>
<div class=" bg-white h6 my-3">
    <i class="icofont-tag icofont-lg text-dark pe-2"></i> @lang('Offers section')
</div>
<div class="mb-3">
    <label class="form-label" for="offers">@lang('Offers show')</label>
    <div class="form-check mb-3">
        <input {{ optional($meta)->offers_show != '0' ? 'checked' : '' }} class="btn-check" id="offers_show" type="radio" value="1" name="meta[offers_show]">
        <label class="btn btn-sm btn-outline-success" for="offers_show"><i class="icofont-ui-check pe-2"></i>@lang('Yes')</label>
        <input {{ optional($meta)->offers_show == '0' ? 'checked' : '' }} class="btn-check" id="offers_hide" type="radio" value="0" name="meta[offers_show]">
        <label class="btn btn-sm btn-outline-danger me-2" for="offers_hide"><i class="icofont-ban pe-2"></i>@lang('No')</label>
    </div>
</div>
<div class="mb-3">
    <label class="offers_title" for="offers_title">@lang('Offers title')</label>
    <div class="input-group mb-3">
        <input class="form-control" value="{{ optional($meta)->offers_title }}" name="meta[offers_title]" type="text" placeholder="@lang('Offers title')">
    </div>
</div>
<div class="mb-3">
    <label class="form-label" for="offers_description">@lang('Offers description')</label>
    <div class="input-group mb-3">
        <textarea class="form-control" name="meta[offers_description]">{{ optional($meta)->offers_description }}</textarea>
    </div>
</div>

<div class="card-header mb-2"></div>
<div class=" bg-white h6 my-3">
    <i class="icofont-envelope icofont-lg text-dark pe-2"></i> @lang('Inquery section')
</div>
<div class="mb-3">
    <label class="form-label" for="inquery">@lang('Inquery show')</label>
    <div class="form-check mb-3">
        <input {{ optional($meta)->inquery_show != '0' ? 'checked' : '' }} class="btn-check" id="inquery_show" type="radio" value="1" name="meta[inquery_show]">
        <label class="btn btn-sm btn-outline-success" for="inquery_show"><i class="icofont-ui-check pe-2"></i>@lang('Yes')</label>
        <input {{ optional($meta)->inquery_show == '0' ? 'checked' : '' }} class="btn-check" id="inquery_hide" type="radio" value="0" name="meta[inquery_show]">
        <label class="btn btn-sm btn-outline-danger me-2" for="inquery_hide"><i class="icofont-ban pe-2"></i>@lang('No')</label>
    </div>
</div>
<div class="mb-3">
    <label class="inquery_title" for="inquery_title">@lang('Inquery title')</label>
    <div class="input-group mb-3">
        <input class="form-control" value="{{ optional($meta)->inquery_title }}" name="meta[inquery_title]" type="text" placeholder="@lang('Inquery title')">
    </div>
</div>
