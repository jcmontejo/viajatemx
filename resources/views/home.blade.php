@extends('layouts.app')
@section('title')
Inicio
@endsection
@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-home"></i>
        </span>
        Panel de control
    </h3>
</div>
<div class="row">
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-danger card-img-holder text-white">
            <div class="card-body">
                <img src="images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Weekly Sales
                    <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                </h4>
                <h2 class="mb-5">$ 15,0000</h2>
                <h6 class="card-text">Increased by 60%</h6>
            </div>
        </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white">
            <div class="card-body">
                <img src="images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Weekly Orders
                    <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                </h4>
                <h2 class="mb-5">45,6334</h2>
                <h6 class="card-text">Decreased by 10%</h6>
            </div>
        </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-success card-img-holder text-white">
            <div class="card-body">
                <img src="images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Visitors Online
                    <i class="mdi mdi-diamond mdi-24px float-right"></i>
                </h4>
                <h2 class="mb-5">95,5741</h2>
                <h6 class="card-text">Increased by 5%</h6>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Recent Tickets</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    Assignee
                                </th>
                                <th>
                                    Subject
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    Last Update
                                </th>
                                <th>
                                    Tracking ID
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img src="images/faces/face1.jpg" class="mr-2" alt="image">
                                    David Grey
                                </td>
                                <td>
                                    Fund is not recieved
                                </td>
                                <td>
                                    <label class="badge badge-gradient-success">DONE</label>
                                </td>
                                <td>
                                    Dec 5, 2017
                                </td>
                                <td>
                                    WD-12345
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="images/faces/face2.jpg" class="mr-2" alt="image">
                                    Stella Johnson
                                </td>
                                <td>
                                    High loading time
                                </td>
                                <td>
                                    <label class="badge badge-gradient-warning">PROGRESS</label>
                                </td>
                                <td>
                                    Dec 12, 2017
                                </td>
                                <td>
                                    WD-12346
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="images/faces/face3.jpg" class="mr-2" alt="image">
                                    Marina Michel
                                </td>
                                <td>
                                    Website down for one week
                                </td>
                                <td>
                                    <label class="badge badge-gradient-info">ON HOLD</label>
                                </td>
                                <td>
                                    Dec 16, 2017
                                </td>
                                <td>
                                    WD-12347
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="images/faces/face4.jpg" class="mr-2" alt="image">
                                    John Doe
                                </td>
                                <td>
                                    Loosing control on server
                                </td>
                                <td>
                                    <label class="badge badge-gradient-danger">REJECTED</label>
                                </td>
                                <td>
                                    Dec 3, 2017
                                </td>
                                <td>
                                    WD-12348
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Panel de control</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    Bienvenido de nuevo {{ Auth::user()->name }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection