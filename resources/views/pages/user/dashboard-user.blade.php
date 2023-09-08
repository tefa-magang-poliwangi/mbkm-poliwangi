@extends('layouts.base-user')

@section('title')
    <title>Dashboard Mahasiswa | MBKM Poliwangi</title>
@endsection

@section('content')
    <section class="section">

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Invoices</h4>
                        <div class="card-header-action">
                            <a href="#" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive table-invoice">
                            <table class="table table-striped">
                                <tr>
                                    <th>Invoice ID</th>
                                    <th>Customer</th>
                                    <th>Status</th>
                                    <th>Due Date</th>
                                    <th>Action</th>
                                </tr>
                                <tr>
                                    <td><a href="#">INV-87239</a></td>
                                    <td class="font-weight-600">Kusnadi</td>
                                    <td>
                                        <div class="badge badge-warning">Unpaid</div>
                                    </td>
                                    <td>July 19, 2018</td>
                                    <td>
                                        <a href="#" class="btn btn-primary">Detail</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="#">INV-48574</a></td>
                                    <td class="font-weight-600">Hasan Basri</td>
                                    <td>
                                        <div class="badge badge-success">Paid</div>
                                    </td>
                                    <td>July 21, 2018</td>
                                    <td>
                                        <a href="#" class="btn btn-primary">Detail</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="#">INV-76824</a></td>
                                    <td class="font-weight-600">Muhamad Nuruzzaki</td>
                                    <td>
                                        <div class="badge badge-warning">Unpaid</div>
                                    </td>
                                    <td>July 22, 2018</td>
                                    <td>
                                        <a href="#" class="btn btn-primary">Detail</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="#">INV-84990</a></td>
                                    <td class="font-weight-600">Agung Ardiansyah</td>
                                    <td>
                                        <div class="badge badge-warning">Unpaid</div>
                                    </td>
                                    <td>July 22, 2018</td>
                                    <td>
                                        <a href="#" class="btn btn-primary">Detail</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="#">INV-87320</a></td>
                                    <td class="font-weight-600">Ardian Rahardiansyah</td>
                                    <td>
                                        <div class="badge badge-success">Paid</div>
                                    </td>
                                    <td>July 28, 2018</td>
                                    <td>
                                        <a href="#" class="btn btn-primary">Detail</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-hero">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="far fa-question-circle"></i>
                        </div>
                        <h4>14</h4>
                        <div class="card-description">Customers need help</div>
                    </div>
                    <div class="card-body p-0">
                        <div class="tickets-list">
                            <a href="#" class="ticket-item">
                                <div class="ticket-title">
                                    <h4>My order hasn't arrived yet</h4>
                                </div>
                                <div class="ticket-info">
                                    <div>Laila Tazkiah</div>
                                    <div class="bullet"></div>
                                    <div class="text-primary">1 min ago</div>
                                </div>
                            </a>
                            <a href="#" class="ticket-item">
                                <div class="ticket-title">
                                    <h4>Please cancel my order</h4>
                                </div>
                                <div class="ticket-info">
                                    <div>Rizal Fakhri</div>
                                    <div class="bullet"></div>
                                    <div>2 hours ago</div>
                                </div>
                            </a>
                            <a href="#" class="ticket-item">
                                <div class="ticket-title">
                                    <h4>Do you see my mother?</h4>
                                </div>
                                <div class="ticket-info">
                                    <div>Syahdan Ubaidillah</div>
                                    <div class="bullet"></div>
                                    <div>6 hours ago</div>
                                </div>
                            </a>
                            <a href="features-tickets.html" class="ticket-item ticket-more">
                                View All <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
