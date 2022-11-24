@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <H2>INVENTORY MANAGEMANT SYSTEM</H2>
    </div>
    <div class="container-fluid justify-content-center py-0">
        <div class="row">
            <div class="col-lg-4 col-sm-3">
                <div class="card-box bg-blue m-1">
                    <div class="inner">
                        <h3> 0 </h3>
                        <p>
                            <b> Stock On Hand </b>
                        </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-graduation-cap fa-bounce" aria-hidden="true"></i>
                    </div>
                    <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-sm-3">
                <div class="card-box bg-red m-1">
                    <div class="inner">
                        <h3> 0 </h3>
                        <p>
                            <b> Stock On Progress </b>
                        </p>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-scroll fa-bounce" aria-hidden="true"></i>
                    </div>
                    <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-3">
                <div class="card-box bg-orange m-1">
                    <div class="inner">
                        <h3> 0 </h3>
                        <p>
                            <b> Total Transaction Out </b>
                        </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user-plus fa-bounce" aria-hidden="true"></i>
                    </div>
                    <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
















    {{-- <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">

                        @if (Auth::user()->jabatan == 'ADMIN')
                            <div class="panel-body">
                                Halaman ADMIN!
                            </div>
                        @else
                            <div class="panel-body">
                                Halaman MEMBER!
                            </div>
                        @endif

                        Hello : {{ Auth::user()->name }} <br />
                        Email anda : {{ Auth::user()->email }} <br />
                        Anda login menggunakan NPK : {{ Auth::user()->NPK }}

                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
