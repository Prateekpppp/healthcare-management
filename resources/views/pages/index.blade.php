@extends('master')

@section('body')


    <div class="col-md-12 main">
       
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Dashboard</h2>
            </div>
        </div><!--/.row-->
         @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{ $message }}</strong>
            </div>
        @endif
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card card-statistics">
                    <div class="row">
                        <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-center flex-column flex-sm-row">
                                    <i class="mdi mdi-account-multiple-outline text-primary me-0 me-sm-4 icon-lg"></i>
                                    <div class="wrapper text-center text-sm-left">
                                        <p class="card-text mb-0">Pending Appointment</p>
                                        <div class="fluid-container">
                                        <h3 class="card-title mb-0">{{$pending['appointment']}}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-center flex-column flex-sm-row">
                                    <i class="mdi mdi-account-multiple-outline text-primary me-0 me-sm-4 icon-lg"></i>
                                    <div class="wrapper text-center text-sm-left">
                                        <p class="card-text mb-0">Total Patient</p>
                                        <div class="fluid-container">
                                        <h3 class="card-title mb-0">{{$patients->count()}}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-center flex-column flex-sm-row">
                                    <i class="mdi mdi-account-multiple-outline text-primary me-0 me-sm-4 icon-lg"></i>
                                    <div class="wrapper text-center text-sm-left">
                                        <p class="card-text mb-0">Total Test</p>
                                        <div class="fluid-container">
                                        <h3 class="card-title mb-0">{{$total_test}}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-center flex-column flex-sm-row">
                                    <i class="mdi mdi-account-multiple-outline text-primary me-0 me-sm-4 icon-lg"></i>
                                    <div class="wrapper text-center text-sm-left">
                                        <p class="card-text mb-0">Total Doctor</p>
                                        <div class="fluid-container">
                                        <h3 class="card-title mb-0">{{$total_doctor}}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            
            <!-- Today invoice collection -->
            <div class="col-12 grid-margin">
                <div class="panel-heading">Today's Collection</div>
                <div class="card">
                    <div class="table-responsive">
                        <table class="table center-aligned-table">
                            <thead>
                                <tr class="bg-light">
                                    <th>#</th>
                                    <th>Invoice No</th>
                                    <th>Payment</th>
                                    <th>Sub Total</th>
                                    <th>Discount</th>
                                    <th>Tax</th>
                                    <th>Total Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i=1;?>
                            @foreach($invoices as $invoice)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$invoice->invoice_no}}</td>
                                    <td>{{$invoice->payment_type}}</td>
                                    <td>${{number_format($invoice->sub_total, 2)}}</td>
                                    <td>${{$invoice->discount}}</td>
                                    <td>${{number_format($invoice->tax_amount, 2)}}</td>
                                    <td>${{number_format($invoice->total_amount)}}</td>
                                </tr>@endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Today collection ends -->

            <!-- Appointment for today -->
            <div class="col-12 grid-margin">
                <div class="panel-heading">Today's Appointment</div>
                <div class="card">
                    <div class="table-responsive">
                        <table class="table center-aligned-table">
                            <thead>
                                <tr class="bg-light">
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Patient</th>
                                    <th>Doctor</th>
                                    <th>Description</th>
                                    <th>Time</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1;?>
                                @foreach($appointments as $appointment)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$appointment->name}}</td>
                                    <td>{{$appointment->patient->first_name}} {{$appointment->patient->last_name}}</td>
                                    <td>{{$appointment->doctor->employee->first_name}} {{$appointment->doctor->employee->middle_name}} {{$appointment->doctor->employee->last_name}}</td>
                                    <td>{{$appointment->description}}</td>
                                    <td>{{$appointment->time}}</td>
                                    <td>
                                     @if($appointment->status)
                                    <a class="btn-sm btn-success" href="{{ route('appointment.edit',$appointment->id) }}"><span class=" glyphicon glyphicon-ok"></span> Complete</a>    
                                    @else
                                    <a class="btn-sm btn-warning" href="{{ route('appointment.edit',$appointment->id) }}"><span class=" glyphicon glyphicon-refresh"> </span> Pending</a>
                                    @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Appointmet table ends -->
            
            <!-- OPD for today -->
            <div class="col-12 grid-margin">
                <div class="panel-heading">Today's OPD</div>
                <div class="card">
                    <div class="table-responsive">
                        <table class="table center-aligned-table">
                            <thead>
                                <tr class="bg-light">
                                    <th>#</th>
                                    <th>Patient</th>
                                    <th>Doctor</th>
                                    <th>Register At</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1;?>
                                @foreach($opds as $opd)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$opd->invoice->patient->first_name}} {{$opd->invoice->patient->last_name}}</td>
                                    <td>{{$opd->doctor->employee->first_name}} {{$opd->doctor->employee->middle_name}} {{$opd->doctor->employee->last_name}}</td>
                                    <td>{{$opd->created_at}}</td>
                                    @if($opd->status == 1)
                                    <td><span class="btn-sm btn-success glyphicon glyphicon-ok"> Complete</span></td>
                                    @else
                                    <td><a class="btn-sm btn-warining" href="{{ route('doctor.edit',$opd->id) }}"><span class=" glyphicon glyphicon-refresh"> Pending</span></a> </span></td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- OPD table ends -->
            

        </div><!--/.row-->
    </div>

@endsection