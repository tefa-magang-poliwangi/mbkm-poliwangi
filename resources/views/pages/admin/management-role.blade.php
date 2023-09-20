@extends('layouts.base-admin')

@section('title')
    <title>Dashboard Admin | MBKM Poliwangi</title>
@endsection

@section('content')
    <div class="container">
        <div class="row py-5">
            <div class="col-md-12">
                <h3 class="card-title">Management Role</h3>
            </div>
            <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Management Role</h4>
                    <div class="card-header-form">
                      <form>
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search">
                          <div class="input-group-btn">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <th>No</th>
                          <th>Name</th>
                          <th>Guard Name</th>
                          <th>Action</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Jack</td>
                            <td>web</td>
                            <td><a href="#" class="btn btn-secondary"><i class="fa-solid fa-user-shield"></i></a></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Brown</td>
                            <td>web</td>
                            <td><a href="#" class="btn btn-secondary"><i class="fa-solid fa-user-shield"></i></a></td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
        </div>



        </div>
    </div>
@endsection
