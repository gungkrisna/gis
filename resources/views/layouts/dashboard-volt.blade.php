<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Primary Meta Tags -->
    <title>Ketewel GIS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="Volt - Free Bootstrap 5 Dashboard">
    <meta name="author" content="Themesberg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="description"
        content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
    <meta name="keywords"
        content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, themesberg, themesberg dashboard, themesberg admin dashboard" />
    <link rel="canonical" href="https://themesberg.com/product/admin-dashboard/volt-premium-bootstrap-5-dashboard">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://demo.themesberg.com/volt-pro">
    <meta property="og:title" content="Volt - Free Bootstrap 5 Dashboard">
    <meta property="og:description"
        content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
    <meta property="og:image"
        content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/volt-pro-bootstrap-5-dashboard/volt-pro-preview.jpg">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://demo.themesberg.com/volt-pro">
    <meta property="twitter:title" content="Volt - Free Bootstrap 5 Dashboard">
    <meta property="twitter:description"
        content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
    <meta property="twitter:image"
        content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/volt-pro-bootstrap-5-dashboard/volt-pro-preview.jpg">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('volt/src/assets/img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('images/sedang_1655190484_logo_desa-removebg-preview.png') }}">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('images/sedang_1655190484_logo_desa-removebg-preview.png') }}">
    <link rel="manifest" href="{{ asset('volt/src/assets/img/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('volt/src/assets/img/favicon/safari-pinned-tab.svg') }}" color="#ffffff">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    
    <!-- Sweet Alert -->
    <link type="text/css" href="{{ asset('volt/html&css/vendor/sweetalert2/dist/sweetalert2.min.css') }}"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Notyf -->
    <link type="text/css" href="{{ asset('volt/html&css/vendor/notyf/notyf.min.css') }}" rel="stylesheet">

    <!-- Volt CSS -->
    <link type="text/css" href="{{ asset('volt/html&css/css/volt.css') }}" rel="stylesheet">

    <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->
    <style>
        .d-flex {
            display: flex !important;
            align-items: center !important;
        }
        .avatar-lg {
            width: 50px;
            height: 50px;
        }
        .me-4 {
            margin-right: 1.5rem !important;
        }
        .d-block {
            display: block !important;
        }

        /* Ensure the elements are visible */
        @media (fullscreen) {
            .d-md-none {
                display: block !important;
            }
        }
    </style>
    @yield('css')
</head>

