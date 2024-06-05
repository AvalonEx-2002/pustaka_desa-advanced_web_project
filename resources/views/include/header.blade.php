<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a class="navbar-brand" href="{{ route('user.index') }}" style="font-weight: bold;">
            <img src="{{ asset('pustakadesa_icon.png') }}" alt="Web App Logo" style="height: 50px; width: 50px; margin-right: 10px; border-radius: 8px; border: 3px solid grey;">
            {{ config('app.name', 'Laravel') }}
        </a>
    </div>
    <!-- End Logo -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item dropdown pe-3">

                <div class="nav-link nav-profile d-flex align-items-center pe-0" data-bs-toggle="dropdown">
                    <img src="assets/img/profile_picture_icon.png" alt=" " class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
                </div>
                <!-- End Profile Image Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>{{ Auth::user()->name }}</h6>
                        <span>{{ Auth::user()->userCategory }}</span>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center justify-content-center" href="{{ route('logout') }}" onclick="event.preventDefault(); getElementById('logout-form').submit();">
                            <img src="{{ asset('logout_icon.png') }}" alt="Log Out Icon" style="margin-right: 10px; height: 20px;">
                            <span style="font-weight: 500; color: red;">{{ __('Log Out') }}</span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>

                </ul><!-- End Profile Dropdown Items -->
                
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->