@extends('layouts.app')

@section('content')
    <div class="content-wrapper container">

        <div class="page-content">
            <section class="row my-4">
                <div class="col-12 col-lg-12">
                    <div class="page-heading d-flex justify-content-between">
                        <div>
                            <h3>Repair Statistic</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $data['total_registered'] }}</h5>
                                    <p class="card-text">Total Registered</p>
                                    {{-- <a href="#" class="btn btn-primary rounded-pill">View Detail <i
                                            class="fa-solid fa-arrow-right"></i></a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $data['total_Waiting'] }}</h5>
                                    <p class="card-text">Total Waiting</p>
                                    {{-- <a href="#" class="btn btn-primary rounded-pill">View Detail <i
                                        class="fa-solid fa-arrow-right"></i></a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $data['total_On Progress'] }}</h5>
                                    <p class="card-text">Total On Progress</p>
                                    {{-- <a href="#" class="btn btn-primary rounded-pill">View Detail <i
                                        class="fa-solid fa-arrow-right"></i></a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $data['total_Seal Kit'] }}</h5>
                                    <p class="card-text">Total Prep. Repair Kit</p>
                                    {{-- <a href="#" class="btn btn-primary rounded-pill">View Detail <i
                                        class="fa-solid fa-arrow-right"></i></a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $data['total_Trial'] }}</h5>
                                    <p class="card-text">Total On Trial</p>
                                    {{-- <a href="#" class="btn btn-primary rounded-pill">View Detail <i
                                        class="fa-solid fa-arrow-right"></i></a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $data['total_Finish'] }}</h5>
                                    <p class="card-text">Total Finished</p>
                                    {{-- <a href="#" class="btn btn-primary rounded-pill">View Detail <i
                                        class="fa-solid fa-arrow-right"></i></a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $data['total_Scrap'] }}</h5>
                                    <p class="card-text">Total Scrap</p>
                                    {{-- <a href="#" class="btn btn-primary rounded-pill">View Detail <i
                                        class="fa-solid fa-arrow-right"></i></a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Rp <span class="number">{{ $data['total_cost_saving'] / 1000000 }}</span> Mil</h5>
                                    <p class="card-text">Total Cost Saving</p>
                                    {{-- <a href="#" class="btn btn-primary rounded-pill">View Detail <i
                                        class="fa-solid fa-arrow-right"></i></a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $data['total_pneumatic'] }}</h5>
                                    <p class="card-text">Total Type Of Part : Pneumatic</p>
                                    {{-- <a href="#" class="btn btn-primary rounded-pill">View Detail <i
                                        class="fa-solid fa-arrow-right"></i></a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $data['total_hydraulic'] }}</h5>
                                    <p class="card-text">Total Type Of Part : Hydraulic</p>
                                    {{-- <a href="#" class="btn btn-primary rounded-pill">View Detail <i
                                        class="fa-solid fa-arrow-right"></i></a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $data['total_mechanic'] }}</h5>
                                    <p class="card-text">Total Type Of Part : Mechanic</p>
                                    {{-- <a href="#" class="btn btn-primary rounded-pill">View Detail <i
                                        class="fa-solid fa-arrow-right"></i></a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $data['total_electric'] }}</h5>
                                    <p class="card-text">Total Type Of Part : Electric</p>
                                    {{-- <a href="#" class="btn btn-primary rounded-pill">View Detail <i
                                        class="fa-solid fa-arrow-right"></i></a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $data['total_repair_in_house'] }}</h5>
                                    <p class="card-text">Total Repair In House</p>
                                    {{-- <a href="#" class="btn btn-primary rounded-pill">View Detail <i
                                        class="fa-solid fa-arrow-right"></i></a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $data['total_repair_in_subcont'] }}</h5>
                                    <p class="card-text">Total Repair In Subcont</p>
                                    {{-- <a href="#" class="btn btn-primary rounded-pill">View Detail <i
                                        class="fa-solid fa-arrow-right"></i></a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $data['total_repair_trade_in'] }}</h5>
                                    <p class="card-text">Total Trade In</p>
                                    {{-- <a href="#" class="btn btn-primary rounded-pill">View Detail <i
                                        class="fa-solid fa-arrow-right"></i></a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $data['total_repair_kit_ready'] }}</h5>
                                    <p class="card-text">Total Repair Kit Ready</p>
                                    {{-- <a href="#" class="btn btn-primary rounded-pill">View Detail <i
                                        class="fa-solid fa-arrow-right"></i></a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $data['total_repair_kit_not_ready'] }}</h5>
                                    <p class="card-text">Total Repair Kit Not Ready</p>
                                    {{-- <a href="#" class="btn btn-primary rounded-pill">View Detail <i
                                        class="fa-solid fa-arrow-right"></i></a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $data['total_judgement_ok'] }}</h5>
                                    <p class="card-text">Total Trial Judgement OK</p>
                                    {{-- <a href="#" class="btn btn-primary rounded-pill">View Detail <i
                                        class="fa-solid fa-arrow-right"></i></a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $data['total_judgement_ng'] }}</h5>
                                    <p class="card-text">Total Trial Judgement NG</p>
                                    {{-- <a href="#" class="btn btn-primary rounded-pill">
                                        View Detail <i class="fa-solid fa-arrow-right"></i>
                                    </a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        </div>
    </div>
@endsection
