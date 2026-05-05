@extends('master')

@section('body')


    <div class="col-md-12 main">
       
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Appointment</h2>
            </div>
        </div>
        
        <div class="row">
            
            <div class="col-12 grid-margin">
                <div class="card">
                    <form class="row" action="{{route('post.updateAppointment')}}" method="post">
                        @csrf
                        @if(isset($data))
                        <input name="id" type="hidden" class="form-control" id="id" value="{{$data->id}}" >
                        <div class=" col-md-4 form-group">
                            <label>Patient:</label>
                            <select name="patient_id" class="form-control" id="patient_id">
                            <option></option>
                                @foreach($patients as $patient)
                                    <option {{$data->patient_id == $patient->id ? 'selected' : ''}} value="{{$patient->id}}">{{ $patient->first_name}} {{ $patient->last_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class=" col-md-4 form-group">
                            <label>Doctor:</label>
                            <select name="doctor_id" class="form-control doctor_select" required id="doctor_id">
                            <option></option>
                                @foreach($doctors as $doctor)
                                    <option {{$data->doctor_id == $doctor->id ? 'selected' : ''}} value="{{$doctor->id}}">{{ $doctor->employee->first_name}} {{ $doctor->employee->last_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class=" col-md-4 form-group">
                            <label>Available Time:</label>
                            <div class="available_time">
                                <input type="text" name="time" class="form-control" id="time" value="{{$data->time}}">
                            </div>
                        </div>
                        <div class="col-md-4 form-group">
                        <label>Appointment Date:</label>
                            <input type="date" name="appointment_date" pattern="\d{4}/\d{2}/\d{2}" class="form-control datepicker1"  data-date-start-date="0d" id="date" required="" value="{{date('Y-m-d',strtotime($data->appointment_date))}}">
                        </div>
                        
                        <div class=" col-md-4 form-group">
                            <label>Name:</label>
                            <input type="text" name="name" class="form-control" id="name" required="" value="{{$data->name}}">
                        </div>
                        
                        <div class=" col-md-4 form-group">
                            <label>Description:</label>
                            <input type="text" name="description" class="form-control" id="description" required="" value="{{$data->description}}">
                        </div>

                        @else
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
                            <div class="available_time">
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
                        @endif

                        <div class="col-md-4">
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
        $(document).ready( function() {
            $('#doctor_select').on('change', function() {
                var id = $('#doctor_select').val();
                //ajax
            //   $('#available_time').load({!! json_encode(url('/days/')) !!}+'/'+id);
            });
                
        
        });
    </script>
@endsection