@extends('master')

@section('body')


    <div class="col-md-12 main">
       
        <div class="row">
            <div class="col-lg-12 d-flex flex-row justify-content-between align-items-center">
                <h2 class="page-header">Services</h2>
                <a href="{{route('pages.updatePatientService',['patient_id' => $patient->id])}}" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> Assign Service
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
                                    <th>Service</th>
                                    <th>Price</th>
                                    @permission
                                    <th>Action</th>
                                    @endpermission
                                </tr>
                            </thead>
						    <tbody>
						        @foreach($data as $key => $value)
						    	<tr>
						    	<td>{{$value->id}}</td>
						    	<td>{{$value->service->name}}</td>
						    	<td>{{$value->service->amount}}</td>
                                @permission
						    	<td>
                                    <div class="d-flex gap-3">
                                        <a href="{{route('app_action.trash',['model'=>'Service','id'=>$value->id])}}" class="delete-modal btn btn-danger"
                                        data-info="{{$value->id}}" id="deleteConfirm">
                                        <span class="glyphicon glyphicon-trash"></span> Delete
                                        </a>
                                    </div>
						        </td>
                                @endpermission
						    	</tr>
						    	@endforeach
						    </tbody>
                        </table>
                    </div>
                    @else
                    <h3 align="center">Sorry No Diseases Found</h3>
                    @endif
                </div>
            </div>
            
            

        </div><!--/.row-->
    </div>

@endsection