<header class="header header-sticky mb-4">
    <div class="container-fluid">
        <button class="header-toggler px-md-0 me-md-3" type="button"
            onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
            <i class="icofont-navigation-menu"></i>
        </button><a class="header-brand d-md-none" href="#">
            <img src="{{ asset('images/logo.png') }}" width="118" height="46" alt="Logo">

            <ul class="header-nav d-none d-md-flex">
                <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">@lang('Dashboard')</a></li>
                {{-- <li class="nav-item"><a class="nav-link" href="## route('users.index') }}">Users</a></li> --}}
            </ul>
            {{-- <ul class="header-nav ms-auto">
                <li class="nav-item ">
                    @if (session('locale') == 'ar')
                        <a class="nav-link" href="## route('en') }}"><i class="icofont-globe icofont-lg"></i>
                            En</a>
                    @else
                        <a class="nav-link" href="## route('ar') }}"><i class="icofont-globe icofont-lg"></i>
                            Ar</a>
                    @endif
                </li>
            </ul> --}}
            <ul class="header-nav ">
                <li class="nav-item"><a class="nav-link mt-1" href="{{ route('home') }}" target="_blank"
                        rel="noopener noreferrer">
                        <i class="icofont-eye icofont-lg bg-light rounded py-1 px-2"></i>
                    </a></li>

                <li class="nav-item dropdown"><a class="nav-link py-0" data-coreui-toggle="dropdown" href="#"
                        role="button" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar avatar-md"><i
                                class="icofont-business-man icofont-lg bg-light rounded p-1 mt-2  px-2"></i></div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-light pt-0">
                        <div class="dropdown-header py-2 px-5 mx-5">@lang('Welcome Back!')</div>
                        <div class="bg-white p-2">
                            @auth
                                <div class="fw-semibold dropdown-item"><i class="icofont-user"></i>{{ Auth::user()->name }}
                                </div>
                            @endauth
                            <div
                                class="fw-semibold dropdown-item"onclick=" document.getElementById('logout-form').submit();">
                                <i class="icofont-exit"></i> <a> {{ __('Logout') }} </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
    </div>
    <div class="header-divider"></div>
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-2">
                <li class="breadcrumb-item">
                    <!-- if breadcrumb is single-->
                    <span>@lang('Home page')</span>
                </li>
                @yield('breadcrumbs')
            </ol>
        </nav>
    </div>
</header>
