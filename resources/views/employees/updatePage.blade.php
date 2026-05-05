@extends('master')

@section('body')


    <div class="col-md-12 main">
       
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Employee</h2>
            </div>
        </div>
        
        <div class="row">
            
            <div class="col-12 grid-margin">
                <div class="card">
                    <form class="row" action="{{route('post.updateEmployee')}}" method="post">
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
                            <input type="text" name="phone" class="form-control" required 
                                value="{{ $data->phone ?? '' }}">
                        </div>

                        <div class="col-md-4 form-group">
                            <label>Type:</label>
                            <select class="form-control" name="type" required>
                                <option value="{{ $data->type ?? '' }}">{{ $data->type ?? 'Select Type' }}</option>
                                <option value="Doctor">Doctor</option>
                                <option value="Laboratory">Laboratory</option>
                                <option value="Reception">Reception</option>
                                <option value="Pharmacy">Pharmacy</option>
                                <option value="Accountant">Accountant</option>
                                <option value="Nurse">Nurse</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <div class="col-md-4 form-group">
                            <label>Address:</label>
                            <textarea name="address" class="form-control" rows="3" required>
                                {{ $data->address ?? '' }}
                            </textarea>
                        </div>

                        <div class="col-md-4 form-group">
                            <label>Education:</label>
                            <textarea name="education" class="form-control" rows="3">
                                {{ $data->education ?? '' }}
                            </textarea>
                        </div>

                        <div class="col-md-4 form-group">
                            <label>Description:</label>
                            <textarea name="description" class="form-control" rows="3">
                                {{ $data->description ?? '' }}
                            </textarea>
                        </div>

                        <div class="col-md-4 form-group">
                            <label>Certificate:</label>
                            <textarea name="certificate" class="form-control" rows="3">
                                {{ $data->certificate ?? '' }}
                            </textarea>
                        </div>

                        <div class="col-md-4 form-group">
                            <label>Speciality:</label>
                            <textarea name="speciality" class="form-control" rows="3">
                                {{ $data->speciality ?? '' }}
                            </textarea>
                        </div>

                        <div class="col-md-4 form-group">
                            <label>Working Day:</label>
                            <select name="working_day[]" class="form-control" multiple>
                                @php
                                    $days = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
                                    $selectedDays = $data->working_day ?? [];
                                @endphp

                                @foreach($days as $day)
                                    <option value="{{ $day }}" 
                                        {{ in_array($day, (array)$selectedDays) ? 'selected' : '' }}>
                                        {{ $day }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4 form-group">
                            <label>In-Time:</label>
                            <input type="text" name="in_time" class="form-control timepicker" required 
                                value="{{ $data->in_time ?? '' }}">
                        </div>

                        <div class="col-md-4 form-group">
                            <label>Out-Time:</label>
                            <input type="text" name="out_time" class="form-control timepicker" required 
                                value="{{ $data->out_time ?? '' }}">
                        </div>

                        <div class="col-md-4 form-group">
                            <label>Department:</label>
                            <select name="department_id" class="form-control" required>
                                <option value="{{ $data->department_id ?? '' }}">
                                    {{ $data->department->name ?? 'Select Department' }}
                                </option>

                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}"
                                        {{ ($data->department_id ?? '') == $department->id ? 'selected' : '' }}>
                                        {{ $department->name }}
                                    </option>
                                @endforeach
                            </select>
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