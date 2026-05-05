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
                        @endif
                        <div class="col-md-4 form-group">
                            <label>First Name:</label>
                            <input type="text" name="first_name" class="form-control" required 
                                value="{{ $data->first_name ?? '' }}">
                        </div>

                        <div class="col-md-4 form-group">
                            <label>Middle Name:</label>
                            <input type="text" name="middle_name" class="form-control" 
                                value="{{ $data->middle_name ?? '' }}">
                        </div>

                        <div class="col-md-4 form-group">
                            <label>Last Name:</label>
                            <input type="text" name="last_name" class="form-control" required 
                                value="{{ $data->last_name ?? '' }}">
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

                        <div class="col-md-4 form-group">
                            <label>Gender:</label>
                            <select name="gender" class="form-control" required>
                                <option value="">Select</option>
                                <option value="Male" {{ ($data->gender ?? '')=='Male'?'selected':'' }}>Male</option>
                                <option value="Female" {{ ($data->gender ?? '')=='Female'?'selected':'' }}>Female</option>
                                <option value="Other" {{ ($data->gender ?? '')=='Other'?'selected':'' }}>Other</option>
                            </select>
                        </div>

                        <div class="col-md-4 form-group">
                            <label>Marital Status:</label>
                            <select name="marital_status" class="form-control" required>
                                <option value="">Select</option>
                                <option value="Married" {{ ($data->marital_status ?? '')=='Married'?'selected':'' }}>Married</option>
                                <option value="Single" {{ ($data->marital_status ?? '')=='Single'?'selected':'' }}>Single</option>
                                <option value="Other" {{ ($data->marital_status ?? '')=='Other'?'selected':'' }}>Other</option>
                            </select>
                        </div>

                        <div class="col-md-4 form-group">
                            <label>Blood Group:</label>
                            <select name="blood_group" class="form-control">
                                <option value="">Select</option>
                                @foreach(['A+','A-','B+','B-','AB+','AB-','O+','O-'] as $bg)
                                    <option value="{{ $bg }}" 
                                        {{ ($data->blood_group ?? '')==$bg?'selected':'' }}>
                                        {{ $bg }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4 form-group">
                            <label>Date of Birth:</label>
                            <input type="date" name="birth_date" class="form-control" 
                                value="{{ $data->birth_date ?? '' }}">
                        </div>

                        <div class="col-md-4 form-group">
                            <label>Age:</label>
                            <input type="text" name="age" class="form-control" required 
                                value="{{ $data->age ?? '' }}">
                        </div>

                        <div class="col-md-4 form-group">
                            <label>Relative Name:</label>
                            <input type="text" name="relative_name" class="form-control" 
                                value="{{ $data->relative_name ?? '' }}">
                        </div>

                        <div class="col-md-4 form-group">
                            <label>Relative Phone:</label>
                            <input type="text" name="relative_phone" class="form-control" 
                                value="{{ $data->relative_phone ?? '' }}">
                        </div>

                        <div class="col-md-4 form-group">
                            <label>Country:</label>
                            <input type="text" name="country" class="form-control" 
                                value="{{ $data->country ?? '' }}">
                        </div>

                        <div class="col-md-4 form-group">
                            <label>State:</label>
                            <input type="text" name="state" class="form-control" 
                                value="{{ $data->state ?? '' }}">
                        </div>

                        <div class="col-md-4 form-group">
                            <label>District:</label>
                            <input type="text" name="district" class="form-control" 
                                value="{{ $data->district ?? '' }}">
                        </div>

                        <div class="col-md-4 form-group">
                            <label>Location:</label>
                            <textarea name="location" class="form-control" rows="3" required>{{ $data->location ?? '' }}</textarea>
                        </div>

                        <div class="col-md-4 form-group">
                            <label>Occupation:</label>
                            <textarea name="occupation" class="form-control" rows="3">{{ $data->occupation ?? '' }}</textarea>
                        </div>

                        <div class="col-md-4 form-group">
                            <label>Description:</label>
                            <textarea name="description" class="form-control" rows="3">{{ $data->description ?? '' }}</textarea>
                        </div>

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
    </script>
@endsection