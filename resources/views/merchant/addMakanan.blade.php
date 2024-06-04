@extends('./layout')

@section('content')
    <h2 class="mt-2">Add Data</h2>
    <form action="/makanan/store" method="post" enctype="multipart/form-data">
       
        @csrf
        <div class="mb-3">
            <label class="form-label">Nama Maknanan</label>
            <input type="text" name="name" class="form-control" placeholder="Nama makanan" >
        </div>
        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <input type="text" name="deskripsi" class="form-control" placeholder="Deskripsi" >
        </div>
        <div class="mb-3">
            <label class="form-label">Foto</label>
            <input type="file" name="foto" class="form-control" placeholder="Foto" >
        </div>
        <div class="mb-3">
            <label class="form-label">Harga</label>
            <input type="number" class="form-control" rows="3" ></input>
        </div>
        <div class="mb-3">
            <label class="form-label">Jenis Makanan</label>
            <input type="text" name="jenis_makanan" class="form-control" rows="3" ></input>
        </div>
        <button type="submit" name="submit" class="btn btn-primary" value="Save">Save</button>
    </form>
@endsection
