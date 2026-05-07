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
        </div>
    </div>

    <div class="row">

        <!-- LEFT SIDE: BASIC INFO -->
        <div class="col-md-4">

            <div class="card mb-3">
                <div class="card-header">
                    Basic Information
                </div>
                <div class="card-body">

                    <p><strong>Name:</strong>
                        {{ $data->first_name ?? '' }}
                        {{ $data->middle_name ?? '' }}
                        {{ $data->last_name ?? '' }}
                    </p>

                    <p><strong>Email:</strong> {{ $data->email ?? '-' }}</p>
                    <p><strong>Phone:</strong> {{ $data->phone ?? '-' }}</p>
                    <p><strong>Gender:</strong> {{ $data->gender ?? '-' }}</p>
                    <p><strong>Marital Status:</strong> {{ $data->marital_status ?? '-' }}</p>
                    <p><strong>Date of Birth:</strong> {{ $data->birth_date ?? '-' }}</p>
                    <p><strong>Age:</strong> {{ $data->age ?? '-' }}</p>

                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header">
                    Medical Information
                </div>
                <div class="card-body">

                    <p><strong>Blood Group:</strong> {{ $data->blood_group ?? '-' }}</p>
                    <p><strong>Occupation:</strong> {{ $data->occupation ?? '-' }}</p>
                    <p><strong>Description:</strong> {{ $data->description ?? '-' }}</p>

                </div>
            </div>

        </div>

        <!-- RIGHT SIDE: ADDRESS + RELATIVE -->
        <div class="col-md-8">

            <div class="card mb-3">
                <div class="card-header">
                    Address Details
                </div>
                <div class="card-body">

                    <p><strong>Country:</strong> {{ $data->country ?? '-' }}</p>
                    <p><strong>State:</strong> {{ $data->state ?? '-' }}</p>
                    <p><strong>District:</strong> {{ $data->district ?? '-' }}</p>
                    <p><strong>Location:</strong> {{ $data->location ?? '-' }}</p>

                </div>
            </div>

            <div class="card mb-3">
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
                <div class="card-body table-responsive">

                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Appointment</th>
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
                                        <td>{{$appointment->name}}</td>
                                        <td>{{$appointment->doctor->employee->first_name}} {{$appointment->doctor->employee->last_name}}</td>
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