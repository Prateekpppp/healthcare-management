@extends('master')

@section('body')


    <div class="col-md-12 main">
       
        <div class="row">
            <div class="col-lg-12 d-flex flex-row justify-content-between align-items-center">
                <h2 class="page-header">Invoices</h2>
                {{-- @if(isset($patient->id)) --}}
                <a href="{{isset($patient->id) ?  route('pages.updateInvoice',['patient_id' => $patient->id]) : route('pages.updateInvoice')}}" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> Add New
                </a>
                {{-- @endif --}}
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
                                    <th>Patient</th>
                                    <th>Service</th>
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
						    	<td>{{$value->patient->first_name}}</td>
						    	<td>{{$value->service->name ?? ''}}</td>
						    	<td>
                                    <div class="d-flex gap-3">
                                        <a href="{{ route('pages.updateInvoice',['id'=>$value->id,'patient_id'=>$value->patient_id]) }}" class="edit-appointment btn btn-primary"> Edit </a>
                                        @permission
                                        <a href="{{route('app_action.trash',['model'=>'Service','id'=>$value->id])}}" class="delete-modal btn btn-danger"
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
                    <h3 align="center">Sorry No Diseases Found</h3>
                    @endif
                </div>
            </div>
            
            

        </div><!--/.row-->
    </div>

@endsection