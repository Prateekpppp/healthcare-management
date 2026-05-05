@extends('master')

@section('body')


    <div class="col-md-12 main">
       
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Doctor</h2>
            </div>
        </div>
        
        <div class="row">
            
            <div class="col-12 grid-margin">
                <div class="card">
                    <form class="row" action="{{route('post.updateDoctor')}}" method="post">
                        @csrf
                        @if(!isset($data))
                        <div class="col-md-4 form-group">
                            <label>Select Doctor:</label>
                            <select name="employee_id" class="form-control" required>
                            @foreach($employees as $employee)      	
                            <option value="{{$employee->id}}">DR.{{$employee->first_name}} {{$employee->middle_name}} {{$employee->last_name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class=" col-md-4 form-group">
                            <label>Doctor Fee:</label>
                            <input type="text" name="fee" class="form-control" id="fee" required="">
                        </div>
                        <div class=" col-md-4 form-group">
                            <label>OPD Charge:</label>
                            <input type="text" name="opd_charge" class="form-control" id="opd_charge" required="">
                        </div>
                        <div class="form-group">
                            <label for="with_tax">With Tax</label>
                            <input type="checkbox" name="with_tax" id="with_tax" >
                        </div>

                        @else
                        <input name="id" type="hidden" class="form-control" id="id" value="{{$data->id}}" >
                        <div class="col-md-4 form-group">
                            <label>Select Doctor:</label>
                            <select name="employee_id" class="form-control" required>
                            <option selected value="{{$data->employee->id}}">{{$data->employee->first_name}} {{$data->employee->middle_name}} {{$data->employee->last_name}}</option>
                            </select>
                        </div>
                        <div class=" col-md-4 form-group">
                            <label>Doctor Fee:</label>
                            <input type="text" name="fee" class="form-control" id="fee" required="" value="{{$data->fee}}">
                        </div>
                        <div class=" col-md-4 form-group">
                            <label>OPD Charge:</label>
                            <input type="text" name="opd_charge" class="form-control" id="opd_charge" required="" value="{{$data->opd_charge}}">
                        </div>
                        <div class="form-group">
                            <label for="with_tax">With Tax</label>
                            <input type="checkbox" name="with_tax" id="with_tax" {{$data->with_tax ?? 'checked'}} >
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
    </script>
@endsection