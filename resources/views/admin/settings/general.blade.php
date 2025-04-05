<div class="mb-3">
    <label class="site_name" for="site_name">@lang('Site Name')</label>
    <div class="input-group mb-3">
        <input class="form-control" value="{{ optional($meta)->site_name }}" name="meta[site_name]" type="text" placeholder="@lang('Name')">
    </div>
</div>
<div class="mb-3">
    <label class="form-label" for="site_description">@lang('Site description')</label>
    <div class="input-group mb-3">
        <textarea class="form-control" name="meta[site_description]">{{ optional($meta)->site_description }}</textarea>
    </div>
</div>
<div class="mb-3">
    <label class="form-label" for="about">@lang('About')</label>
    <div class="input-group mb-3">
        <textarea class="form-control" name="meta[about]">{{ optional($meta)->about }}</textarea>
    </div>
</div>

<div class="mb-3">
    <label class="form-label" for="our_values">@lang('Our values')</label>
    <div class="input-group mb-3">
        <textarea class="form-control" name="meta[our_values]">{{ optional($meta)->our_values }}</textarea>
    </div>
</div>
<div class="mb-3">
    <label class="form-label" for="our_vision">@lang('Our vision')</label>
    <div class="input-group mb-3">
        <textarea class="form-control" name="meta[our_vision]">{{ optional($meta)->our_vision }}</textarea>
    </div>
</div>
<div class="mb-3">
    <label class="form-label" for="our_message">@lang('Our message')</label>
    <div class="input-group mb-3">
        <textarea class="form-control" name="meta[our_message]">{{ optional($meta)->our_message }}</textarea>
    </div>
</div>
