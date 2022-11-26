@extends('layouts.app')


@section('content')
    <div class="container-fluid">
        <H2>PROGRESS PEMAKAIAN</H2>
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
                        <th scope="col">id_standard_pengecekan</th>
                        <th scope="col">standard_pengecekan</th>
                        <th scope="col">actual_pengecekan</th>
                        <th scope="col">judgement</th>
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
                                    href="{{ route('partrepair.progresstrial.show', $req->id) }}">PROGRESS</a>
                                {{ Form::open(['method' => 'DELETE', 'route' => ['partrepair.progresstrial.destroy', $req->id], 'style' => 'display:inline']) }}
                                {{ Form::submit('Delete', [
                                    'class' => 'btn btn-danger',
                                    'style' => '--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem',
                                ]) }}
                                {{ Form::close() }}
                            </td>
                            <td>{{ $req->id }}</td>
                            <td>{{ $req->form_progress_id }}</td>
                            <td>{{ $req->id_standard_pengecekan }}</td>
                            <td>{{ $req->standard_pengecekan }}</td>
                            <td>{{ $req->actual_pengecekan }}</td>
                            <td>{{ $req->judgement }}</td>
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
