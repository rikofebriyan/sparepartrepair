@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Profile</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        {{-- 
                        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH') --}}

                        <div class="form-group row">
                            <label for="profile_picture" class="col-md-4 col-form-label text-md-right">Profile
                                Picture</label>

                            <div class="col-md-6">
                                <label for="gambar" class="text-light">Gambar</label>
                                <img class="img-preview img-fluid">
                                <br>
                                <input type="file" id="gambar" name="profile_picture"
                                    class="form-control @error('profile_picture') is-invalid @enderror"
                                    onchange="previewImage()" required>

                                {{-- @error('profile_picture')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update Profile Picture
                                </button>
                            </div>
                        </div>
                        {{-- </form> --}}

                        {{-- @if ($user->profile_picture) --}}
                        {{-- <form method="POST" action="{{ route('profile.destroy') }}">
                                @csrf
                                @method('DELETE') --}}

                        <div class="form-group row mt-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-danger">
                                    Delete Profile Picture
                                </button>
                            </div>
                        </div>
                        {{-- </form> --}}
                        {{-- @endif --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function previewImage() {
            const image = document.querySelector('#gambar');
            // alert('ok');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
