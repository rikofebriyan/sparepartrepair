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
                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                    </div>
                    <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-sm-3">
                <div class="card-box bg-green m-1">
                    <div class="inner">
                        <h3> 0 </h3>
                        <p>
                            <b> Stock On Progress </b>
                        </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user-plus" aria-hidden="true"></i>
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
                        <i class="fa fa-user-plus" aria-hidden="true"></i>
                    </div>
                    <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection
