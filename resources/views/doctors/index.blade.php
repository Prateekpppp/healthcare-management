@extends('master')

@section('body')


    <div class="col-md-12 main">
       
        <div class="row">
            <div class="col-lg-12 d-flex flex-row justify-content-between align-items-center">
                <h2 class="page-header">Doctors</h2>
                <a href="{{route('pages.updateDoctor')}}" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> Add Doctor
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
                                    <th>Phone</th>
                                    {{-- <th>Department</th> --}}
                                    <th>OPD Fee</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
						    <tbody>
                                @php
                                    $cnt = 0;
                                    @endphp
						        @foreach($data as $key => $value)
						    	<tr>
						    	<td>{{$cnt+=1}}</td>
						    	<td>{{$value->employee->first_name}} {{$value->employee->middle_name}} {{$value->employee->last_name}}</td>
                                <td>{{ $value->employee->phone}}</td>
                                {{-- <td>{{$value->employee->department->name}}</td> --}}
                                <td>${{$value->fee}}</td>
						    	<td>
                                    <div class="d-flex gap-3">
                                        <a href="{{ route('pages.updateDoctor',['id'=>$value->id]) }}" class="edit-appointment btn btn-primary"> Edit </a>
                                        @permission
                                        <a href="{{route('app_action.trash',['model'=>'Doctor','id'=>$value->id])}}" class="delete-modal btn btn-danger"
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