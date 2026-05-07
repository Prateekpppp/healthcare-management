@extends('master')

@section('body')


    <div class="col-md-12 main">
       
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-12 d-flex flex-row justify-content-between align-items-center">
                    <h2 class="page-header">Services</h2>
                    <a href="{{route('pages.patientServices',['id' => $patient->id])}}" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> All Service
                    </a>
                </div>
            </div>
        </div>
        
        <div class="row">
            
            <div class="col-12 grid-margin">
                <div class="card">
                    <form class="row" action="{{route('post.updatePatientService')}}" method="post">
                        @csrf
                        @if(isset($data))
                        <input name="id" type="hidden" class="form-control" id="id" value="{{$data->id ?? ''}}" >
                        @endif
                        <input name="patient_id" type="hidden" class="form-control" id="id" value="{{$patient->id ?? ''}}" >

                        <div class=" col-md-4 form-group">
                            <label>Patient:</label>
                            <input type="text" name="name" class="form-control" id="patient" value="{{$patient->first_name}} {{$patient->middle_name}} {{$patient->last_name}}" disabled>
                        </div>
                        
                        <div class=" col-md-4 form-group">
                            <label>Service:</label>
                            <select name="service_id" class="form-control" required id="service_id">
                                    <option value="">Select</option>
                                    @foreach($services as $service)
                                        <option {{isset($data->service_id) && $data->service_id == $service->id ? 'selected' : ''}} value="{{$service->id}}">{{ $service->name}}</option>
                                    @endforeach
                            </select>
                        </div>
                        
                        <div class=" col-md-4 form-group">
                            <label>Appointment:</label>
                            <select name="appointment_id" class="form-control" required id="appointment_id">
                                    <option value="">Select</option>
                                    @foreach($appointments as $appointment)
                                        <option {{isset($data->appointment_id) && $data->appointment_id == $appointment->id ? 'selected' : ''}} value="{{$appointment->id}}">{{ $appointment->id}}</option>
                                    @endforeach
                            </select>
                        </div>

                        {{-- <div class=" col-md-4 form-group">
                            <label>Price:</label>
                            <input type="text" name="amount" class="form-control" id="amount" required="" value="{{$data->amount ?? ''}}">
                        </div> --}}
                        

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