@extends('master')

@section('body')


    <div class="col-md-12 main">
       
        <div class="row">
            <div class="col-lg-12 d-flex flex-row justify-content-between align-items-center">
                <h2 class="page-header">Employees</h2>
                <a href="{{route('pages.updateEmployee')}}" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> Add Employee
                </a>
            </div>
        </div>
        
        <div class="row">
            
            <div class="col-12 grid-margin">
                <div class="card">
					@if($data->count())
                    <div class="table-responsive">
                        <table class="table center-aligned-table">
                            <thead>
                                <tr class="bg-light">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>Working Days</th>
                                    <th>In-time</th>
                                    <th>Out-time</th>
                                    <th>Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
						    <tbody>
						        @foreach($data as $key => $value)
						    	<tr>
                                    <td>{{ $value->id}}</td>
                                    <td>{{$value->first_name}} {{$value->middle_name}} {{$value->last_name}}</td>
                                    <td>{{$value->phone}}</td>
                                    <td>{{$value->working_day}}</td>
                                    <td>{{$value->in_time}}</td>
                                    <td>{{$value->out_time}}</td>
                                    <td>{{$value->type}}</td>
						    	<td>
                                    <div class="d-flex gap-3">
                                        <a href="{{ route('pages.updateEmployee',['id'=>$value->id]) }}" class="btn btn-primary"> Edit </a>
                                        @permission
                                        <a href="{{route('app_action.trash',['model'=>'Employee','id'=>$value->id])}}" class="delete-modal btn btn-danger"
                                        data-info="{{$value->id}}" id="deleteConfirm">
                                        <span class="glyphicon glyphicon-trash"></span> Delete
                                        </a>
                                        @endpermission
                                    </div>
						        </td>
						    	</tr>
						    	@endforeach
						    </tbody>
                        </table>
                    </div>
                    @else
                    <h3 align="center">Sorry No appointment Found</h3>
                    @endif
                </div>
            </div>
            
            

        </div><!--/.row-->
    </div>

@endsection