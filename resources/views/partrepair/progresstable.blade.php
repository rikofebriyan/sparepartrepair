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
                        <th scope="col">form_input_id</th>
                        <th scope="col">place_of_repair</th>
                        <th scope="col">analisa</th>
                        <th scope="col">action</th>
                        <th scope="col">pic_repair</th>
                        <th scope="col">plan_start_repair</th>
                        <th scope="col">plan_finish_repair</th>
                        <th scope="col">actual_start_repair</th>
                        <th scope="col">actual_finish_repair</th>
                        <th scope="col">total_time_repair</th>
                        <th scope="col">labour_cost</th>
                        <th scope="col">judgement</th>
                        <th scope="col">subcont_name</th>
                        <th scope="col">quotation</th>
                        <th scope="col">nomor_pp</th>
                        <th scope="col">nomor_po</th>
                        <th scope="col">estimasi_selesai</th>
                        <th scope="col">status_repair</th>
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
                                    href="{{ route('partrepair.progresstable.show', $req->id) }}">PROGRESS</a>
                                {{ Form::open(['method' => 'DELETE', 'route' => ['partrepair.progresstable.destroy', $req->id], 'style' => 'display:inline']) }}
                                {{ Form::submit('Delete', [
                                    'class' => 'btn btn-danger',
                                    'style' => '--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem',
                                ]) }}
                                {{ Form::close() }}
                            </td>
                            <td>{{ $req->id }}</td>
                            <td>{{ $req->form_input_id }}</td>
                            <td>{{ $req->place_of_repair }}</td>
                            <td>{{ $req->analisa }}</td>
                            <td>{{ $req->action }}</td>
                            <td>{{ $req->pic_repair }}</td>
                            <td>{{ $req->plan_start_repair }}</td>
                            <td>{{ $req->plan_finish_repair }}</td>
                            <td>{{ $req->actual_start_repair }}</td>
                            <td>{{ $req->actual_finish_repair }}</td>
                            <td>{{ $req->total_time_repair }}</td>
                            <td>{{ $req->labour_cost }}</td>
                            <td>{{ $req->judgement }}</td>
                            <td>{{ $req->subcont_name }}</td>
                            <td>{{ $req->quotation }}</td>
                            <td>{{ $req->nomor_pp }}</td>
                            <td>{{ $req->nomor_po }}</td>
                            <td>{{ $req->estimasi_selesai }}</td>
                            <td>{{ $req->status_repair }}</td>
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
