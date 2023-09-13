@extends('layouts.base-user')
@section('title')
    <title>Beranda MBKM | Politeknik Negeri Banyuwangi</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')

<section class="container-fluid" style="padding-top: 8%">
    <div class="row py-3 d-flex justify-content-around">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                  <h4>UJANG MAMAN</h4>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-4">
                      <div class="list-group" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action active" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab">Profile</a>
                        <a class="list-group-item list-group-item-action" id="list-dokument-list" data-toggle="list" href="#list-dokument" role="tab">Lengkapi Dokumen</a>
                        <a class="list-group-item list-group-item-action" id="list-password-list" data-toggle="list" href="#list-password" role="tab">Ganti Kata Sandi</a>
                        <a class="list-group-item list-group-item-action" id="list-logout-list" data-toggle="list" href="#list-logout" role="tab">Keluar</a>
                      </div>
                    </div>
                    <div class="col-8">
                      <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                            <div class="card">
                                <form class="needs-validation" novalidate="">
                                  <div class="card-header">
                                    <h4>Ubah Profile</h4>
                                  </div>
                                  <div class="card-body">
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Nama</label>
                                      <div class="col-sm-9">
                                        <input type="text" class="form-control" required="">
                                        <div class="invalid-feedback">
                                          What's your name?
                                        </div>
                                      </div>
                                    </div>
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
                                  <div class="card-footer text-right">
                                    <button class="btn btn-primary">Submit</button>
                                  </div>
                                </form>
                              </div>
                        </div>
                        <div class="tab-pane fade" id="list-dokument" role="tabpanel" aria-labelledby="list-dokument-list">
                          Deserunt cupidatat anim ullamco ut dolor anim sint nulla amet incididunt tempor ad ut pariatur officia culpa laboris occaecat. Dolor in nisi aliquip in non magna amet nisi sed commodo proident anim deserunt nulla veniam occaecat reprehenderit esse ut eu culpa fugiat nostrud pariatur adipisicing incididunt consequat nisi non amet.
                        </div>
                        <div class="tab-pane fade" id="list-password" role="tabpanel" aria-labelledby="list-password-list">
                          In quis non esse eiusmod sunt fugiat magna pariatur officia anim ex officia nostrud amet nisi pariatur eu est id ut exercitation ex ad reprehenderit dolore nostrud sit ut culpa consequat magna ad labore proident ad qui et tempor exercitation in aute veniam et velit dolore irure qui ex magna ex culpa enim anim ea mollit consequat ullamco exercitation in.
                        </div>
                        <div class="tab-pane fade" id="list-logout" role="tabpanel" aria-labelledby="list-logout-list">
                          Lorem ipsum culpa in ad velit dolore anim labore incididunt do aliqua sit veniam commodo elit dolore do labore occaecat laborum sed quis proident fugiat sunt pariatur. Cupidatat ut fugiat anim ut dolore excepteur ut voluptate dolore excepteur mollit commodo. 
                        </div>
                      </div>
                    </div>
                  </div>
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
