<div class="container-fluid justify-content-center py-0">
    <div class="mb-3">
        <button class="btn btn-primary">Add item Pengecekan</button>
    </div>
    <table id="myTable" class="table table-striped nowrap overflow-auto display">
        <thead>
            <tr>
                <th scope="col">Item Pengecekan</th>
                <th scope="col">Standard</th>
                <th scope="col">Actual</th>
                <th scope="col">Judgement</th>
                <th scope="col" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 0; $i < 5; $i++)
                <tr>
                    <td>Ampere</td>
                    <td>5 A</td>
                    <td>3 A</td>
                    <td>
                        <a class="rounded-pill bg-success text-dark text-center px-2">Good</a>
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
