@extends('master')

@section('body')


    <div class="col-md-12 main">
       
        <div class="row">
            <div class="col-lg-12 d-flex flex-row justify-content-between align-items-center">
                <h2 class="page-header">Appointment</h2>
                <a href="{{route('pages.appointments')}}" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> 
                    View All
                </a>
            </div>
        </div>
        
        <div class="row">
            
            <div class="col-12 grid-margin">
                <div class="card">
                    <form class="row" action="{{route('post.updateAppointment')}}" method="post">
                        @csrf
                        @if(isset($data))
                        <input name="id" type="hidden" class="form-control" id="id" value="{{$data->id}}" >
                        @endif
                        <div class=" col-md-4 form-group">
                            <label>Patient:</label>
                            <select name="patient_id" class="form-control" id="patient_id">
                            <option value="">Select</option>
                                @foreach($patients as $patient)
                                    <option {{isset($data->patient_id) && $data->patient_id == $patient->id ? 'selected' : ''}} value="{{$patient->id}}">{{ $patient->first_name}} {{ $patient->last_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class=" col-md-4 form-group">
                            <label>Doctor:</label>
                            <select name="doctor_id" class="form-control doctor_select" required id="doctor_id">
                                <option value="">Select</option>
                                @foreach($doctors as $doctor)
                                    <option {{isset($data->doctor_id) && $data->doctor_id == $doctor->id ? 'selected' : ''}} value="{{$doctor->id}}">{{ $doctor->employee->first_name}} {{ $doctor->employee->last_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Appointment Date:</label>
                            <input type="date" name="appointment_date" pattern="\d{4}/\d{2}/\d{2}" class="form-control datepicker1"  data-date-start-date="0d" id="date" required="" value="{{isset($data->appointment_date) ? date('Y-m-d', strtotime($data->appointment_date)) : ''}}">
                        </div>
                        @php
                            $start = strtotime('09:00');
                            $end = strtotime('18:00');
                            $interval = 30 * 60;
                        @endphp
                        <div class=" col-md-4 form-group">
                            <label>Available Time:</label>
                            <select name="time" class="form-control">
                                <option value="">-- Select Time --</option>

                                @for ($time = $start; $time <= $end; $time += $interval)
                                    <option {{ isset($data->time) && $data->time == $time ? 'selected' : '' }} value="{{ $time }}">
                                        {{ date('h:i A', $time) }}
                                    </option>
                                @endfor
                            </select>
                        </div>

                        <div class=" col-md-4 form-group">
                            <label>Doctor Fee:</label>
                            <input type="text" name="doctor_fee" class="form-control" id="doctor_fee" required="" value="{{$data->doctor_fee ?? ''}}" readonly>
                        </div>
                        
                        <div class=" col-md-4 form-group">
                            <label>Description:</label>
                            <input type="text" name="description" class="form-control" id="description" value="{{$data->description ?? ''}}">
                        </div>
                        
                        <div class=" col-md-4 form-group discount_section" style="display: {{ isset($data->discount) ? 'block' : 'none' }};">
                            <label>Discount:</label>
                            <input type="text" name="discount" class="form-control" id="discount" value="{{$data->discount ?? ''}}">
                        </div>
                        
                        <div class=" col-md-4 form-group discount_section" style="display: {{ isset($data->discount) ? 'block' : 'none' }};">
                            <label>Discount Description:</label>
                            <input type="text" name="discount_description" class="form-control" id="discount_description" value="{{$data->discount_description ?? ''}}">
                        </div>
                        <div class=" col-md-4 form-group">
                            <label>Apply Discount:</label>
                            <div class="time">
                                <input type="checkbox" name="apply_discount" class="form-checkbox apply_discount" id="apply_discount" {{ isset($data->discount) ? 'checked' : '' }}>
                            </div>
                        </div>
                        {{-- @else
                        <div class=" col-md-4 form-group">
                            <label>Patient:</label>
                            <select name="patient_id" class="form-control" id="patient_id">
                            <option></option>
                                @foreach($patients as $patient)
                                    <option value="{{$patient->id}}">{{ $patient->first_name}} {{ $patient->last_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class=" col-md-4 form-group">
                            <label>Doctor:</label>
                            <select name="doctor_id" class="form-control doctor_select" required id="doctor_id">
                            <option></option>
                                @foreach($doctors as $doctor)
                                    <option value="{{$doctor->id}}">{{ $doctor->employee->first_name}} {{ $doctor->employee->last_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class=" col-md-4 form-group">
                            <label>Available Time:</label>
                            <div class="time">
                                <input type="text" name="time" class="form-control" id="time">
                            </div>
                        </div>
                        <div class="col-md-4 form-group">
                        <label>Appointment Date:</label>
                            <input type="date" name="appointment_date" pattern="\d{4}/\d{2}/\d{2}" class="form-control"  data-date-start-date="0d" id="date" required="">
                        </div>
                        
                        <div class=" col-md-4 form-group">
                            <label>Name:</label>
                            <input type="text" name="name" class="form-control" id="name" required="">
                        </div>
                        
                        <div class=" col-md-4 form-group">
                            <label>Description:</label>
                            <input type="text" name="description" class="form-control" id="description" required="">
                        </div>
                        @endif --}}

                        <div class="col-md-12">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                        
                    </form>
                </div>
            </div>
            
            

        </div><!--/.row-->
    </div>

@endsection

@section('js')
    
    <script>
    </script>
@endsection