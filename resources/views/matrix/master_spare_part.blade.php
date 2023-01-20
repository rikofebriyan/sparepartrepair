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
                            <th scope="col">id</th>
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


                    <div class="form-group mt-2">
                        <label for="item_code">item_code</label>
                        <input type="text" id="item_code" name="item_code" class="form-control" required>
                    </div>

                    <div class="form-group mt-2">
                        <label for="item_name">item_name</label>
                        <input type="text" id="item_name" name="item_name" class="form-control" value=""required>
                    </div>

                    <div class="form-group mt-2">
                        <label for="description">description</label>
                        <input type="text" id="description" name="description" class="form-control" required>
                    </div>

                    <div class="form-group mt-2">
                        <label for="qty">qty</label>
                        <input type="text" id="qty" name="qty" class="form-control" required>
                    </div>

                    <div class="form-group mt-2">
                        <label for="price">price</label>
                        <input type="text" id="price" name="price" class="form-control" required>
                    </div>

                    <div class="form-group mt-2">
                        <label for="status">status</label>
                        <input type="text" id="status" name="status" class="form-control" required>
                    </div>

                    <div class="form-group mt-2">
                        <label for="wh_code">wh_code</label>
                        <input type="text" id="wh_code" name="wh_code" class="form-control" required>
                    </div>

                    <div class="form-group mt-2">
                        <label for="rack_code">rack_code</label>
                        <input type="text" id="rack_code" name="rack_code" class="form-control" required>
                    </div>

                    <div class="form-group mt-2">
                        <label for="order_point">order_point</label>
                        <input type="text" id="order_point" name="order_point" class="form-control" required>
                    </div>

                    <div class="form-group mt-2">
                        <label for="order_qty">order_qty</label>
                        <input type="text" id="order_qty" name="order_qty" class="form-control" required>
                    </div>

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

    <div class="modal fade" id="modalasu" tabindex="-1" aria-labelledby="modalUpdateBarang" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/matrix.master_spare_part/0">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <input type="hidden" name="_method" value="PATCH">

                        <input type="hidden" name="id" value="">

                        <div class="form-group mt-2">
                            <label for="item_code">Item Code</label>
                            <input type="text" id="item_code" name="item_code" class="form-control" value="">
                        </div>

                        <div class="form-group mt-2">
                            <label for="item_name">item_name</label>
                            <input type="text" id="item_name" name="item_name" class="form-control" value=""
                                required>
                        </div>

                        <div class="form-group mt-2">
                            <label for="description">description</label>
                            <input type="text" id="description" name="description" class="form-control"
                                value="" required>
                        </div>

                        <div class="form-group mt-2">
                            <label for="qty">qty</label>
                            <input type="text" id="qty" name="qty" class="form-control" value=""
                                required>
                        </div>

                        <div class="form-group mt-2">
                            <label for="price">price</label>
                            <input type="text" id="price" name="price" class="form-control" value=""
                                required>
                        </div>

                        <div class="form-group mt-2">
                            <label for="status">status</label>
                            <input type="text" id="status" name="status" class="form-control" value=""
                                required>
                        </div>

                        <div class="form-group mt-2">
                            <label for="wh_code">wh_code</label>
                            <input type="text" id="wh_code" name="wh_code" class="form-control" value=""
                                required>
                        </div>

                        <div class="form-group mt-2">
                            <label for="rack_code">rack_code</label>
                            <input type="text" id="rack_code" name="rack_code" class="form-control" value=""
                                required>
                        </div>

                        <div class="form-group mt-2">
                            <label for="order_point">order_point</label>
                            <input type="text" id="order_point" name="order_point" class="form-control"
                                value="" required>
                        </div>

                        <div class="form-group mt-2">
                            <label for="order_qty">order_qty</label>
                            <input type="text" id="order_qty" name="order_qty" class="form-control" value=""
                                required>
                        </div>

                        <div class="form-group mt-2">
                            <label for="account_no">account_no</label>
                            <input type="text" id="account_no" name="account_no" class="form-control" value=""
                                required>
                        </div>

                        <button type="submit" class="btn btn-primary">Perbarui Data</button>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
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
    <script type="text/javascript" src="{{ asset('assets/js/axios.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('datatables/datatables.min.js') }}"></script>

    <!-- Scripts for Table Page -->
    <script>
        $('#modalasu').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var id = button.data('id'); // Extract info from data-* attributes

            // Update the modal's content
            var modal = $(this);
            var form = modal.find('form');
            modal.find('form').attr('action', '/matrix/master_spare_part/' + id);
 
            // Populate the form with the model 's data
            axios.get('/mymodel/' + id).then(function(response) {
                modal.find('form').find('input[name="id"]').val(response.data.id);
                modal.find('form').find('input[name="item_code"]').val(response.data.item_code);
                modal.find('form').find('input[name="item_name"]').val(response.data.item_name);
                modal.find('form').find('input[name="description"]').val(response.data.description);
                modal.find('form').find('input[name="qty"]').val(response.data.qty);
                modal.find('form').find('input[name="price"]').val(response.data.price);
                modal.find('form').find('input[name="status"]').val(response.data.status);
                modal.find('form').find('input[name="wh_code"]').val(response.data.wh_code);
                modal.find('form').find('input[name="rack_code"]').val(response.data.rack_code);
                modal.find('form').find('input[name="order_point"]').val(response.data.order_point);
                modal.find('form').find('input[name="order_qty"]').val(response.data.order_qty);
                modal.find('form').find('input[name="account_no"]').val(response.data.account_no);
            });
        });
    </script>
    <script>
        $(function() {
            $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/getmaster',

                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'item_code',
                        name: 'item_code'
                    },
                    {
                        data: 'item_name',
                        name: 'item_name'
                    },
                    {
                        data: 'description',
                        name: 'description'
                    },
                    {
                        data: 'qty',
                        name: 'qty'
                    },
                    {
                        data: 'price',
                        name: 'price'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'wh_code',
                        name: 'wh_code'
                    },
                    {
                        data: 'rack_code',
                        name: 'rack_code'
                    },
                    {
                        data: 'order_point',
                        name: 'order_point'
                    },
                    {
                        data: 'order_qty',
                        name: 'order_qty'
                    },
                    {
                        data: 'account_no',
                        name: 'account_no'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'updated_at',
                        name: 'updated_at'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },
                ],
            });


        });
    </script>
@endsection
