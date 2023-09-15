@extends('layouts.base-user')
@section('title')
    <title>Transkip Nilai MBKM |Dosen Wali| Politeknik Negeri Banyuwangi</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <div class="container-fluid" style="padding-top: 10%">
        <section>
            <div class="col text-start d-flex text-uppercase">
                <div class="px-2">
                    <i class="fa-solid fa-file-invoice fa-4x"></i>
                </div>
                <div>
                    <h3>Kelayakan Pendaftaran MBKM</h3>
                    <h6>Teknologi Rekayasa Perangkat Lunak</h6>
                </div>
            </div>
        </section>
      <div class="row">
        <div class="col-12">
          <div class="card border-0">            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover table-borderless rounded text-center" id="table-1" style="background-color: #EEEEEE; font-weight:bold;">
                  <thead>                                 
                    <tr>
                      <th>
                        No
                      </th>
                      <th>Nama</th>
                      <th>NIM</th>
                      <th>Program Studi</th>                      
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody style="background-color: #fff">                                 
                    <tr>
                      <td>
                        1
                      </td>
                      <td>Aida Andinar Maulidiana</td>
                      <td>
                        362055401012
                      </td>
                      <td>
                        Teknologi Rekayasa Perangkat Lunak
                      </td>                      
                      <td>
                        <a href="#" class="btn btn-transparent"><i class="fa-solid fa-magnifying-glass text-dark"></i></a>
                        <a href="#" class="btn btn-transparent"><i class="fa-solid fa-pen-to-square text-dark"></i></a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        2
                      </td>
                      <td>Rini Maulida</td>
                      <td>
                        362055401084
                      </td>
                      <td>
                        Teknologi Rekayasa Perangkat Lunak
                      </td>                      
                      <td>
                        <a href="#" class="btn btn-transparent"><i class="fa-solid fa-magnifying-glass text-dark"></i></a>
                        <a href="#" class="btn btn-transparent"><i class="fa-solid fa-pen-to-square text-dark"></i></a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>      
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
    </script>
@endsection