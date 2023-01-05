@extends('layouts.app')

@section('css')
@endsection
@section('content')
    {{-- @if ($message = Session::get('success'))
        <h6 class="alert alert-success">
            {{ $message }}
        </h6>
    @endif --}}
    <CENTER>
        <div class="container-fluid">
            <H2>STOCKOUT TABLE</H2>
        </div>
    </CENTER>


    <div class="row">
        <div class="card border-0 shadow rounded overflow-auto col m-2">
            <div class="card-body">
                {{-- <a href="#" class="btn btn-md btn-success mb-3 float-right">New
                Post</a> --}}

                <div class="table-responsive-sm">
                    <table id="myTable" class="table table-striped nowrap overflow-auto display text-sm">

                        <thead>
                            <tr>
                                <th scope="col">Tiket No</th>
                                <th scope="col">Actual Finish</th>
                                <th scope="col">Nama Spare Part</th>
                                <th scope="col">Item Code</th>
                                <th scope="col">Item Description</th>
                                <th class="text-center" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($reqtzy as $req)
                                <tr>
                                    <td>{{ substr($req->reg_sp, -6, 6) }}</td>
                                    <td>{{ Carbon\Carbon::parse($req->plan_finish_repair)->format('Y-m-d') }}</td>
                                    <td>{{ $req->item_name }}</td>
                                    <td>{{ $req->item_code }}</td>
                                    <td>{{ $req->item_type }}</td>
                                    <td class="text-center">


                                        <button type="button" class="rounded-pill btn btn-primary btn-sm col"
                                            data-bs-toggle="modal" data-bs-target="#modaldelete{{ $req->waitingrepairid }}">
                                            Stock Out
                                        </button>
                                        {{ Form::open(['route' => 'partrepair.stockout.store', 'method' => 'POST']) }}
                                        <div class="modal fade" id="modaldelete{{ $req->waitingrepairid }}" tabindex="-1"
                                            aria-labelledby="modaldeleteLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="modaldeleteLabel">Form Stock Out
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <input type="hidden" name="form_input_id"
                                                            value="{{ $req->waitingrepairid }}">

                                                        <div class="form-group position-relative has-icon-left mb-4">
                                                            <input type="text" id="pic" name="pic"
                                                                class="form-control form-control-xl" placeholder="pic"
                                                                value="{{ old('pic') }}">
                                                            <div class="form-control-icon">

                                                                @if ($errors->has('pic'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('pic') }}</strong>
                                                                    </span>
                                                                @endif


                                                                <i class="bi bi-person-circle"></i>
                                                            </div>
                                                        </div>

                                                        <div class="form-group position-relative has-icon-left mb-4">
                                                            <input type="date" id="tanggalstockout"
                                                                name="tanggalstockout" class="form-control form-control-xl"
                                                                placeholder="Tanggal Stock Out"
                                                                value="{{ old('tanggalstockout') }}">
                                                            <div class="form-control-icon">

                                                                @if ($errors->has('tanggalstockout'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('tanggalstockout') }}</strong>
                                                                    </span>
                                                                @endif


                                                                <i class="bi bi-calendar-week"></i>
                                                            </div>
                                                        </div>


                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>

                                                        <button type="submit" class="btn btn-primary">Stock Out</button>

                                                        {{ Form::close() }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </td>


                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center text-mute" colspan="4">Data post tidak tersedia</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>





        {{-- <div class="card border-0 shadow rounded overflow-auto col m-2">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="p-0">
                        <h3>Data Stock Repair</h3>
                    </div>
                    <div class="p-0">
                        <a href="/home"><img width="120" height="30"
                                src="{{ asset('assets/images/logo/logo.png') }}" alt="Logo"></a>
                    </div>
                </div>

                <div class="divider m-0">
                    <div class="divider-text">Repair Information</div>
                </div>
            </div>
        </div> --}}
    @endsection




























    @section('script')
        @if ($message = Session::get('success'))
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
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable({
                    order: [
                        [0, 'desc']
                    ],
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                var table = $('#myTable').DataTable();
                "autoWidth": true,
                "lengthMenu": [
                    [25, 50, 100, -1],
                    [25, 50, 100, "All"]
                ],
            });
        </script>
    @endsection
