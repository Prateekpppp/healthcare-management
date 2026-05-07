@extends('master')

@section('body')


    <div class="col-md-12 main">
       
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Patient</h2>
            </div>
        </div>
        
        <div class="row">
            
            <div class="col-12 grid-margin">
                <div class="card">
                    <form class="row" action="{{route('post.updatePatient')}}" method="post">
                        @csrf
                        @if(isset($data))
                        <input name="id" type="hidden" class="form-control" id="id" value="{{$data->id}}" >
                        <input name="info_from" type="hidden" class="form-control" id="id" value="{{$data->info_from ?? ''}}" >
                        @endif
                        <div class="col-md-4 form-group">
                            <label>Name:</label>
                            <input type="text" name="first_name" class="form-control" required 
                                value="{{ $data->first_name ?? '' }}">
                        </div>

                        <div class="col-md-4 form-group">
                            <label>Age:</label>
                            <input type="text" name="age" class="form-control" required 
                                value="{{ $data->age ?? '' }}">
                        </div>

                        <div class="col-md-4 form-group">
                            <label>Gender:</label>
                            <select name="gender" class="form-control">
                                <option value="">Select</option>
                                <option value="Male" {{ ($data->gender ?? '')=='Male'?'selected':'' }}>Male</option>
                                <option value="Female" {{ ($data->gender ?? '')=='Female'?'selected':'' }}>Female</option>
                                <option value="Other" {{ ($data->gender ?? '')=='Other'?'selected':'' }}>Other</option>
                            </select>
                        </div>

                        <div class="col-md-4 form-group">
                            <label>Email:</label>
                            <input type="email" name="email" class="form-control" 
                                value="{{ $data->email ?? '' }}">
                        </div>

                        <div class="col-md-4 form-group">
                            <label>Phone:</label>
                            <input type="text" name="phone" class="form-control" 
                                value="{{ $data->phone ?? '' }}">
                        </div>

                        {{-- <div class="col-md-4 form-group">
                            <label>Marital Status:</label>
                            <select name="marital_status" class="form-control">
                                <option value="">Select</option>
                                <option value="Married" {{ ($data->marital_status ?? '')=='Married'?'selected':'' }}>Married</option>
                                <option value="Single" {{ ($data->marital_status ?? '')=='Single'?'selected':'' }}>Single</option>
                                <option value="Other" {{ ($data->marital_status ?? '')=='Other'?'selected':'' }}>Other</option>
                            </select>
                        </div> --}}

                        <div class="col-md-4 form-group">
                            <label>Address:</label>
                            <textarea name="location" class="form-control" rows="3" required>{{ $data->location ?? '' }}</textarea>
                        </div>

                        {{-- <div class="col-md-4 form-group">
                            <label>Occupation:</label>
                            <textarea name="occupation" class="form-control" rows="3">{{ $data->occupation ?? '' }}</textarea>
                        </div> --}}

                        <div class="col-md-4 form-group">
                            <label>Disease:</label>
                            <select name="disease" class="form-control">
                                <option value="">Select</option>
                                @foreach($diseases as $disease)
                                <option {{isset($data->disease) && $data->disease == $disease ? 'selected' : ''}} value="{{ $disease->name }}">{{ $disease->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- <div class=" col-md-4 form-group">
                                <option {{isset($data->disease) && $data->disease == $disease ? 'selected' : ''}} value="Asthma">Asthma</option>
                                <option {{isset($data->disease) && $data->disease == $disease ? 'selected' : ''}} value="COVID-19">COVID-19</option>
                                <option {{isset($data->disease) && $data->disease == $disease ? 'selected' : ''}} value="Tuberculosis">Tuberculosis</option>
                                <option {{isset($data->disease) && $data->disease == $disease ? 'selected' : ''}} value="Malaria">Malaria</option>
                                <option {{isset($data->disease) && $data->disease == $disease ? 'selected' : ''}} value="Dengue">Dengue</option>
                                <option {{isset($data->disease) && $data->disease == $disease ? 'selected' : ''}} value="Typhoid">Typhoid</option>
                                <option {{isset($data->disease) && $data->disease == $disease ? 'selected' : ''}} value="Migraine">Migraine</option>
                                <option {{isset($data->disease) && $data->disease == $disease ? 'selected' : ''}} value="Arthritis">Arthritis</option>
                                <option {{isset($data->disease) && $data->disease == $disease ? 'selected' : ''}} value="Allergy">Allergy</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- <div class=" col-md-4 form-group">
                            <label>Doctor:</label>
                            <select name="doctor_id" class="form-control doctor_select" required id="doctor_id">
                            <option></option>
                                @foreach($doctors as $doctor)
                                    <option  {{isset($data->doctor_id) && $data->doctor_id == $doctor->id ? 'selected' : ''}} value="{{$doctor->id}}">{{ $doctor->employee->first_name}} {{ $doctor->employee->last_name}}</option>
                                @endforeach
                            </select>
                        </div> --}}

                        <div class="col-md-4 form-group">
                            <label>Description:</label>
                            <textarea name="description" class="form-control" rows="3">{{ $data->description ?? '' }}</textarea>
                        </div>

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