<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('page_title', 'Dashbord')</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('dashbord/assets/images/logos/j.jpeg') }}" />
    <link rel="stylesheet" href="{{ asset('dashbord/assets/css/styles.min.css') }}" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="{{route('dashboard.users.index')}}" class="text-nowrap logo-img">
                        {{-- <img src="{{ asset('dashbord/assets/images/logos/j.jp') }}" width="180"
                            alt="" /> --}}
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">{{ trans('validation.custom.home') }}</span>
                        </li>
                        <li class="sidebar-item">



                            <a class="sidebar-link" href="{{ route('dashboard.main') }}" aria-expanded="false">
                                {{-- <a class="sidebar-link" href="{{ url('/dashboard') }}" aria-expanded="false"> --}}

                                <span>
                                    <i class="ti ti-layout-dashboard"></i>
                                </span>
                                <span class="hide-menu">{{ trans('validation.custom.dashbord') }}</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('dashboard.users.index') }}" aria-expanded="false">

                                <span>
                                    <i class="ti ti-layout-dashboard"></i>
                                </span>
                                <span class="hide-menu">{{ trans('validation.custom.users ') }}</span>

                            </a>
                        </li>

                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">{{ Str::upper(__('validation.custom.auth')) }}</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('login') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-login"></i>
                                </span>
                                <span class="hide-menu">{{ trans('validation.custom.login') }}</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('register') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-user-plus"></i>
                                </span>
                                <span class="hide-menu">{{ trans('validation.custom.register') }}</span>
                            </a>
                        </li>
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->

        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light ">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <div class="navbar-collapse  " id="navbarNav">
                                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ti ti-list-check fs-6"></i> </a>
                                        <div class="dropdown-menu dropdown-menu-start dropdown-menu-animate-up"
                                            aria-labelledby="drop2">
                                            <div class="message-body">
                                                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                                    <a class="d-flex align-items-center gap-2 dropdown-item"
                                                        rel="alternate" hreflang="{{ $localeCode }}"
                                                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                        {{ $properties['native'] }}
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <li>
                                <h4 class="d-flex align-items-center">
                                    {{ Auth::user()->name }}
                                    <i class="ti ti-user fs-6"></i>
                                </h4>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('dashbord/assets/images/profile/user-1.jpg') }}" alt=""
                                        width="35" height="35" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                    aria-labelledby="drop2">
                                    <div class="message-body">
                                        <a href="{{ route('profile.edit') }}"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-user fs-6"></i>
                                            <p class="mb-0 fs-3">{{ trans('validation.custom.My-profile') }}</p>
                                        </a>
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-mail fs-6"></i>
                                            <p class="mb-0 fs-3">{{ trans('validation.custom.My-Account') }}</p>
                                        </a>


                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit"
                                                class="btn btn-outline-primary mx-3 mt-2 d-block">{{ trans('validation.custom.log-out') }}</button>
                                        </form>

                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!--  Header End -->
            <div class="container-fluid">
