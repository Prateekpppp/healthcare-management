@extends('master')

@section('body')


    <div class="col-md-12 main">
       
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-12 d-flex flex-row justify-content-between align-items-center">
                    <h2 class="page-header">Services</h2>
                    <a href="{{route('pages.patientServices',['patient_id' => $patient->id])}}" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> All Service
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
                            <input type="text" name="name" class="form-control" id="patient" value="{{$patient->first_name}}" disabled>
                        </div>
                        
                        <div class=" col-md-4 form-group">
                            <label>Disease:</label>
                            <input type="text" name="disease" class="form-control" id="disease" value="{{$patient->disease->name ?? ''}}" disabled>
                        </div>
                        
                        <div class=" col-md-4 form-group">
                            <label>Service:</label>
                            <select name="service_id" class="form-control" required id="service_id">
                                    <option value="">Select</option>
                                    @foreach($services as $service)
                                        <option {{(isset($data->service_id) && $data->service_id == $service->id) || (isset($patient->patientservices->service_id) && $patient->patientservices->service_id == $service->id) ? 'selected' : ''}} value="{{$service->id}}">{{ $service->name}}</option>
                                    @endforeach
                            </select>
                        </div>
                        
                        <div class=" col-md-4 form-group">
                            <label>Appointment:</label>
                            {{-- <input type="hidden" name="appointment_id" class="form-control" required id="appointment_id" value="{{$appointments->id}}" readonly>
                            <input type="text" name="appointment_date" class="form-control" required id="appointment_date" value="{{$appointments->appointment_date}}" disabled> --}}
                            <select name="appointment_id" class="form-control" required id="appointment_id">
                                    {{-- <option value="">Select</option> --}}
                                    @foreach($appointments as $appointment)
                                        <option {{(isset($data->appointment_id) && $data->appointment_id == $appointment->id) || isset($request->appointment_id) && $request->appointment_id == $appointment->id ? 'selected' : ''}} value="{{$appointment->id}}">{{ $appointment->appointment_date}}</option>
                                    @endforeach
                            </select>
                        </div>

                        <div class=" col-md-4 form-group discount_section">
                            <label>Number of Days:</label>
                            <input type="number" name="no_of_days" class="form-control" id="no_of_days" value="{{$data->no_of_days ?? ''}}">
                        </div>
                        
                        <div class=" col-md-4 form-group">
                            <label>Medicine:</label>
                            <select name="medicine[]" class="form-select form-control multiple-select" multiple id="medicine">
                                    <option value="">Select</option>
                                    @foreach($medicines as $medicine)
                                        <option {{isset($data->medicine) && in_array($medicine->id,$data->medicine) ? 'selected' : ''}} value="{{$medicine->id}}">{{ $medicine->name}}</option>
                                    @endforeach
                            </select>
                        </div>

                        {{-- <div class=" col-md-4 form-group discount_section" style="display: {{ isset($data->discount) && $data->discount ? 'block' : 'none' }};">
                            <label>Discount %:</label>
                            <input type="text" name="discount" class="form-control" id="discount" value="{{$data->discount ?? ''}}">
                        </div>
                        
                        <div class=" col-md-4 form-group discount_section" style="display: {{ isset($data->discount) && $data->discount ? 'block' : 'none' }};">
                            <label>Discount Description:</label>
                            <input type="text" name="discount_description" class="form-control" id="discount_description" value="{{$data->discount_description ?? ''}}">
                        </div>
                        <div class=" col-md-4 form-group">
                            <label>Apply Discount %:</label>
                            <div class="time">
                                <input type="checkbox" name="apply_discount" class="form-checkbox apply_discount" id="apply_discount" {{ isset($data->discount) && $data->discount ? 'checked' : '' }}>
                            </div>
                        </div> --}}
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