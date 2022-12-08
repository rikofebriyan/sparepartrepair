<div class="container-fluid justify-content-center py-0">
    <div class="mb-3">
        <button class="btn btn-primary">Add Part</button>
    </div>
    <table id="myTable" class="table table-striped nowrap overflow-auto display">
        <thead>
            <tr>
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
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 0; $i < 5; $i++)
                <tr>
                    <td>RE202211300001</td>
                    <td>Seal Kit</td>
                    <td>CDM2B32-PS01</td>
                    <td>SMC</td>
                    <td>1 pcs</td>
                    <td>Rp 3.000.000</td>
                    <td>Rp 3.000.000</td>
                    <td>Not Ready</td>
                    <td>123456789-Quo</td>
                    <td>T4720-HS0001</td>
                    <td>50100875</td>
                    <td>30 Nov 2022</td>
                    <td>
                        <a class="rounded-pill bg-secondary text-dark text-center px-2">Belum
                            Datang</a>
                    </td>
                    <td class="text-center">
                        <a class="btn btn-success" href="{{ route('partrepair.progresstrial.show', '2') }}">Edit</a>
                        {{ Form::open(['method' => 'DELETE', 'route' => ['partrepair.waitingtable.destroy', '2'], 'style' => 'display:inline']) }}
                        {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endfor
        </tbody>
    </table>
</div>
