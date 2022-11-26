@extends('layouts.app')


@section('content')
    <div class="container-fluid">
        <H2>PART REPAIR</H2>
    </div>

    @if ($message = Session::get('success'))
        <h6 class="alert alert-success">
            {{ $message }}
        </h6>
    @endif

    <div class="card border-0 shadow rounded overflow-auto">
        <div class="card-body">
            <a href="#" class="btn btn-md btn-success mb-3 float-right">New
                Post</a>

            <table id="myTable" class="table table-striped nowrap overflow-auto display">
                <thead>
                    <tr>

                        <th scope="col">Action</th>
                        <th scope="col">id</th>
                        <th scope="col">form_progress_id</th>
                        <th scope="col">item_code</th>
                        <th scope="col">item_name</th>
                        <th scope="col">description</th>
                        <th scope="col">maker</th>
                        <th scope="col">qty</th>
                        <th scope="col">price</th>
                        <th scope="col">total_price</th>
                        <th scope="col">status_part</th>
                        <th scope="col">quotation</th>
                        <th scope="col">nomor_pp</th>
                        <th scope="col">nomor_po</th>
                        <th scope="col">estimasi_kedatangan</th>
                        <th scope="col">status_kedatangan</th>
                        <th scope="col">Create At</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($reqtzy as $req)
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
                            <td>{{ $req->id }}</td>
                            <td>{{ $req->form_progress_id }}</td>
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
                            <td>{{ $req->created_at->format('d-m-Y') }}</td>
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
@endsection
