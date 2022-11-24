<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('fontawesome/css/fontawesome.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('fontawesome/css/brands.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('fontawesome/css/solid.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('jquery.dataTables.min.css') }}">
    <link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/riko.css') }}">


</head>

<body id="app-layout">
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #17A75B">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">PT. TD AUTOMOTIVE COMPRESSOR INDONESIA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">DASHBOARD</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">TICKETING</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            E-CATALOGUE
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="/" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            SPAREPART REPAIR
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/partrepair/request">Request</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="/partrepair/waitingtable">Waiting Page</a></li>
                            <li><a class="dropdown-item" href="/partrepair/progresstable">Progress Admin
                                    Page</a>
                            </li>

                        </ul>
                    </li>

                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                style="color:white" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                v-pre>
                                Welcome, {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ url('/logout') }}">Logout</a></li>
                            </ul>

                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>



    <main class="py-3">
        @yield('content')
    </main>

</body>

<!-- JavaScripts -->
<script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('fontawesome/js/brands.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('fontawesome/js/solid.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('fontawesome/js/fontawesome.min.js') }}"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="{{ asset('jquery.dataTables.min.js') }}"></script>
{{-- <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script> --}}

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>

</html>
