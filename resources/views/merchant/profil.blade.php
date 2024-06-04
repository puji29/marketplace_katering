@extends('./layout')

@section('content')
<div class="vh-100" style="background-color: #f4f5f7;">
    <div class="container py-5 ">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-lg-6 mb-4 mb-lg-0">
          <div class="card mb-3" style="border-radius: .5rem;">
            <div class="row g-0">
              <div class="col-md-8">
                <div class="card-body p-4">
                  <h6>Informasi Acccount</h6>
                  <hr class="mt-0 mb-4">
                  <div class="row pt-1">
                    @foreach($profil as $p)
                    <div class="col-6 mb-3">
                      <h6>Nama Perusahaan</h6>
                      <p class="text-muted">{{ $p->nama_perusahaan }}</p>
                    </div>
                    <div class="col-6 mb-3">
                      <h6>Alamat</h6>
                      <p class="text-muted">{{ $p->alamat }}</p>
                    </div>
                  </div>
                  
                  <div class="row pt-1">
                    <div class="col-6 mb-3">
                      <h6>Kontak</h6>
                      <p class="text-muted">{{ $p->kontak }}</p>
                    </div>
                    <div class="col-6 mb-3">
                      <h6>Deskripsi</h6>
                      <p class="text-muted">{{ $p->description }}</p>
                    </div>
                  </div>
                  <a href="/profil/{{ $p->id }}/edit" class="btn btn-primary">Edit</a>
                 @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection