@extends('layouts.app')

@section('content')
    <CENTER>
        <div class="container-fluid">
            <H2>MASTER SPARE PART TABLE</H2>
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
                            <th scope="col">item_code</th>
                            <th scope="col">item_name</th>
                            <th scope="col">description</th>
                            <th scope="col">qty</th>
                            <th scope="col">price</th>
                            <th scope="col">status</th>
                            <th scope="col">wh_code</th>
                            <th scope="col">rack_code</th>
                            <th scope="col">order_point</th>
                            <th scope="col">order_qty</th>
                            <th scope="col">account_no</th>
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
                                <td>{{ $req->qty }}</td>
                                <td>{{ $req->price }}</td>
                                <td>{{ $req->status }}</td>
                                <td>{{ $req->wh_code }}</td>
                                <td>{{ $req->rack_code }}</td>
                                <td>{{ $req->order_point }}</td>
                                <td>{{ $req->order_qty }}</td>
                                <td>{{ $req->account_no }}</td>


                                <td>{{ $req->created_at->format('d-m-Y H:i:s') }}</td>
                                <td>{{ $req->updated_at->format('d-m-Y H:i:s') }}</td>
                                <td class="text-center d-flex d-inline">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn icon btn-primary btn-sm me-1" data-bs-toggle="modal"
                                        data-bs-target="#asu{{ $req->id }}">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    {!! Form::model($req, ['method' => 'PATCH', 'route' => ['matrix.master_spare_part.update', $req->id]]) !!}
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


                                                    <!-- FORM COLUMN 1 -->
                                                    <div class="form-group mt-2">
                                                        <label for="item_code">item_code</label>
                                                        <input type="text" id="item_code" name="item_code"
                                                            class="form-control" value="{{ $req->item_code }}" required>
                                                    </div>

                                                    <!-- FORM COLUMN 2 -->
                                                    <div class="form-group mt-2">
                                                        <label for="item_name">item_name</label>
                                                        <input type="text" id="item_name" name="item_name"
                                                            class="form-control" value="{{ $req->item_name }}" required>
                                                    </div>

                                                    <!-- FORM COLUMN 3 -->
                                                    <div class="form-group mt-2">
                                                        <label for="description">description</label>
                                                        <input type="text" id="description" name="description"
                                                            class="form-control" value="{{ $req->description }}" required>
                                                    </div>

                                                    <!-- FORM COLUMN 4 -->
                                                    <div class="form-group mt-2">
                                                        <label for="qty">qty</label>
                                                        <input type="text" id="qty" name="qty"
                                                            class="form-control" value="{{ $req->qty }}" required>
                                                    </div>

                                                    <!-- FORM COLUMN 5 -->
                                                    <div class="form-group mt-2">
                                                        <label for="price">price</label>
                                                        <input type="text" id="price" name="price"
                                                            class="form-control" value="{{ $req->price }}" required>
                                                    </div>

                                                    <!-- FORM COLUMN 6 -->
                                                    <div class="form-group mt-2">
                                                        <label for="status">status</label>
                                                        <input type="text" id="status" name="status"
                                                            class="form-control" value="{{ $req->status }}" required>
                                                    </div>

                                                    <!-- FORM COLUMN 7 -->
                                                    <div class="form-group mt-2">
                                                        <label for="wh_code">wh_code</label>
                                                        <input type="text" id="wh_code" name="wh_code"
                                                            class="form-control" value="{{ $req->wh_code }}" required>
                                                    </div>

                                                    <!-- FORM COLUMN 8 -->
                                                    <div class="form-group mt-2">
                                                        <label for="rack_code">rack_code</label>
                                                        <input type="text" id="rack_code" name="rack_code"
                                                            class="form-control" value="{{ $req->rack_code }}" required>
                                                    </div>

                                                    <!-- FORM COLUMN 9 -->
                                                    <div class="form-group mt-2">
                                                        <label for="order_point">order_point</label>
                                                        <input type="text" id="order_point" name="order_point"
                                                            class="form-control" value="{{ $req->order_point }}"
                                                            required>
                                                    </div>

                                                    <!-- FORM COLUMN 10 -->
                                                    <div class="form-group mt-2">
                                                        <label for="order_qty">order_qty</label>
                                                        <input type="text" id="order_qty" name="order_qty"
                                                            class="form-control" value="{{ $req->order_qty }}" required>
                                                    </div>

                                                    <!-- FORM COLUMN 11 -->
                                                    <div class="form-group mt-2">
                                                        <label for="account_no">account_no</label>
                                                        <input type="text" id="account_no" name="account_no"
                                                            class="form-control" value="{{ $req->account_no }}" required>
                                                    </div>

                                                    <button type="submit" class="btn btn-primary">Perbarui Data</button>
                                                    <!--END FORM UPDATE BARANG-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                    {{ Form::open(['method' => 'DELETE', 'route' => ['matrix.master_spare_part.destroy', $req->id], 'style' => 'display:inline']) }}
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

    {{ Form::open(['route' => 'matrix.master_spare_part.store', 'method' => 'POST']) }}
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
                        <label for="item_code">item_code</label>
                        <input type="text" id="item_code" name="item_code" class="form-control" required>
                    </div>

                    {{-- FORM COLUMN 2 --}}
                    <div class="form-group mt-2">
                        <label for="item_name">item_name</label>
                        <input type="text" id="item_name" name="item_name" class="form-control"
                            value=""required>
                    </div>

                    {{-- FORM COLUMN 3 --}}
                    <div class="form-group mt-2">
                        <label for="description">description</label>
                        <input type="text" id="description" name="description" class="form-control" required>
                    </div>

                    {{-- FORM COLUMN 4 --}}
                    <div class="form-group mt-2">
                        <label for="qty">qty</label>
                        <input type="text" id="qty" name="qty" class="form-control" required>
                    </div>

                    {{-- FORM COLUMN 5 --}}
                    <div class="form-group mt-2">
                        <label for="price">price</label>
                        <input type="text" id="price" name="price" class="form-control" required>
                    </div>

                    {{-- FORM COLUMN 6 --}}
                    <div class="form-group mt-2">
                        <label for="status">status</label>
                        <input type="text" id="status" name="status" class="form-control" required>
                    </div>

                    {{-- FORM COLUMN 7 --}}
                    <div class="form-group mt-2">
                        <label for="wh_code">wh_code</label>
                        <input type="text" id="wh_code" name="wh_code" class="form-control" required>
                    </div>

                    {{-- FORM COLUMN 8 --}}
                    <div class="form-group mt-2">
                        <label for="rack_code">rack_code</label>
                        <input type="text" id="rack_code" name="rack_code" class="form-control" required>
                    </div>

                    {{-- FORM COLUMN 9 --}}
                    <div class="form-group mt-2">
                        <label for="order_point">order_point</label>
                        <input type="text" id="order_point" name="order_point" class="form-control" required>
                    </div>

                    {{-- FORM COLUMN 10 --}}
                    <div class="form-group mt-2">
                        <label for="order_qty">order_qty</label>
                        <input type="text" id="order_qty" name="order_qty" class="form-control" required>
                    </div>

                    {{-- FORM COLUMN 11 --}}
                    <div class="form-group mt-2">
                        <label for="account_no">account_no</label>
                        <input type="text" id="account_no" name="account_no" class="form-control" required>
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
