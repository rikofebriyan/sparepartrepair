<div class="container-fluid justify-content-center py-0">
    <div class="mb-3">

        @if ($message = Session::get('success'))
            <h6 class="alert alert-success">
                {{ $message }}
            </h6>
        @endif

        <button class="btn btn-primary">Add Part</button>
    </div>
    <table id="myTable" class="table table-striped nowrap overflow-auto display">
        <thead>
            <tr>

                <th scope="col">Action</th>
                <th scope="col">Item Code</th>
                <th scope="col">Item Name</th>
                <th scope="col">Description</th>
                <th scope="col">Maker</th>
                <th scope="col">Qty</th>
                <th scope="col">Price</th>
                <th scope="col">Total Price</th>
                <th scope="col">Status Part</th>
                <th scope="col">Quotation</th>
                <th scope="col">Nomor PP</th>
                <th scope="col">Nomor PO</th>
                <th scope="col">Estimasi Kedatangan</th>
                <th scope="col">Status Kedatangan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($progresspemakaian as $req)
                <tr>
                    <td class="text-center">
                        {{-- <a class="btn btn-success"
                            style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem;
                                --bs-btn-font-size: .75rem;"
                            href="{{ route('partrepair.progresspemakaian.show', $req->id) }}">PROGRESS</a> --}}
                        {{ Form::open(['method' => 'DELETE', 'route' => ['partrepair.progresspemakaian.destroy', $req->id], 'style' => 'display:inline']) }}
                        {{ Form::submit('Delete', [
                            'class' => 'btn btn-danger',
                            'style' => '--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem',
                        ]) }}
                        {{ Form::close() }}
                    </td>
                    <td>{{ $req->item_code }}</td>
                    <td>{{ $req->item_name }}</td>
                    <td>{{ $req->description }}</td>
                    <td>{{ $req->maker }}</td>
                    <td>{{ $req->qty }}</td>
                    <td>{{ $req->price }}</td>
                    <td>{{ $req->total_price }}</td>
                    <td>{{ $req->status_part }}</td>
                    <td>{{ $req->quotation }}</td>
                    <td>{{ $req->nomor_pp }}</td>
                    <td>{{ $req->nomor_po }}</td>
                    <td>{{ $req->estimasi_kedatangan }}</td>
                    <td>{{ $req->status_kedatangan }}</td>
                </tr>
            @empty
                <tr>
                    <td class="text-center text-mute" colspan="4">Data post tidak tersedia</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
{{ Form::open(['route' => 'partrepair.progresspemakaian.store', 'method' => 'POST']) }}

{{-- form input --}}

<div class="container-fluid justify-content-center py-0">
    <div class="container-fluid">
        <div class="row gx-3">
            <div class="col">
                <div class="p-3 border">


                    <div class="mb-3 row">
                        <label for="form_input_id" class="col-sm-3 col-form-label">form_input_id</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="form_input_id" name="form_input_id"
                                value="">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="item_code" class="col-sm-3 col-form-label">item_code</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="item_code" name="item_code" value="">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="item_name" class="col-sm-3 col-form-label">item_name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="item_name" name="item_name" value="">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="description" class="col-sm-3 col-form-label">description</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="description" name="description"
                                value="">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="maker" class="col-sm-3 col-form-label">maker</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="maker" name="maker" value="">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="qty" class="col-sm-3 col-form-label">qty</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="qty" name="qty" value="">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="price" class="col-sm-3 col-form-label">price</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="price" name="price" value="">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="total_price" class="col-sm-3 col-form-label">total_price</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="total_price" name="total_price"
                                value="">
                        </div>
                    </div>


                </div>
            </div>
            <div class="col">

                <div class="p-3 border">

                    <div class="mb-3 row">
                        <label for="status_part" class="col-sm-3 col-form-label">status_part</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="status_part" name="status_part"
                                value="">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="quotation" class="col-sm-3 col-form-label">quotation</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="quotation" name="quotation"
                                value="">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nomor_pp" class="col-sm-3 col-form-label">nomor_pp</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nomor_pp" name="nomor_pp"
                                value="">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nomor_po" class="col-sm-3 col-form-label">nomor_po</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nomor_po" name="nomor_po"
                                value="">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="estimasi_kedatangan" class="col-sm-3 col-form-label">estimasi_kedatangan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="estimasi_kedatangan"
                                name="estimasi_kedatangan" value="">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="status_kedatangan" class="col-sm-3 col-form-label">status_kedatangan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="status_kedatangan"
                                name="status_kedatangan" value="">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-md btn-primary">Save</button>
                    <a href="{{ route('partrepair.progresspemakaian.index') }}"
                        class="btn btn-md btn-secondary">back</a>
                </div>
            </div>
        </div>
    </div>
</div>
{{ Form::close() }}
