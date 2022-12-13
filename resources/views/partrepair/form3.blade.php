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
                        <a class="btn btn-success"
                            style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem;
                                --bs-btn-font-size: .75rem;""
                            href="{{ route('partrepair.progresspemakaian.show', $req->id) }}">PROGRESS</a>
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
