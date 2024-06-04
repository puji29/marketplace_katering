@extends('./layout')

@section('content')
    <h2 class="mt-2">Edit Data</h2>
    <form action="/profil/{{ $profil->id }}" method="post">
        @method('put')
        @csrf
        <div class="mb-3">
            <label class="form-label">Nama Perushaan</label>
            <input type="text" class="form-control" placeholder="Nama Perusahaan" value="{{ $profil->nama_perusahaan }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <input type="text" class="form-control" placeholder="Alamat" value="{{ $profil->alamat }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Kontak</label>
            <input type="text" class="form-control" placeholder="Kontak" value="{{ $profil->kontak }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <input class="form-control" rows="3" value="{{ $profil->description }}"></input>
        </div>
        <button type="submit" name="submit" class="btn btn-primary" value="Save">Save</button>
    </form>
@endsection
