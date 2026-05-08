@extends('master')

@section('body')


    <div class="col-md-12 main">
       
        <div class="row">
            <div class="col-lg-12 d-flex flex-row justify-content-between align-items-center">
                <h2 class="page-header">Package Medicine</h2>
                <a href="{{route('pages.updatePackageMedicine',['package_id' => $package->id])}}" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> Add New
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
                                    <th>Medicine</th>
                                    <th>Description</th>
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
						    	<td>{{$value->medicine->name ?? ''}}</td>
						    	<td>{{$value->medicine->description ?? ''}}</td>
						    	<td>
                                    <div class="d-flex gap-3">
                                        <a href="{{ route('pages.updatePackageMedicine',['id'=>$value->id,'package_id'=>$package->id]) }}" class="edit-appointment btn btn-primary"> Edit </a>
                                        @permission
                                        <a href="{{route('app_action.trash',['model'=>'ServicePackage','id'=>$value->id])}}" class="delete-modal btn btn-danger"
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
                    <h3 align="center">Sorry No Package Found</h3>
                    @endif
                </div>
            </div>
            
            

        </div><!--/.row-->
    </div>

@endsection