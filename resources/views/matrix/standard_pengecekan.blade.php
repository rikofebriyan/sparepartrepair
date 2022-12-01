@extends('layouts.app')

@section('content')
    <CENTER>
        <div class="container-fluid">
            <H2>STANDARD PENGECEKAN TABLE</H2>
        </div>
    </CENTER>
    @if ($message = Session::get('success'))
        <h6 class="alert alert-success">
            {{ $message }}
        </h6>
    @endif

    <div class="card border-0 shadow rounded overflow-auto">
        <div class="card-body">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-md btn-success mb-3 float-right" data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                Add New Section
            </button>
            <div class="table-responsive-sm">
                <table id="myTable" class="table table-striped nowrap overflow-auto display">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Master Spare Part ID</th>
                            <th scope="col">Item Standard ID</th>
                            <th scope="col">Standard Pengecekan</th>
                            <th scope="col">created_at</th>
                            <th scope="col">updated_at</th>
                            <th scope="col">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($reqtzy as $req)
                            <tr>
                                <td>{{ $req->id }}</td>
                                <td>{{ $req->master_spare_part_id }}</td>
                                <td>{{ $req->item_standard_id }}</td>
                                <td>{{ $req->standard_pengecekan }}</td>


                                <td>{{ $req->created_at->format('d-m-Y H:i:s') }}</td>
                                <td>{{ $req->updated_at->format('d-m-Y H:i:s') }}</td>
                                <td class="text-center d-flex d-inline">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn icon btn-primary btn-sm me-1" data-bs-toggle="modal"
                                        data-bs-target="#asu{{ $req->id }}">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    {!! Form::model($req, ['method' => 'PATCH', 'route' => ['matrix.standard_pengecekan.update', $req->id]]) !!}
                                    <div class="modal fade" id="asu{{ $req->id }}" tabindex="-1"
                                        aria-labelledby="modalUpdateBarang" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Update Barang</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    {{-- FORM COLUMN 1 --}}
                                                    <div class="form-group mt-2">
                                                        <label for="master_spare_part_id">Master Spare Part ID</label>
                                                        <select name="master_spare_part_id" id="master_spare_part_id"
                                                            class="form-control">
                                                            <option value="" disabled selected>
                                                                choose
                                                            </option>
                                                            @foreach ($tab2 as $tab)
                                                                <option value="{{ $tab->id }}">{{ $tab->item_name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    {{-- FORM COLUMN 1 --}}
                                                    <div class="form-group mt-2">
                                                        <label for="item_standard_id">Item Standard ID</label>
                                                        <select name="item_standard_id" id="item_standard_id"
                                                            class="form-control">
                                                            <option value="" disabled selected>
                                                                choose
                                                            </option>
                                                            @foreach ($tab3 as $tabw)
                                                                <option value="{{ $tabw->id }}">
                                                                    {{ $tabw->item_standard }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    {{-- FORM COLUMN 1 --}}
                                                    <div class="form-group mt-2">
                                                        <label for="standard_pengecekan">standard_pengecekan</label>
                                                        <input type="text" id="standard_pengecekan"
                                                            name="standard_pengecekan" class="form-control"
                                                            value="{{ $req->standard_pengecekan }}" required>
                                                    </div>


                                                    <button type="submit" class="btn btn-primary">Perbarui Data</button>
                                                    <!--END FORM UPDATE BARANG-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                    {{ Form::open(['method' => 'DELETE', 'route' => ['matrix.standard_pengecekan.destroy', $req->id], 'style' => 'display:inline']) }}
                                    <button type="submit" class="btn icon btn-danger btn-sm"><i
                                            class="bi bi-trash3"></i></button>
                                    {{ Form::close() }}
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

    <!-- Modal -->

    {{ Form::open(['route' => 'matrix.standard_pengecekan.store', 'method' => 'POST']) }}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Section</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    {{-- FORM COLUMN 1 --}}
                    <div class="form-group mt-2">
                        <label for="master_spare_part_id">Section ID</label>
                        <select name="master_spare_part_id" id="master_spare_part_id" class="form-control">
                            <option value="" disabled selected>
                                choose
                            </option>
                            @foreach ($tab2 as $tab)
                                <option value="{{ $tab->id }}">{{ $tab->item_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- FORM COLUMN 1 --}}
                    <div class="form-group mt-2">
                        <label for="item_standard_id">Section ID</label>
                        <select name="item_standard_id" id="item_standard_id" class="form-control">
                            <option value="" disabled selected>
                                choose
                            </option>
                            @foreach ($tab3 as $tabw)
                                <option value="{{ $tabw->id }}">
                                    {{ $tabw->item_standard }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- FORM COLUMN 1 --}}
                    <div class="form-group mt-2">
                        <label for="standard_pengecekan">standard_pengecekan</label>
                        <input type="text" id="standard_pengecekan" name="standard_pengecekan" class="form-control"
                            value="" required>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }}
@endsection

@section('script')
    <!-- Main Script -->
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/pages/dashboard.js') }}"></script>
    <script type="text/javascript" src="{{ asset('fontawesome/js/brands.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('fontawesome/js/solid.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('fontawesome/js/fontawesome.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>
    <!-- Scripts for Table Page -->
    <script type="text/javascript" src="{{ asset('datatables/datatables.min.js') }}"></script>
    <!-- Scripts for Table Page -->
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                order: [
                    [0, 'desc']
                ],
            });
        });
    </script>
@endsection
