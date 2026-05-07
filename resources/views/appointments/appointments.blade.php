@extends('master')

@section('body')


    <div class="col-md-12 main">
       
        <div class="row">
            <div class="col-lg-12 d-flex flex-row justify-content-between align-items-center">
                <h2 class="page-header">Appointments</h2>
                <a href="{{route('pages.updateAppointment')}}" class="edit-appointment btn btn-primary"><span class="glyphicon glyphicon-edit"></span> Add Appointment
                </a>
            </div>
        </div>
        
        <div class="row">
            
            <!-- Appointment for today -->
            <div class="col-12 grid-margin">
                {{-- <div class="panel-heading">Today's Appointment</div> --}}
                <div class="card">
                    @include('appointments.data')
                </div>
            </div>
            <!-- Appointmet table ends -->
            
            

        </div><!--/.row-->
    </div>

@endsection