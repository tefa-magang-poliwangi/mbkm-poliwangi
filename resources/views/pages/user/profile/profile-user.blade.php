@extends('layouts.base-user')
@section('title')
    <title>Profile MBKM | Politeknik Negeri Banyuwangi</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')

<section class="section">
  <div class="section-header">
    <h1>Profile</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
      <div class="breadcrumb-item">Profile</div>
    </div>
  </div>
  <div class="section-body">
    <h2 class="section-title">Hi, Aida Andinar!</h2>
    <p class="section-lead">
      Perbarui profile mu disini.
    </p>

    <div class="row mt-sm-4">
      <div class="col-12 col-md-12 col-lg-5">
        <div class="card profile-widget py-5 px-2">
          <div class="profile-widget-header text-center">
            <img src="{{ asset('images/aida.jpg') }}" alt="Foto Profil" class="rounded-circle custom-profile-image">
          </div>
          <div class="profile-widget-description">
            <div class="profile-widget-name">Aida Andinar 
              <div class="text-muted d-inline font-weight-normal">
                <div class="slash">
                  </div> FullStack Web Developer</div>
                </div> Hallo, nama saya Aida Andinar. 
                Saya itu memiliki cita-cita menjadi asisten bos kaya raya dan 
                memiliki anak laki-laki yang bagian vokal hadrah. Masha Allah.
          </div>
        </div>
      </div>
      <div class="col-12 col-md-12 col-lg-7">
        <div class="card">
          <form method="post" class="needs-validation" novalidate="">
            <div class="card-header">
              <h4>Edit Profile</h4>
            </div>
            <div class="card-body">
                <div class="row">                               
                </div>
                <div class="row">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                      <input type="email" class="form-control" required="">
                      <div class="invalid-feedback">
                        Oh no! Email is invalid.
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">No. Telp</label>
                    <div class="col-sm-9">
                      <input type="email" class="form-control">
                      <div class="valid-feedback">
                        Good job!
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-12">
                    <label>Bio</label>
                    <textarea class="form-control summernote-simple">Hallo, nama saya Aida Andinar. 
                      Saya itu memiliki cita-cita menjadi asisten bos kaya raya dan 
                      memiliki anak laki-laki yang bagian vokal hadrah. Masha Allah.</textarea>
                  </div>
                </div>
                <div class="card-footer text-right">
                  <button class="btn btn-primary">Simpan</button>
                </div>
            </div>
            
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
    </script>
@endsection
