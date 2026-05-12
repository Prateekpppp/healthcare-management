@extends('master')

@section('body')

<div class="col-md-12 main">

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Patient Profile
                <a href="{{ route('pages.updatePatient', ['id'=>$data->id]) }}" class="btn btn-sm btn-primary float-end">
                    Edit Profile
                </a>
            </h2>
            <div class="d-flex gap-3">
                <a href="{{ route('pages.patientServices',['patient_id'=>$data->id]) }}" class="btn btn-primary"> Services </a>
                <a href="{{ route('pages.packageSales',['patient_id'=>$data->id]) }}" class="btn btn-primary"> Packages </a>
                <a href="{{ route('pages.invoices',['patient_id'=>$data->id]) }}" class="btn btn-primary"> Invoices </a>
                <a href="{{ route('pages.slots',['patient_id'=>$data->id]) }}" class="btn btn-primary"> Slots </a>
            </div>
        </div>
    </div>

    <div class="row">

        <!-- LEFT SIDE: BASIC INFO -->
        <div class="col-md-4">

            @if(
                $data->email ||
                $data->phone ||
                $data->gender ||
                $data->marital_status ||
                $data->birth_date ||
                $data->age
            )
            <div class="card mb-3">
                <div class="card-header">
                    Basic Information
                </div>

                <div class="card-body">

                    @if($data->first_name)
                    <p>
                        <strong>Name:</strong>
                        {{ $data->first_name ?? '' }}
                    </p>
                    @endif

                    @if($data->email)
                    <p><strong>Email:</strong> {{ $data->email }}</p>
                    @endif

                    @if($data->phone)
                    <p><strong>Phone:</strong> {{ $data->phone }}</p>
                    @endif

                    @if($data->gender)
                    <p><strong>Gender:</strong> {{ $data->gender }}</p>
                    @endif

                    @if($data->marital_status)
                    <p><strong>Marital Status:</strong> {{ $data->marital_status }}</p>
                    @endif

                    @if($data->birth_date)
                    <p><strong>Date of Birth:</strong> {{ $data->birth_date }}</p>
                    @endif

                    @if($data->age)
                    <p><strong>Age:</strong> {{ $data->age }}</p>
                    @endif
                    
                    @if($data->disease->name)
                    <p><strong>Disease:</strong> {{ $data->disease->name }}</p>
                    @endif

                </div>
            </div>
            @endif

            <div class="card mb-3 d-none">
                <div class="card-header">
                    Medical Information
                </div>
                <div class="card-body">
                    @if($data->blood_group)
                    <p><strong>Blood Group:</strong> {{ $data->blood_group }}</p>
                    @endif

                    @if($data->occupation)
                    <p><strong>Occupation:</strong> {{ $data->occupation }}</p>
                    @endif

                    @if($data->description)
                    <p><strong>Description:</strong> {{ $data->description }}</p>
                    @endif

                </div>
            </div>

        </div>

        <!-- RIGHT SIDE: ADDRESS + RELATIVE -->
        <div class="col-md-8">

            <div class="card mb-3 d-none">
                <div class="card-header">
                    Address Details
                </div>
                <div class="card-body">
                    @if($data->country)
                    <p><strong>Country:</strong> {{ $data->country }}</p>
                    @endif

                    @if($data->state)
                    <p><strong>State:</strong> {{ $data->state }}</p>
                    @endif

                    @if($data->district)
                    <p><strong>District:</strong> {{ $data->district }}</p>
                    @endif

                    @if($data->location)
                    <p><strong>Location:</strong> {{ $data->location }}</p>
                    @endif

                </div>
            </div>

            <div class="card mb-3 d-none">
                <div class="card-header">
                    Emergency / Relative Details
                </div>
                <div class="card-body">

                    <p><strong>Relative Name:</strong> {{ $data->relative_name ?? '-' }}</p>
                    <p><strong>Relative Phone:</strong> {{ $data->relative_phone ?? '-' }}</p>

                </div>
            </div>

            <!-- OPD HISTORY PLACEHOLDER -->
            <div class="card mb-3">
                <div class="card-header">
                    Patient Appointment History
                </div>
                @php
                    $appointments = $data->appointments;
                @endphp
                    @include('appointments.data')
            </div>
            
            <!-- Service HISTORY PLACEHOLDER -->
            <div class="card mb-3 d-none">
                <div class="card-header">
                    Patient Service History
                </div>
                <div class="card-body table-responsive">

                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>ID</th>
                                {{-- <th>Appointment</th> --}}
                                <th>Doctor</th>
                                <th>Description</th>
                                <th>Time</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if($data->appointments->count())
                                @foreach($data->appointments()->get() as $appointment)
                                    <tr>
                                        <td>{{$appointment->id}}</td>
                                        {{-- <td>{{$appointment->name}}</td> --}}
                                        <td>{{$appointment->doctor->employee->first_name}}</td>
                                        <td>{{$appointment->description}}</td>
                                        <td>{{$appointment->time}}</td>
                                        <td>
                                        @if($appointment->status)
                                        <a class="btn btn-success" href="{{ route('appointment.edit',$appointment->id) }}"><span class=" glyphicon glyphicon-ok"></span> Complete</a>	
                                        @else
                                        <a class="btn btn-warning" href="{{ route('appointment.edit',$appointment->id) }}"><span class=" glyphicon glyphicon-refresh"> </span> Pending</a>
                                        @endif
                                    </td>
                                        <td>
                                            <a href="{{ route('pages.updateAppointment',['id'=>$appointment->id]) }}" class="edit-appointment btn btn-primary"> Edit </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" class="text-center">No Appointment history found</td>
                                </tr>
                            @endif

                        </tbody>
                    </table>

                </div>
            </div>

        </div>

    </div>

</div>

@endsection

@section('js')
<script>
    // future JS (tabs, ajax history load etc.)
</script>
@endsection