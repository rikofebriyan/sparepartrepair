<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Spare Part Repair System</title>
    <!-- Styles -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/main/app.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/main/app-dark.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/shared/iconly.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/extensions/toastify-js/src/toastify.css') }}">

    {{-- choices --}}
    <link rel="stylesheet" href="{{ asset('assets/extensions/choices.js/public/assets/styles/choices.min.css') }}">

    @yield('css')

</head>
<script src="{{ asset('assets/js/initTheme.js') }}"></script>

<body id="app">

    <div id="main" class="layout-horizontal">
        <header class="mb-2">
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
                        <a class="nav-link active dropdown-toggle text-gray-600" href="#"
                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
                            aria-controls="offcanvasExample">
                            <i class='bi bi-bell bi-sub fs-4'></i>
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

                        <li class="menu-item  has-sub">
                            <a href="#" class='menu-link'>
                                <span><i class="bi bi-table"></i>Ticket Repair Table</span>
                            </a>
                            <div class="submenu ">
                                <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                <div class="submenu-group-wrapper">


                                    <ul class="submenu-group">

                                        <li class="submenu-item  ">
                                            <a href="{{ asset('partrepair/waitingtable') }}"
                                                class='submenu-link'>Waiting Table</a>


                                        </li>
                                        <li class="submenu-item  ">
                                            <a href="{{ asset('partrepair/finishtable') }}"
                                                class='submenu-link'>Finish Table</a>


                                        </li>
                                        <li class="submenu-item  ">
                                            <a href="{{ asset('partrepair/stockout') }}"
                                                class='submenu-link'>Stockout Table</a>


                                        </li>
                                        <li class="submenu-item  ">
                                            <a href="{{ asset('partrepair/deletedtable') }}"
                                                class='submenu-link'>Deleted Table</a>


                                        </li>
                                    </ul>


                                </div>
                            </div>
                        </li>




                        <li class="menu-item  ">
                            <a href="{{ asset('partrepair/ganttchart') }}" class='menu-link'>
                                <span><i class="bi bi-stack"></i> Schedule Chart</span>
                            </a>
                        </li>

                        <li class="menu-item  has-sub">
                            <a href="#" class='menu-link'>
                                <span><i class="bi bi-table"></i> Master Data</span>
                            </a>
                            <div class="submenu ">
                                <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                <div class="submenu-group-wrapper">


                                    <ul class="submenu-group">

                                        @can('admin')
                                            <li class="submenu-item  ">
                                                <a href="{{ asset('matrix/user') }}" class='submenu-link'>User</a>


                                            </li>
                                        @endcan

                                        <li class="submenu-item  ">
                                            <a href="{{ asset('matrix/section') }}" class='submenu-link'>Section</a>


                                        </li>



                                        <li class="submenu-item  ">
                                            <a href="{{ asset('matrix/line') }}" class='submenu-link'>Line</a>


                                        </li>



                                        <li class="submenu-item  ">
                                            <a href="{{ asset('matrix/machine') }}" class='submenu-link'>Machine</a>


                                        </li>

                                        <li class="submenu-item  ">
                                            <a href="{{ asset('matrix/master_spare_part') }}"
                                                class='submenu-link'>Master Spare Part</a>


                                        </li>

                                        <li class="submenu-item  ">
                                            <a href="{{ asset('matrix/standard_pengecekan') }}"
                                                class='submenu-link'>Standard Pengecekan</a>
                                        </li>

                                        <li class="submenu-item  ">
                                            <a href="{{ asset('matrix/repair_kit') }}" class='submenu-link'>Repair
                                                Kit</a>
                                        </li>

                                        <li class="submenu-item  ">
                                            <a href="{{ asset('matrix/item_standard') }}" class='submenu-link'>Item
                                                Standard</a>
                                        </li>

                                        <li class="submenu-item  ">
                                            <a href="{{ asset('matrix/category_code') }}"
                                                class='submenu-link'>Category
                                                Code</a>
                                        </li>

                                        <li class="submenu-item  ">
                                            <a href="{{ asset('matrix/maker') }}" class='submenu-link'>Maker</a>
                                        </li>

                                        <li class="submenu-item  ">
                                            <a href="{{ asset('matrix/subcont') }}" class='submenu-link'>Subcont</a>
                                        </li>

                                    </ul>


                                </div>
                            </div>
                        </li>

                        <li class="menu-item  ">
                            <a href="/report" class='menu-link'>
                                <span><i class="bi bi-grid-fill"></i> Report</span>
                            </a>
                        </li>

                        {{-- <li class="menu-item  ">
                            <a target="_blank" rel="noopener noreferrer" href="{{ asset('index.html') }}"
                                class='menu-link'>
                                <span><i class="bi bi-stack"></i> Lihat Template</span>
                            </a>
                        </li> --}}
                    </ul>
                </div>
            </nav>

            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
                aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title text-black" id="offcanvasExampleLabel">Notification</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body text-black">
                    <ol class="list-group list-group-numbered">
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Subheading</div>
                                Content for list item
                            </div>
                            <span class="badge bg-danger rounded-pill">X</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Subheading</div>
                                Content for list item
                            </div>
                            <span class="badge bg-danger rounded-pill">X</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Subheading</div>
                                Content for list item
                            </div>
                            <span class="badge bg-danger rounded-pill">X</span>
                        </li>
                    </ol>

                </div>
            </div>


        </header>



        <div id="app">
            @yield('content')
        </div>

</body>

<script type="text/javascript" src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>
{{-- <script type="text/javascript" src="{{ asset('assets/extensions/apexcharts/apexcharts.min.js') }}"></script> --}}
{{-- <script src="{{ asset('assets/js/pages/ui-apexchart.js') }}"></script> --}}
<script type="text/javascript" src="{{ asset('assets/js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/pages/dashboard.js') }}"></script>
<script type="text/javascript" src="{{ asset('fontawesome/js/brands.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('fontawesome/js/solid.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('datatables/datatables.min.js') }}"></script>

{{-- choices --}}
{{-- <script src="{{ asset('assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script> --}}
<script src="{{ asset('assets/extensions/choices.js/public/assets/scripts/choices.min.js') }}"></script>


<script src="{{ asset('assets/js/pages/form-element-select.js') }}"></script>
<script type="text/javascript" src="{{ asset('fontawesome/js/fontawesome.min.js') }}"></script>
<script src="{{ asset('js/jquery.number.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/extensions/toastify-js/src/toastify.js') }}"></script>
<script>
    $(document).ready(function() {
        $('input.number').number(true)
        $('input.number2').number(true, 2)

        $('span.number').number(true)
        $('span.number2').number(true, 2)
    });
</script>
@if ($message = Session::get('no_waiting_part'))
    <script>
        Toastify({
            text: "{{ $message }}",
            duration: 2500,
            close: true,
            gravity: "top",
            position: "center",
            backgroundColor: "#4fbe87",
        }).showToast()
    </script>
@endif
@yield('script')

</html>
