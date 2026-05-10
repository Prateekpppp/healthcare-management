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
        
        <form method="GET" class="card p-3 mb-3 form-group">

            <div class="row g-3">

                <!-- Patient -->
                <div class="col-md-3">
                    <label class="form-label">Patient</label>
                    <select name="patient_id" class="form-control select">
                        <option value="">-- Select --</option>
                        @foreach($patients as $patient)
                            <option value="{{ $patient->id }}"
                                {{ request()->patient_id == $patient->id ? 'selected' : '' }}>

                                {{ $patient->first_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <!-- Service -->
                <div class="col-md-3">
                    <label class="form-label">Doctor</label>
                    <select name="doctor_id" class="form-control select">
                        <option value="">-- Select --</option>
                        @foreach($doctors as $doctor)
                            <option value="{{ $doctor->id }}"
                                {{ request()->doctor_id == $doctor->id ? 'selected' : '' }}>

                                {{ $doctor->employee->first_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <!-- Date -->
                <div class="col-md-3">
                    <label class="form-label">Appointment Date</label>
                    <input type="date" name="appointment_date" class="form-control" value="{{request('appointment_date') ? date('Y-m-d', strtotime(request('appointment_date'))) : ''}}">
                </div>

                <!-- Name From -->
                {{-- <div class="col-md-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{request('name') ?? ''}}">
                </div> --}}

                <!-- Buttons -->
                <div class="col-md-3 d-flex align-items-end gap-2 pb-3">

                    <button type="submit" class="btn btn-primary w-100">
                        Filter
                    </button>

                    <a href="{{ url()->current() }}" class="btn btn-secondary w-100">
                        Reset
                    </a>

                </div>

            </div>

        </form>

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