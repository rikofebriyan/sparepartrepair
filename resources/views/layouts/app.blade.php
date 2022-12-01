<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <!-- Styles -->
    {{-- <link rel="stylesheet" href="assets/css/main/app.css">
    <link rel="stylesheet" href="assets/css/main/app-dark.css">
    <link rel="stylesheet" href="assets/css/shared/iconly.css"> --}}
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/main/app.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/main/app-dark.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/shared/iconly.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('datatables/datatables.min.css') }}">
    {{-- <link type="text/css" rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/pages/simple-datatables.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/extensions/choices.js/public/assets/styles/choices.css') }}">




</head>
<script src="{{ asset('assets/js/initTheme.js') }}"></script>

<body id="app">

    <div id="main" class="layout-horizontal">
        <header class="mb-4">
            <div class="header-top">
                <div class="container">
                    <div class="card my-0">
                        <a href="/home"><img width="120" height="30"
                                src="{{ asset('assets/images/logo/logo.png') }}" alt="Logo"></a>
                    </div>
                    <div class="header-top-right">

                        <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20"
                                height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                                <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path
                                        d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                                        opacity=".3"></path>
                                    <g transform="translate(-210 -1)">
                                        <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                        <circle cx="220.5" cy="11.5" r="4"></circle>
                                        <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2">
                                        </path>
                                    </g>
                                </g>
                            </svg>
                            <div class="form-check form-switch fs-6">
                                <input class="form-check-input  me-0" type="checkbox" id="toggle-dark"
                                    style="cursor: pointer">
                                <label class="form-check-label"></label>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                aria-hidden="true" role="img" class="iconify iconify--mdi" width="20"
                                height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                                </path>
                            </svg>
                        </div>

                        <div class="dropdown">
                            <a href="#" id="topbarUserDropdown"
                                class="user-dropdown d-flex align-items-center dropend dropdown-toggle "
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="avatar avatar-md2">
                                    <img src="{{ asset('assets/images/faces/1.jpg') }}" alt="Avatar">
                                </div>
                                <div class="text">
                                    <h6 class="user-dropdown-name">{{ Auth::user()->name }}</h6>
                                    <p class="user-dropdown-status text-sm text-muted">{{ Auth::user()->jabatan }}</p>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="topbarUserDropdown">
                                <li><a class="dropdown-item" href="#">My Account</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{ url('/logout') }}">Logout</a></li>
                            </ul>
                        </div>

                        <!-- Burger button responsive -->
                        <a href="#" class="burger-btn d-block d-xl-none">
                            <i class="bi bi-justify fs-3"></i>
                        </a>
                    </div>
                </div>
            </div>
            <nav class="main-navbar">
                <div class="container">
                    <ul>



                        <li class="menu-item  ">
                            <a href="/home" class='menu-link'>
                                <span><i class="bi bi-grid-fill"></i> Dashboard</span>
                            </a>
                        </li>



                        <li class="menu-item  ">
                            <a href="/partrepair/request" class='menu-link'>
                                <span><i class="bi bi-stack"></i> Create Repair Ticket</span>
                            </a>
                        </li>

                        <li class="menu-item  ">
                            <a href="/partrepair/waitingtable" class='menu-link'>
                                <span><i class="bi bi-table"></i> Waiting Repair</a></span>
                        </li>

                        <li class="menu-item  ">
                            <a target="_blank" rel="noopener noreferrer" href="{{ asset('index.html') }}"
                                class='menu-link'>
                                <span><i class="bi bi-stack"></i> Lihat Template</span>
                            </a>
                        </li {{-- <li class="menu-item  has-sub">
                            <a href="#" class='menu-link'>
                                <span><i class="bi bi-table"></i> Table</span>
                            </a>
                            <div class="submenu ">
                                <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                <div class="submenu-group-wrapper">


                                    <ul class="submenu-group">

                                        <li class="submenu-item  ">
                                            <a href="/partrepair/waitingtable" class='submenu-link'>Waiting</a>


                                        </li>



                                        <li class="submenu-item  ">
                                            <a href="/partrepair/progresstable" class='submenu-link'>Progress</a>


                                        </li>



                                        <li class="submenu-item  ">
                                            <a href="/partrepair/progresspemakaian" class='submenu-link'>Progress
                                                Pemakaian</a>


                                        </li>

                                        <li class="submenu-item  ">
                                            <a href="/partrepair/progresstrial" class='submenu-link'>Progress
                                                Pemakaian</a>


                                        </li>

                                        <li class="submenu-item  ">
                                            <a href="/partrepair/finishrepair" class='submenu-link'>Finish</a>


                                        </li>

                                    </ul>


                                </div>
                            </div>
                        </li> --}} {{-- <li class="menu-item  has-sub">
                            <a href="#" class='menu-link'>
                                <span><i class="bi bi-plus-square-fill"></i> Extras</span>
                            </a>
                            <div class="submenu ">
                                <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                <div class="submenu-group-wrapper">


                                    <ul class="submenu-group">

                                        <li class="submenu-item  has-sub">
                                            <a href="#" class='submenu-link'>Widgets</a>


                                            <!-- 3 Level Submenu -->
                                            <ul class="subsubmenu">

                                                <li class="subsubmenu-item ">
                                                    <a href="ui-widgets-chatbox.html"
                                                        class="subsubmenu-link">Chatbox</a>
                                                </li>

                                                <li class="subsubmenu-item ">
                                                    <a href="ui-widgets-pricing.html"
                                                        class="subsubmenu-link">Pricing</a>
                                                </li>

                                                <li class="subsubmenu-item ">
                                                    <a href="ui-widgets-todolist.html" class="subsubmenu-link">To-do
                                                        List</a>
                                                </li>

                                            </ul>

                                        </li>



                                        <li class="submenu-item  has-sub">
                                            <a href="#" class='submenu-link'>Icons</a>


                                            <!-- 3 Level Submenu -->
                                            <ul class="subsubmenu">

                                                <li class="subsubmenu-item ">
                                                    <a href="ui-icons-bootstrap-icons.html"
                                                        class="subsubmenu-link">Bootstrap Icons </a>
                                                </li>

                                                <li class="subsubmenu-item ">
                                                    <a href="ui-icons-fontawesome.html"
                                                        class="subsubmenu-link">Fontawesome</a>
                                                </li>

                                                <li class="subsubmenu-item ">
                                                    <a href="ui-icons-dripicons.html"
                                                        class="subsubmenu-link">Dripicons</a>
                                                </li>

                                            </ul>

                                        </li>



                                        <li class="submenu-item  has-sub">
                                            <a href="#" class='submenu-link'>Charts</a>


                                            <!-- 3 Level Submenu -->
                                            <ul class="subsubmenu">

                                                <li class="subsubmenu-item ">
                                                    <a href="ui-chart-chartjs.html"
                                                        class="subsubmenu-link">ChartJS</a>
                                                </li>

                                                <li class="subsubmenu-item ">
                                                    <a href="ui-chart-apexcharts.html"
                                                        class="subsubmenu-link">Apexcharts</a>
                                                </li>

                                            </ul>

                                        </li>

                                    </ul>


                                </div>
                            </div>
                        </li> --}} {{-- <li class="menu-item  has-sub">
                            <a href="#" class='menu-link'>
                                <span><i class="bi bi-file-earmark-fill"></i> Pages</span>
                            </a>
                            <div class="submenu ">
                                <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                <div class="submenu-group-wrapper">


                                    <ul class="submenu-group">

                                        <li class="submenu-item  has-sub">
                                            <a href="#" class='submenu-link'>Authentication</a>


                                            <!-- 3 Level Submenu -->
                                            <ul class="subsubmenu">

                                                <li class="subsubmenu-item ">
                                                    <a href="auth-login.html" class="subsubmenu-link">Login</a>
                                                </li>

                                                <li class="subsubmenu-item ">
                                                    <a href="auth-register.html" class="subsubmenu-link">Register</a>
                                                </li>

                                                <li class="subsubmenu-item ">
                                                    <a href="auth-forgot-password.html" class="subsubmenu-link">Forgot
                                                        Password</a>
                                                </li>

                                            </ul>

                                        </li>



                                        <li class="submenu-item  has-sub">
                                            <a href="#" class='submenu-link'>Errors</a>


                                            <!-- 3 Level Submenu -->
                                            <ul class="subsubmenu">

                                                <li class="subsubmenu-item ">
                                                    <a href="error-403.html" class="subsubmenu-link">403</a>
                                                </li>

                                                <li class="subsubmenu-item ">
                                                    <a href="error-404.html" class="subsubmenu-link">404</a>
                                                </li>

                                                <li class="subsubmenu-item ">
                                                    <a href="error-500.html" class="subsubmenu-link">500</a>
                                                </li>

                                            </ul>

                                        </li>



                                        <li class="submenu-item  ">
                                            <a href="ui-file-uploader.html" class='submenu-link'>File Uploader</a>


                                        </li>



                                        <li class="submenu-item  has-sub">
                                            <a href="#" class='submenu-link'>Maps</a>


                                            <!-- 3 Level Submenu -->
                                            <ul class="subsubmenu">

                                                <li class="subsubmenu-item ">
                                                    <a href="ui-map-google-map.html" class="subsubmenu-link">Google
                                                        Map</a>
                                                </li>

                                                <li class="subsubmenu-item ">
                                                    <a href="ui-map-jsvectormap.html" class="subsubmenu-link">JS
                                                        Vector Map</a>
                                                </li>

                                            </ul>

                                        </li>



                                        <li class="submenu-item  ">
                                            <a href="application-email.html" class='submenu-link'>Email
                                                Application</a>


                                        </li>



                                        <li class="submenu-item  ">
                                            <a href="application-chat.html" class='submenu-link'>Chat
                                                Application</a>


                                        </li>



                                        <li class="submenu-item  ">
                                            <a href="application-gallery.html" class='submenu-link'>Photo
                                                Gallery</a>


                                        </li>



                                        <li class="submenu-item  ">
                                            <a href="application-checkout.html" class='submenu-link'>Checkout
                                                Page</a>


                                        </li>

                                    </ul>


                                </div>
                            </div>
                        </li> --}} {{-- <li class="menu-item  has-sub">
                            <a href="#" class='menu-link'>
                                <span><i class="bi bi-life-preserver"></i> Support</span>
                            </a>
                            <div class="submenu ">
                                <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                <div class="submenu-group-wrapper">


                                    <ul class="submenu-group">

                                        <li class="submenu-item  ">
                                            <a href="https://zuramai.github.io/mazer/docs"
                                                class='submenu-link'>Documentation</a>


                                        </li>



                                        <li class="submenu-item  ">
                                            <a href="https://github.com/zuramai/mazer/blob/main/CONTRIBUTING.md"
                                                class='submenu-link'>Contribute</a>


                                        </li>



                                        <li class="submenu-item  ">
                                            <a href="https://github.com/zuramai/mazer#donation"
                                                class='submenu-link'>Donate</a>


                                        </li>

                                    </ul>


                                </div>
                            </div>
                        </li> --}}
                            </ul>
                </div>
            </nav>

        </header>



        <div id="app">
            @yield('content')
        </div>

</body>

<!-- Scripts -->
{{-- <script src="assets/js/bootstrap.js"></script>
<script src="assets/js/app.js"></script> --}}

<!-- Need: Apexcharts -->
{{-- <script src="assets/extensions/apexcharts/apexcharts.min.js"></script> --}}
{{-- <script src="assets/js/pages/dashboard.js"></script> --}}
<script type="text/javascript" src="{{ asset('assets/js/bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/pages/dashboard.js') }}"></script>
<script type="text/javascript" src="{{ asset('fontawesome/js/brands.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('fontawesome/js/solid.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('fontawesome/js/fontawesome.min.js') }}"></script>
{{-- <script type="text/javascript" src="{{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}">
</script>
<script type="text/javascript" src="{{ asset('assets/js/pages/simple-datatables.js') }}"></script> --}}
<script type="text/javascript" src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('datatables/datatables.min.js') }}"></script>

{{-- <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script> --}}
<script src="{{ asset('assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
<script src="{{ asset('assets/js/pages/form-element-select.js') }}"></script>

@yield('script')

<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            order: [
                [0, 'desc']
            ],
            // scrollX: true,
        });
    });
</script>

</html>