<body>
    <nav class="navbar navbar-light navbar-theme-primary px-4 col-12 d-lg-none bg-white">
        <a class="navbar-brand me-lg-5" href="../../home">
            <img class="navbar-brand-dark" src="{{ asset('images/100x100-removebg-preview__sid__xZB0XmO.png') }}"
                alt="Volt logo" /> <img class="navbar-brand-light"
                src="{{ asset('images/100x100-removebg-preview__sid__xZB0XmO.png') }}" alt="Volt logo" />
                <span class="mt-1 ms-1 sidebar-text">Web GIS Ketewel</span>
        </a>
        <div class="d-flex align-items-center">
            <button class="navbar-toggler d-lg-none collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse bg-white" data-simplebar>
        <div class="sidebar-inner px-4 pt-3">
            <div
                class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
                <div class="d-flex align-items-center">
                <div class="avatar-lg me-4">
                    <img src="{{ asset('images/sedang_1675082015_GDS_7722.jpg') }}" 
                        class="img-fluid rounded-circle border-white" 
                        alt="{{ auth()->user()->name }}"
                        style="width: 10vw; height: 6vw; max-width: 60px;  max-height: 50px;">
                </div>
                    <div class="d-block">
                        <h2 class="h5 mb-3">Admin Desa - {{ auth()->user()->name }}</h2>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="btn btn-secondary btn-sm d-inline-flex align-items-center">
                            <svg class="icon icon-xxs me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                </path>
                            </svg>
                            Sign Out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>

                <div class="collapse-close d-md-none">
                    <a href="#sidebarMenu" data-bs-toggle="collapse" data-bs-target="#sidebarMenu"
                        aria-controls="sidebarMenu" aria-expanded="true" aria-label="Toggle navigation">
                        <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!--SIDEBAR NAV-->
            <ul class="nav flex-column pt-3 pt-md-0">

                <!--SIDEBAR MENU-->
                    <ul class="flex-column nav">
                    <li class="nav-item {{ Request::is('home') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('home') }}">
                            <span class="sidebar-icon">
                                 <i class="fas fa-home"></i>
                            </span>
                            <span class="sidebar-text">Dashboard</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="flex-column nav">
                        <li class="nav-item {{ Request::route()->getName() == 'home.spots' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('home.spots') }}">
                            <span class="sidebar-icon">
                                        <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                <span class="sidebar-text">
                                    View Map Desa
                                </span>
                            </a>
                        </li>
                    </ul>
                    <!-- <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse" data-bs-target="#submenu-app">
                        <span>
                            <span class="sidebar-icon">
                                <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            <span class="sidebar-text">GIS Basic</span>
                        </span>
                        <span class="link-arrow">
                            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </span>
                    </span> -->
                    <!-- <div class="multi-level collapse " role="list" id="submenu-app" aria-expanded="false">
                        <ul class="flex-column nav">
                            <li class="nav-item {{ Request::is('home') ? 'active' : '' }}">
                                <a href="{{ route('home') }}" class="nav-link">
                                    <span class="sidebar-icon">
                                        <i class="fas fa-home"></i>
                                    </span>
                                    <span class="sidebar-text">Dashboard</span>
                                </a>
                            </li>

                            <li class="nav-item {{ Request::is('simple-map') ? 'active' : '' }}">
                                <a href="{{ route('simple-map') }}" class="nav-link ">
                                    <span class="sidebar-icon ">
                                        <i class="fas fa-map"></i>
                                    </span>
                                    <span class="sidebar-text">Simple Map</span>
                                </a>
                            </li>

                            <li class="nav-item 
                            {{ Request::is('markers') ? 'active' : '' }}
                            ">
                                <a href="{{ route('markers') }}" class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fas fa-map-marker"></i>
                                    </span>
                                    <span class="sidebar-text">Markers</span>
                                </a>
                            </li>

                            <li class="nav-item 
                            {{ Request::is('circle') ? 'active' : '' }}
                            ">
                                <a href="{{ route('circle') }}" class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fas fa-circle"></i>
                                    </span>
                                    <span class="sidebar-text">Circle</span>
                                </a>
                            </li>
            
                            <li class="nav-item 
                            {{ Request::is('polygon') ? 'active' : '' }}
                            ">
                                <a href="{{ route('polygon') }}" class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fas fa-draw-polygon"></i>
                                    </span>
                                    <span class="sidebar-text">Polygon</span>
                                </a>
                            </li>
            
                            <li class="nav-item 
                            {{ Request::is('polyline') ? 'active' : '' }}
                            ">
                                <a href="{{ route('polyline') }}" class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fas fa-draw-polygon"></i>
                                    </span>
                                    <span class="sidebar-text">Polyline</span>
                                </a>
                            </li>
            
                            <li class="nav-item 
                            {{ Request::is('rectangle') ? 'active' : '' }}
                            ">
                                <a href="{{ route('rectangle') }}" class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fas fa-draw-polygon"></i>
                                    </span>
                                    <span class="sidebar-text">Rectangle</span>
                                </a>
                            </li>
            
                            <li class="nav-item 
                            {{ Request::is('layer') ? 'active' : '' }}
                            ">
                                <a href="{{ route('layer') }}" class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fas fa-draw-polygon"></i>
                                    </span>
                                    <span class="sidebar-text">Layer Control</span>
                                </a>
                            </li>
            
                            <li
                                class="nav-item 
                            {{ Request::is('layer-group') ? 'active' : '' }}
                            ">
                                <a href="{{ route('layer-group') }}" class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fas fa-draw-polygon"></i>
                                    </span>
                                    <span class="sidebar-text">Layer Group</span>
                                </a>
                            </li>
            
                            <li class="nav-item 
                            {{ Request::is('geojson') ? 'active' : '' }}
                            ">
                                <a href="{{ route('geojson') }}" class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fas fa-draw-polygon"></i>
                                    </span>
                                    <span class="sidebar-text">Geojson</span>
                                </a>
                            </li>
            
                            <li
                                class="nav-item 
                            {{ Request::is('getCoordinate') ? 'active' : '' }}
                            ">
                                <a href="{{ route('getCoordinate') }}" class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fas fa-draw-polygon"></i>
                                    </span>
                                    <span class="sidebar-text">Get Coordinate</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> -->
                





                <li class="nav-item">
                    <span
                      class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                      data-bs-toggle="collapse" data-bs-target="#submenu-components">
                      <span>
                        <span class="sidebar-icon">
                          <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z"></path><path fill-rule="evenodd" d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                        </span> 
                        <span class="sidebar-text">Manage Data</span>
                      </span>
                      <span class="link-arrow">
                        <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                      </span>
                    </span>
                    <div class="multi-level collapse " role="list"
                      id="submenu-components" aria-expanded="false">
                      <ul class="flex-column nav">
                        <li class="nav-item {{ Request::route()->getName() == 'centre-point.index' ? 'active' : '' }}">
                          <a class="nav-link"
                            href="{{ route('centre-point.index') }}">
                            <span class="sidebar-text">Koordinat Banjar</span>
                          </a>
                        </li>
                        <li class="nav-item {{ Request::route()->getName() == 'spot.index' ? 'active' : '' }}">
                          <a class="nav-link" href="{{route('spot.index')}}">
                            <span class="sidebar-text">Koordinat Penduduk</span>
                          </a>
                          <ul class="flex-column nav">
                            <!-- <li class="nav-item {{ Request::route()->getName() == 'spot.show_map' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('spot.show_map') }}">
                                    <span class="sidebar-text">View Spot Map</span>
                                </a>
                            </li> -->
                        </ul>
                        </li>
                      </ul>
                    </div>
                  </li>
                <!--SIDEBAR MENU-->

                <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>
            </ul>
            <!--HEADER NAV-->

        </div>
    </nav>

    <main class="content">

        <!--HEADER NAV-->
        <nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
            <div class="container-fluid px-0">
                <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
                    <div class="d-flex align-items-center">
                        <!-- Search form -->
                        <div class="input-group input-group-merge search-bar">
                            <span class="input-group-text" id="topbar-addon">
                                <!-- Ganti ikon di bawah ini dengan ikon lambang peta atau dunia -->
                                <svg class="icon icon-lg" x-description="Heroicon name: solid/globe"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M10 18c-2.22 0-4-1.78-4-4s1.78-8 4-8 4 5.78 4 8-1.78 4-4 4zM5.464 9.121a6.98 6.98 0 00-1.497 1.383 8.047 8.047 0 00-1.58 2.172A8 8 0 0012 14.536a8.053 8.053 0 002.824-.512 8.044 8.044 0 00-.488-.8 6.974 6.974 0 00-2.293-2.065 7.014 7.014 0 00-2.554-1.217c-.3-.045-.608-.078-.911-.092a7.003 7.003 0 00-2.04.307zm9.43 1.214a7.004 7.004 0 00-2.051-.33 7.058 7.058 0 00-2.228.328c-.296.072-.592.162-.883.27a8.052 8.052 0 002.51 2.273c.353.23.722.433 1.103.61a8.032 8.032 0 001.007.25 8.031 8.031 0 001.115.098 8.021 8.021 0 002.392-.324 7.057 7.057 0 00-.87-1.364 7.011 7.011 0 00-1.915-1.81zM8.379 16.11c.25.044.502.075.757.094.295.025.59.039.885.039.29 0 .578-.014.863-.034.248-.017.494-.045.74-.093a8.041 8.041 0 002.88-1.022 7.03 7.03 0 01-2.308-2.087 8.043 8.043 0 01-1.22-2.92c-.045-.31-.078-.62-.094-.935-.017-.356-.025-.713-.025-1.068 0-.354.008-.712.025-1.068.017-.315.05-.625.094-.935a8.041 8.041 0 011.22-2.92 7.03 7.03 0 012.308-2.087 8.048 8.048 0 00-2.88-1.022c-.246-.048-.492-.076-.74-.093-.285-.02-.573-.034-.863-.034-.295 0-.59.014-.885.039-.255.019-.507.05-.757.094a7.03 7.03 0 00-2.308 2.087 8.048 8.048 0 01-1.22 2.92c-.045.31-.078.62-.094.935-.017.356-.025.713-.025 1.068 0 .354.008.712.025 1.068.017.315.05.625.094.935a8.043 8.043 0 011.22 2.92 7.03 7.03 0 012.308 2.087c.246.342.49.688.732 1.039z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                        </div>
                        <!-- / Search form -->
                    </div>
                    <!-- Navbar links -->
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item dropdown">
                            <a class="nav-link text-dark notification-bell unread dropdown-toggle"
                                data-unread-notifications="true" href="#" role="button"
                                data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                <svg class="icon icon-sm text-gray-900" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z">
                                    </path>
                                </svg>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-center mt-2 py-0">
                                <div class="list-group list-group-flush">
                                    <a href="https://ketewel.desa.id/artikel/kategori/berita-desa"
                                        class="text-center text-primary fw-bold border-bottom border-light py-3">Notifications</a>

                                    <a href="https://ketewel.desa.id/artikel/kategori/berita-desa" class="dropdown-item text-center fw-bold rounded-bottom py-3">
                                        <svg class="icon icon-xxs text-gray-400 me-1" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                            <path fill-rule="evenodd"
                                                d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        View all
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown ms-lg-3">
                            <a class="nav-link dropdown-toggle pt-1 px-0" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="media d-flex align-items-center">
                                    <img class="avatar rounded-circle" alt="Image placeholder"
                                        src="{{ asset('images/sedang_1675082015_GDS_7722.jpg') }}">
                                    <div class="media-body ms-2 text-dark align-items-center d-none d-lg-block">
                                    <h4 class="h6 mb-0 text-small">{{ auth()->user()->name }}</h4>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu dashboard-dropdown dropdown-menu-end mt-2 py-1">
                                <div role="separator" class="dropdown-divider my-1"></div>
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">

                                    <svg class="dropdown-icon text-danger me-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                        </path>
                                    </svg>
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!--HEADER NAV-->

        <!--DROPDOWN MENU-->
        <div class="py-4">
            <a href="{{ route('home') }}" class="btn btn-gray-800 d-inline-flex align-items-center me-2" aria-label="Back to Dashboard">
                <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 19l-7-7 7-7"></path>
                </svg>
                Dashboard
            </a>
        </div>
        <!--DROPDOWN MENU-->

        <!--DISPLAY CONTENT-->
        <div class="row">

            @yield('content')
        </div>
        <!--DISPLAY CONTENT-->

        <footer class="footer">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-md-6 text-center text-md-start mb-4 mb-md-0">
                        <p class="mb-0">
                            © 2024-<span class="current-year"></span> 
                            <a class="text-primary fw-normal" href="https://ketewel.desa.id/" target="_blank">
                                Ketewel Village
                            </a>
                        </p>
                    </div>
                    <div class="col-12 col-md-6 text-center text-md-end">
                        <p class="mb-0">
                            <img src="images/logo-circle.png" alt="Logo" class="logo">
                            <a class="text-primary fw-normal" href="https://primakara.ac.id/" target="_blank">
                                Primakara University
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row align-items-center">
                    <!-- Bagian kiri -->
                    <div class="col-lg-6 col-md-6 text-center text-md-start mb-4 mb-md-0">
                        <div class="social-links">
                            <a href="https://web.facebook.com/kantor.perbekelketewel.3" class="btn btn-icon-only btn-pill btn-outline-gray-500 me-2"
                                aria-label="facebook button" title="facebook button">
                                <svg class="icon icon-xxs" aria-hidden="true" focusable="false" data-prefix="fab"
                                    data-icon="facebook-f" role="img" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 320 512">
                                    <path fill="currentColor"
                                        d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z">
                                    </path>
                                </svg>
                            </a>
                            <a href="https://www.instagram.com/desaketewel/" class="btn btn-icon-only btn-pill btn-outline-gray-500 me-2"
                                aria-label="instagram button" title="instagram button">
                                <svg class="icon icon-xxs" aria-hidden="true" focusable="false" data-prefix="fab"
                                    data-icon="instagram" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path fill="currentColor" 
                                        d="M224.1 141c-63.6 0-115.1 51.5-115.1 115.1s51.5 115.1 115.1 115.1 115.1-51.5 115.1-115.1S287.6 141 224.1 141zm0 190.7c-41.9 0-75.6-33.7-75.6-75.6s33.7-75.6 75.6-75.6 75.6 33.7 75.6 75.6-33.7 75.6-75.6 75.6zm146.4-194.3c0 14.9-12 27-27 27-14.9 0-27-12-27-27s12-27 27-27 27 12 27 27zm76.1 27.2c-.4-8.2-1.9-16.2-4.1-23.9-3.9-14.2-12.1-27-23.2-37.5-11.6-11.2-25.3-19.5-39.9-24.4-7.8-2.7-15.8-4.4-23.9-4.8-8.2-.4-16.5-.4-24.7-.4h-100.7c-8.2 0-16.5 0-24.7.4-8.1.4-16.1 2.1-23.9 4.8-14.6 4.9-28.3 13.2-39.9 24.4-11.2 10.5-19.4 23.3-23.2 37.5-2.2 7.7-3.7 15.7-4.1 23.9-.4 8.2-.4 16.5-.4 24.7v100.7c0 8.2 0 16.5.4 24.7.4 8.2 1.9 16.2 4.1 23.9 3.9 14.2 12.1 27 23.2 37.5 11.6 11.2 25.3 19.5 39.9 24.4 7.8 2.7 15.8 4.4 23.9 4.8 8.2.4 16.5.4 24.7.4h100.7c8.2 0 16.5 0 24.7-.4 8.1-.4 16.1-2.1 23.9-4.8 14.6-4.9 28.3-13.2 39.9-24.4 11.2-10.5 19.4-23.3 23.2-37.5 2.2-7.7 3.7-15.7 4.1-23.9.4-8.2.4-16.5.4-24.7V192.6c0-8.2 0-16.5-.4-24.7zM398.8 392.8c-.3 6.8-1.5 13.5-3.5 20-3.2 10.7-9.7 20.3-18.9 27.6-9.7 7.9-21.5 13.1-33.7 15.7-7 1.3-14.1 1.9-21.2 2.2-8.2.3-16.4.3-24.7.3H160.1c-8.2 0-16.5 0-24.7-.3-7-.3-14.1-.9-21.2-2.2-12.2-2.6-24-7.8-33.7-15.7-9.2-7.3-15.7-16.9-18.9-27.6-2-6.5-3.2-13.2-3.5-20-.3-8.2-.3-16.5-.3-24.7V192.6c0-8.2 0-16.5.3-24.7.3-6.8 1.5-13.5 3.5-20 3.2-10.7 9.7-20.3 18.9-27.6 9.7-7.9 21.5-13.1 33.7-15.7 7-1.3 14.1-1.9 21.2-2.2 8.2-.3 16.4-.3 24.7-.3h100.7c8.2 0 16.5 0 24.7.3 7 .3 14.1.9 21.2 2.2 12.2 2.6 24 7.8 33.7 15.7 9.2 7.3 15.7 16.9 18.9 27.6 2 6.5 3.2 13.2 3.5 20 .3 8.2.3 16.5.3 24.7v100.7c0 8.2 0 16.5-.3 24.7z">
                                    </path>
                                </svg>
                            </a>
                            <a href="https://ketewel.desa.id/" class="btn btn-icon-only btn-pill btn-outline-gray-500 me-2"
                                aria-label="website button" title="website button">
                                <svg class="icon icon-xxs" aria-hidden="true" focusable="false" data-prefix="fas"
                                    data-icon="globe" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
                                    <path fill="currentColor" 
                                        d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm222.2 172H380.4c-2.5-16.2-6-32-10.3-47.4 44.7 18.5 82.2 52.5 100.1 94.4zm-103.1 0H128.9c-2.4-15.2-4-31.1-4.8-47.4h248.1c-.8 16.3-2.4 32.2-4.7 47.4zM248 34c22.4 0 49.4 40.1 61.9 110.1H186.1C198.6 74.1 225.6 34 248 34zM114.9 50.6C95.4 92.5 83.4 138.5 78.3 186H30.2C45.8 115.5 75.6 61.2 114.9 50.6zM16.9 218h48.9c1.1 16.3 2.8 32.3 5 47.4H20.3c-.9-7.8-1.3-15.8-1.3-23.8 0-8.6.5-17 1.3-25.6zM30.2 326h48.1c5.1 47.5 17.1 93.5 36.6 135.4C75.6 450.8 45.8 396.5 30.2 326zm84.7 47.4h248.1c.8 16.3 2.4 32.2 4.7 47.4H128.9c2.4 15.2 4 31.1 4.8 47.4zm57.6 104c-1.5-7.1-2.8-14.2-3.9-21.4h161.1c-1.1 7.2-2.4 14.3-3.9 21.4-10.6 50.7-30 91.8-43.8 91.8s-33.2-41.1-43.8-91.8zM380.4 362h48.1c-15.6 70.5-45.4 124.8-84.7 135.4 19.5-41.9 31.5-87.9 36.6-135.4zM20.3 294.4h48.6c-2.2 15.1-3.9 31.1-5 47.4H16.9c-.8-8.6-1.3-17-1.3-25.6 0-8 0.4-16 1.3-23.8zm312.1 89.9H186.1C198.6 437.9 225.6 478 248 478c22.4 0 49.4-40.1 61.9-93.7zm33.7-186.3H128.9c2.5 16.2 6 32 10.3 47.4h216.4c4.3-15.4 7.8-31.2 10.3-47.4zm35.1 186.3c19.5-41.9 31.5-87.9 36.6-135.4h48.1c-15.6 70.5-45.4 124.8-84.7 135.4z">
                                    </path>
                                </svg>
                            </a>
                            <a href="https://www.youtube.com/channel/UCKRZ-4Am8-SSeq4-C9Z0cOw" class="btn btn-icon-only btn-pill btn-outline-gray-500"
                                aria-label="youtube button" title="youtube button">
                                <svg class="icon icon-xxs" aria-hidden="true" focusable="false" data-prefix="fab"
                                    data-icon="youtube" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                    <path fill="currentColor"
                                        d="M549.655 124.083C545.562 108.267 534.28 95.658 519.467 91.57 480.385 79.252 288 79.252 288 79.252s-192.385 0-231.467 12.318c-14.813 4.088-26.095 16.697-30.188 32.513-13.323 50.84-19.347 102.516-19.347 154.918s6.025 104.078 19.347 154.918c4.093 15.816 15.375 28.425 30.188 32.513 39.082 12.318 231.467 12.318 231.467 12.318s192.385 0 231.467-12.318c14.813-4.088 26.095-16.697 30.188-32.513 13.323-50.84 19.347-102.516 19.347-154.918s-6.025-104.078-19.347-154.918zM232 342.857V169.143l142.857 86.857L232 342.857z">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <!-- Bagian kanan -->
                    <div class="col-lg-6 col-md-6 text-center text-md-end ml-auto">
                        <div class="social-links">
                            <a href="https://www.facebook.com/primakara/" class="btn btn-icon-only btn-pill btn-outline-gray-500 me-2"
                                aria-label="facebook button" title="facebook button">
                                <svg class="icon icon-xxs" aria-hidden="true" focusable="false" data-prefix="fab"
                                    data-icon="facebook-f" role="img" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 320 512">
                                    <path fill="currentColor"
                                        d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z">
                                    </path>
                                </svg>
                            </a>
                            <a href="https://www.instagram.com/primakara.univ/" class="btn btn-icon-only btn-pill btn-outline-gray-500 me-2"
                                aria-label="instagram button" title="instagram button">
                                <svg class="icon icon-xxs" aria-hidden="true" focusable="false" data-prefix="fab"
                                    data-icon="instagram" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path fill="currentColor" 
                                        d="M224.1 141c-63.6 0-115.1 51.5-115.1 115.1s51.5 115.1 115.1 115.1 115.1-51.5 115.1-115.1S287.6 141 224.1 141zm0 190.7c-41.9 0-75.6-33.7-75.6-75.6s33.7-75.6 75.6-75.6 75.6 33.7 75.6 75.6-33.7 75.6-75.6 75.6zm146.4-194.3c0 14.9-12 27-27 27-14.9 0-27-12-27-27s12-27 27-27 27 12 27 27zm76.1 27.2c-.4-8.2-1.9-16.2-4.1-23.9-3.9-14.2-12.1-27-23.2-37.5-11.6-11.2-25.3-19.5-39.9-24.4-7.8-2.7-15.8-4.4-23.9-4.8-8.2-.4-16.5-.4-24.7-.4h-100.7c-8.2 0-16.5 0-24.7.4-8.1.4-16.1 2.1-23.9 4.8-14.6 4.9-28.3 13.2-39.9 24.4-11.2 10.5-19.4 23.3-23.2 37.5-2.2 7.7-3.7 15.7-4.1 23.9-.4 8.2-.4 16.5-.4 24.7v100.7c0 8.2 0 16.5.4 24.7.4 8.2 1.9 16.2 4.1 23.9 3.9 14.2 12.1 27 23.2 37.5 11.6 11.2 25.3 19.5 39.9 24.4 7.8 2.7 15.8 4.4 23.9 4.8 8.2.4 16.5.4 24.7.4h100.7c8.2 0 16.5 0 24.7-.4 8.1-.4 16.1-2.1 23.9-4.8 14.6-4.9 28.3-13.2 39.9-24.4 11.2-10.5 19.4-23.3 23.2-37.5 2.2-7.7 3.7-15.7 4.1-23.9.4-8.2.4-16.5.4-24.7V192.6c0-8.2 0-16.5-.4-24.7zM398.8 392.8c-.3 6.8-1.5 13.5-3.5 20-3.2 10.7-9.7 20.3-18.9 27.6-9.7 7.9-21.5 13.1-33.7 15.7-7 1.3-14.1 1.9-21.2 2.2-8.2.3-16.4.3-24.7.3H160.1c-8.2 0-16.5 0-24.7-.3-7-.3-14.1-.9-21.2-2.2-12.2-2.6-24-7.8-33.7-15.7-9.2-7.3-15.7-16.9-18.9-27.6-2-6.5-3.2-13.2-3.5-20-.3-8.2-.3-16.5-.3-24.7V192.6c0-8.2 0-16.5.3-24.7.3-6.8 1.5-13.5 3.5-20 3.2-10.7 9.7-20.3 18.9-27.6 9.7-7.9 21.5-13.1 33.7-15.7 7-1.3 14.1-1.9 21.2-2.2 8.2-.3 16.4-.3 24.7-.3h100.7c8.2 0 16.5 0 24.7.3 7 .3 14.1.9 21.2 2.2 12.2 2.6 24 7.8 33.7 15.7 9.2 7.3 15.7 16.9 18.9 27.6 2 6.5 3.2 13.2 3.5 20 .3 8.2.3 16.5.3 24.7v100.7c0 8.2 0 16.5-.3 24.7z">
                                    </path>
                                </svg>
                            </a>
                            <a href="https://primakara.ac.id/" class="btn btn-icon-only btn-pill btn-outline-gray-500 me-2"
                                aria-label="website button" title="website button">
                                <svg class="icon icon-xxs" aria-hidden="true" focusable="false" data-prefix="fas"
                                    data-icon="globe" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
                                    <path fill="currentColor" 
                                        d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm222.2 172H380.4c-2.5-16.2-6-32-10.3-47.4 44.7 18.5 82.2 52.5 100.1 94.4zm-103.1 0H128.9c-2.4-15.2-4-31.1-4.8-47.4h248.1c-.8 16.3-2.4 32.2-4.7 47.4zM248 34c22.4 0 49.4 40.1 61.9 110.1H186.1C198.6 74.1 225.6 34 248 34zM114.9 50.6C95.4 92.5 83.4 138.5 78.3 186H30.2C45.8 115.5 75.6 61.2 114.9 50.6zM16.9 218h48.9c1.1 16.3 2.8 32.3 5 47.4H20.3c-.9-7.8-1.3-15.8-1.3-23.8 0-8.6.5-17 1.3-25.6zM30.2 326h48.1c5.1 47.5 17.1 93.5 36.6 135.4C75.6 450.8 45.8 396.5 30.2 326zm84.7 47.4h248.1c.8 16.3 2.4 32.2 4.7 47.4H128.9c2.4 15.2 4 31.1 4.8 47.4zm57.6 104c-1.5-7.1-2.8-14.2-3.9-21.4h161.1c-1.1 7.2-2.4 14.3-3.9 21.4-10.6 50.7-30 91.8-43.8 91.8s-33.2-41.1-43.8-91.8zM380.4 362h48.1c-15.6 70.5-45.4 124.8-84.7 135.4 19.5-41.9 31.5-87.9 36.6-135.4zM20.3 294.4h48.6c-2.2 15.1-3.9 31.1-5 47.4H16.9c-.8-8.6-1.3-17-1.3-25.6 0-8 0.4-16 1.3-23.8zm312.1 89.9H186.1C198.6 437.9 225.6 478 248 478c22.4 0 49.4-40.1 61.9-93.7zm33.7-186.3H128.9c2.5 16.2 6 32 10.3 47.4h216.4c4.3-15.4 7.8-31.2 10.3-47.4zm35.1 186.3c19.5-41.9 31.5-87.9 36.6-135.4h48.1c-15.6 70.5-45.4 124.8-84.7 135.4z">
                                    </path>
                                </svg>
                            </a>
                            <a href="https://www.youtube.com/@PrimakaraTV/videos" class="btn btn-icon-only btn-pill btn-outline-gray-500"
                                aria-label="youtube button" title="youtube button">
                                <svg class="icon icon-xxs" aria-hidden="true" focusable="false" data-prefix="fab"
                                    data-icon="youtube" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                    <path fill="currentColor"
                                        d="M549.655 124.083C545.562 108.267 534.28 95.658 519.467 91.57 480.385 79.252 288 79.252 288 79.252s-192.385 0-231.467 12.318c-14.813 4.088-26.095 16.697-30.188 32.513-13.323 50.84-19.347 102.516-19.347 154.918s6.025 104.078 19.347 154.918c4.093 15.816 15.375 28.425 30.188 32.513 39.082 12.318 231.467 12.318 231.467 12.318s192.385 0 231.467-12.318c14.813-4.088 26.095-16.697 30.188-32.513 13.323-50.84 19.347-102.516 19.347-154.918s-6.025-104.078-19.347-154.918zM232 342.857V169.143l142.857 86.857L232 342.857z">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    </footer>

    </main>

    <!-- Core -->
    <script src="{{ asset('volt/html&css/vendor/@popperjs/core/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('volt/html&css/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- Vendor JS -->
    <script src="{{ asset('volt/html&css/vendor/onscreen/dist/on-screen.umd.min.js') }}"></script>

    <!-- Slider -->
    <script src="{{ asset('volt/html&css/vendor/nouislider/dist/nouislider.min.js') }}"></script>

    <!-- Smooth scroll -->
    <script src="{{ asset('volt/html&css/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js') }}"></script>

    <!-- Charts -->


    <!-- Datepicker -->
    <script src="{{ asset('volt/html&css/vendor/vanillajs-datepicker/dist/js/datepicker.min.js') }}"></script>

    <!-- Sweet Alerts 2 -->
    <script src="{{ asset('volt/html&css/vendor/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>

    <!-- Moment JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>

    <!-- Vanilla JS Datepicker -->
    <script src="{{ asset('volt/html&css/vendor/vanillajs-datepicker/dist/js/datepicker.min.js') }}"></script>

    <!-- Notyf -->
    <script src="{{ asset('volt/html&css/vendor/notyf/notyf.min.js') }}"></script>

    <!-- Simplebar -->
    <script src="{{ asset('volt/html&css/vendor/simplebar/dist/simplebar.min.js') }}"></script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Pastikan Anda memasukkan link Bootstrap Icons CSS di bagian head -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/fontawesome.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500,0).slideUp(500,function(){
                $(this).remove()
            })
        }, 3000);
    </script>
    @stack('javascript')
    <!-- Volt JS -->
    {{-- <script src="{{ asset('volt/hmtl&css/assets/js/volt.js') }}"></script> --}}

    		<!-- Vector Maps -->
		<script src="assets/vendor/jvectormap/jquery-jvectormap-2.0.5.min.js"></script>
		<script src="assets/vendor/jvectormap/world-mill-en.js"></script>
		<script src="assets/vendor/jvectormap/gdp-data.js"></script>
		<script src="assets/vendor/jvectormap/custom/world-map-markers2.js"></script>

     <script>
        // Set the current year dynamically
        document.addEventListener('DOMContentLoaded', function() {
            const currentYearElements = document.querySelectorAll('.current-year');
            const currentYear = new Date().getFullYear();
            currentYearElements.forEach(element => {
                element.textContent = currentYear;
            });
        });
    </script>

</body>

</html>
