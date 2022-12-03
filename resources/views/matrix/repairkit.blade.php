@extends('layouts.app')

@section('content')
    <CENTER>
        <div class="container-fluid">
            <H2>REPAIR KIT TABLE</H2>
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
                            <th scope="col">Item Code</th>
                            <th scope="col">Item Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Maker</th>
                            <th scope="col">Qty</th>
                            <th scope="col">created_at</th>
                            <th scope="col">updated_at</th>
                            <th scope="col">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($reqtzy as $req)
                            <tr>
                                <td>{{ $req->id }}</td>
                                <td>{{ $req->item_code }}</td>
                                <td>{{ $req->item_name }}</td>
                                <td>{{ $req->description }}</td>
                                <td>{{ $req->maker }}</td>
                                <td>{{ $req->qty }}</td>


                                <td>{{ $req->created_at->format('d-m-Y H:i:s') }}</td>
                                <td>{{ $req->updated_at->format('d-m-Y H:i:s') }}</td>
                                <td class="text-center d-flex d-inline">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn icon btn-primary btn-sm me-1" data-bs-toggle="modal"
                                        data-bs-target="#asu{{ $req->id }}">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    {!! Form::model($req, ['method' => 'PATCH', 'route' => ['matrix.repair_kit.update', $req->id]]) !!}
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
                                                        <label for="item_code">item_code</label>
                                                        <input type="text" id="item_code" name="item_code"
                                                            class="form-control" value="{{ $req->item_code }}" required>
                                                    </div>

                                                    {{-- FORM COLUMN 2 --}}
                                                    <div class="form-group mt-2">
                                                        <label for="item_name">item_name</label>
                                                        <input type="text" id="item_name" name="item_name"
                                                            class="form-control" value="{{ $req->item_name }}" required>
                                                    </div>

                                                    {{-- FORM COLUMN 3 --}}
                                                    <div class="form-group mt-2">
                                                        <label for="description">description</label>
                                                        <input type="text" id="description" name="description"
                                                            class="form-control" value="{{ $req->description }}" required>
                                                    </div>

                                                    {{-- FORM COLUMN 1 --}}
                                                    <div class="form-group mt-2">
                                                        <label for="master_spare_part_id">Master Spare Part ID</label>
                                                        <select name="master_spare_part_id" id="master_spare_part_id"
                                                            class="form-control">
                                                            <option value="" disabled selected>
                                                                choose
                                                            </option>
                                                            @foreach ($tab3 as $tabw)
                                                                <option value="{{ $tabw->id }}">{{ $tabw->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    {{-- FORM COLUMN 4 --}}
                                                    <div class="form-group mt-2">
                                                        <label for="qty">qty</label>
                                                        <input type="text" id="qty" name="qty"
                                                            class="form-control" value="{{ $req->qty }}" required>
                                                    </div>

                                                    <button type="submit" class="btn btn-primary">Perbarui Data</button>
                                                    <!--END FORM UPDATE BARANG-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                    {{ Form::open(['method' => 'DELETE', 'route' => ['matrix.repair_kit.destroy', $req->id], 'style' => 'display:inline']) }}
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

    {{ Form::open(['route' => 'matrix.repair_kit.store', 'method' => 'POST']) }}
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
                        <label for="master_spare_part_id">Master Spare Part ID</label>
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
                        <label for="item_code">item_code</label>
                        <input type="text" id="item_code" name="item_code" class="form-control" value=""
                            required>
                    </div>

                    {{-- FORM COLUMN 1 --}}
                    <div class="form-group mt-2">
                        <label for="item_name">item_name</label>
                        <input type="text" id="item_name" name="item_name" class="form-control" value=""
                            required>
                    </div>

                    {{-- FORM COLUMN 1 --}}
                    <div class="form-group mt-2">
                        <label for="description">description</label>
                        <input type="text" id="description" name="description" class="form-control" value=""
                            required>
                    </div>

                    {{-- FORM COLUMN 1 --}}
                    <div class="form-group mt-2">
                        <label for="maker">Maker</label>
                        <select name="maker" id="maker" class="form-control">
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
