<div class="mb-3">
    <label class="email" for="email">@lang('Email')</label>
    <div class="input-group mb-3">
        <input class="form-control" value="{{ optional($meta)->email }}" name="meta[email]" type="text" placeholder="@lang('Email')">
    </div>
</div>
<div class="mb-3">
    <label class="phone" for="phone">@lang('Phone')</label>
    <div class="input-group mb-3">
        <input class="form-control" value="{{ optional($meta)->phone }}" name="meta[phone]" type="text" placeholder="@lang('Phone')">
    </div>
</div>
<div class="mb-3">
    <label class="mobile" for="mobile">@lang('Mobile')</label>
    <div class="input-group mb-3">
        <input class="form-control" value="{{ optional($meta)->mobile }}" name="meta[mobile]" type="text" placeholder="@lang('Mobile')">
    </div>
</div>
<div class="mb-3">
    <label class="hotline" for="hotline">@lang('Hotline')</label>
    <div class="input-group mb-3">
        <input class="form-control" value="{{ optional($meta)->hotline }}" name="meta[hotline]" type="text" placeholder="@lang('Hotline')">
    </div>
</div>
<div class="mb-3">
    <label class="location" for="location">@lang('Location')</label>
    <div class="input-group mb-3">
        <input class="form-control" value="{{ optional($meta)->location }}" name="meta[location]" type="text" placeholder="@lang('Location')">
    </div>
</div>
<div class="mb-3">
    <label class="address" for="address">@lang('Address')</label>
    <div class="input-group mb-3">
        <input class="form-control" value="{{ optional($meta)->address }}" name="meta[address]" type="text" placeholder="@lang('Address')">
    </div>
</div>
