{{ Form::open(['route' => 'partrepair.progresstrial.store', 'method' => 'POST']) }}

<td><input type="text" name="judgement[1]" class="form-control" value="123"><input type="text"
        name="actual_pengecekan[1]" class="form-control" value="1234"></td>
<td><input type="text" name="judgement[2]" class="form-control" value="123"><input type="text"
        name="actual_pengecekan[2]" class="form-control" value="1234"></td>

<button type="submit" class="btn btn-md btn-primary">Save</button>
{{ Form::close() }}





<div class="container-fluid justify-content-center py-0">
    <div class="mb-3">
        <button class="btn btn-primary">Add item Pengecekan</button>
    </div>
    <div class="table-responsive-sm">
        <table id="myTable" class="table table-striped nowrap overflow-auto display">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">master_spare_part_id</th>
                    <th scope="col">item_standard_id</th>
                    <th scope="col">standard_pengecekan</th>
                    <th scope="col">item_standard</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($join as $joi)
                    <tr>
                        <td>{{ $joi->id }}</td>
                        <td>{{ $joi->master_spare_part_id }}</td>
                        <td>{{ $joi->item_standard_id }}</td>
                        <td>{{ $joi->standard_pengecekan }}</td>
                        <td>{{ $joi->item_standard }}</td>
                        <td class="text-center d-flex d-inline">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn icon btn-primary btn-sm me-1" data-bs-toggle="modal"
                                data-bs-target="#asu{{ $joi->id }}">
                                <i class="bi bi-pencil"></i>
                            </button>
                            {!! Form::model($joi, ['method' => 'PATCH', 'route' => ['matrix.master_spare_part.update', $joi->id]]) !!}
                            <div class="modal fade" id="asu{{ $joi->id }}" tabindex="-1"
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
                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}
                            {{ Form::open(['method' => 'DELETE', 'route' => ['matrix.master_spare_part.destroy', $joi->id], 'style' => 'display:inline']) }}
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
