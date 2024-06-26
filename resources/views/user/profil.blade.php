@extends('layouts.user')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">Perbarui Data Pengguna</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('profilUpdate') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="name">Nama</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" class="form-control" id="alamat" rows="3" required>{{ $user->alamat }}</textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="foto">Upload Foto Profil</label>
                            <img id="imagePreview" src="{{ $user->foto ? asset('storage/' . $user->foto) : '' }}" alt="Image Preview" style="display: {{ $user->foto ? 'block' : 'none' }}; width: 200px; margin-top: 10px;">
                            <input type="file" name="foto" class="form-control-file mt-2" id="foto" onchange="previewImage(event)">
                        </div>

                        <button type="submit" class="btn btn-primary">Perbarui</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function previewImage(event) {
    var input = event.target;
    var reader = new FileReader();
    reader.onload = function(){
        var dataURL = reader.result;
        var imagePreview = document.getElementById('imagePreview');
        imagePreview.src = dataURL;
        imagePreview.style.display = 'block';
    };
    reader.readAsDataURL(input.files[0]);
}
</script>
@endsection
