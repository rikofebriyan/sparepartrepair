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
                Add New Standard Pengecekan
            </button>
            <div class="table-responsive-sm">
                <table id="myTable" class="table table-striped nowrap overflow-auto display">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Spare Part</th>
                            <th scope="col">Item Pengecekan</th>
                            <th scope="col">Unit Measurement</th>
                            <th scope="col">Operation</th>
                            <th scope="col">STD Check Min</th>
                            <th scope="col">STD Check Max</th>
                            <th scope="col">created_at</th>
                            <th scope="col">updated_at</th>
                            <th scope="col">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($join as $req)
                            <tr>
                                <td>{{ $req->id }}</td>
                                <td>{{ $req->item_name }}</td>
                                <td>{{ $req->item_standard }}</td>
                                <td>{{ $req->unit_measurement }}</td>
                                <td>{{ $req->operation }}</td>
                                <td>{{ $req->standard_pengecekan_min }}</td>
                                <td>{{ $req->standard_pengecekan_max }}</td>


                                <td>{{ $req->created_at->format('d-m-Y H:i:s') }}</td>
                                <td>{{ $req->updated_at->format('d-m-Y H:i:s') }}</td>
                                <td class="text-center d-flex d-inline">
          
                                    {{ Form::open(['method' => 'GET', 'route' => ['matrix.standard_pengecekan.show', $req->id], 'style' => 'display:inline']) }}
                                    <button type="submit" class="btn icon btn-primary btn-sm me-1">
                                        <i class="bi bi-pencil"></i></button>
                                    {{ Form::close() }}

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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Standard Pengecekan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    {{-- FORM COLUMN 1 --}}
                    <div class="form-group mt-2">
                        <label for="master_spare_part_id">Spare Part</label>
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
                        <label for="item_pengecekan_id">Item Pengecekan</label>
                        <select name="item_pengecekan_id" id="item_pengecekan_id" class="form-control">
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

                    <div class="form-group mt-2">
                        <label for="operation">Logical Operation</label>
                        <input type="text" id="operation" name="operation" class="form-control" value=""
                            required>
                    </div>


                    {{-- FORM COLUMN 1 --}}
                    <div class="form-group mt-2">
                        <label for="standard_pengecekan_min">Standard Pengecekan Min</label>
                        <input type="text" id="standard_pengecekan_min" name="standard_pengecekan_min"
                            class="form-control" value="" required>
                    </div>


                    <div class="form-group mt-2">
                        <label for="standard_pengecekan_max">Standard Pengecekan Max</label>
                        <input type="text" id="standard_pengecekan_max" name="standard_pengecekan_max"
                            class="form-control" value="" required>
                    </div>

                    <div class="form-group mt-2">
                        <label for="unit_measurement">Unit Measurement</label>
                        <input type="text" id="unit_measurement" name="unit_measurement" class="form-control"
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

@if ($message = Session::get('standard_pengecekan_edit_success'))
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
@endsection
