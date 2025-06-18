<div class="sidebar sidebar-dark sidebar-fixed sidebar-self-hiding-xl" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
        <img src="{{ asset('images/logosmall.png') }}" class="sidebar-brand-full" width="" height="32"
            alt="CoreUI Logo">
        <img src="{{ asset('images/logolarge.png') }}" class="sidebar-brand-narrow" width="46" height="46"
            alt="CoreUI Logo">
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">

        <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}"><i
                    class="nav-icon icofont-dashboard "></i>@lang('Dashboard')</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('slides.index') }}"><i
                    class="nav-icon icofont-image"></i>@lang('Slides')</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('pages.index') }}"><i
                    class="nav-icon icofont-tasks"></i>@lang('Pages')</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('cities.index') }}"><i
                    class="nav-icon icofont-flag"></i>@lang('Cities')</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('contacts.index') }}"><i
                    class="nav-icon icofont-envelope"></i>@lang('Contacr us')</a></li>

        <li class="nav-item"><a class="nav-link" href="{{ route('reviews.index') }}"><i
                    class="nav-icon icofont-star"></i>@lang('Reviews')</a></li>

        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#"><i
                    class="nav-icon icofont-hospital"></i> @lang('HIS')</a>
            <ul class="nav-group-items">
                <li class="nav-item"><a class="nav-link" href="{{ route('hospitals.index') }}"><i
                            class="nav-icon icofont-hospital"></i> @lang('Hospitals')</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('doctors.index') }}"><i
                            class="nav-icon icofont-doctor"></i> @lang('Doctors')</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('specialties.index') }}"><i
                            class="nav-icon icofont-medical-sign-alt"></i> @lang('Specialties')</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('offers.index') }}"><i
                            class="nav-icon icofont-ticket"></i>@lang('Offers')</a></li>

            </ul>
        </li>

        <li class="nav-item"><a class="nav-link" href="{{ route('orders.index') }}"><i
                    class="nav-icon icofont-tags"></i>@lang('Orders')</a></li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#"><i class="nav-icon icofont-gear"></i>
                @lang('System')</a>
            <ul class="nav-group-items">
                <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}"><i
                            class="nav-icon icofont-user"></i> @lang('Users')</a></li>
                {{-- <li class="nav-item"><a class="nav-link" href="{{ route('settings.index') }}"><i class="nav-icon icofont-gears"></i>@lang('Settings')</a></li> --}}
            </ul>
        </li>
    </ul>
    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
</div>
