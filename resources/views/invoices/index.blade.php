@extends('master')

@section('body')


    <div class="col-md-12 main">
       
        <div class="row">
            <div class="col-lg-12 d-flex flex-row justify-content-between align-items-center">
                <h2 class="page-header">Invoices</h2>
                {{-- @if(isset($patient->id)) --}}
                {{-- <a href="{{isset($request->patient_id) ?  route('pages.updateInvoice',['patient_id' => $request->patient_id]) : route('pages.updateInvoice')}}" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> Add New
                </a> --}}
                <a href="{{route('pages.updateInvoice')}}" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> Add New
                </a>
                {{-- @endif --}}
            </div>
        </div>
        
        <form method="GET" class="card p-3 mb-3 form-group">

            <div class="row g-3">

                <!-- Patient -->
                <div class="col-md-3">
                    <label class="form-label">Patient</label>
                    <select name="patient_id" class="form-control select">
                        <option value="">-- Select --</option>
                        @foreach($patients as $patient)
                            <option value="{{ $patient->id }}"
                                {{ request()->patient_id == $patient->id ? 'selected' : '' }}>

                                {{ $patient->first_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <!-- Service -->
                <div class="col-md-3">
                    <label class="form-label">Service</label>
                    <select name="service_id" class="form-control select">
                        <option value="">-- Select --</option>
                        @foreach($services as $service)
                            <option value="{{ $service->id }}"
                                {{ request()->service_id == $service->id ? 'selected' : '' }}>

                                {{ $service->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <!-- Buttons -->
                <div class="col-md-3 d-flex align-items-end gap-2 pb-3">

                    <button type="submit" class="btn btn-primary w-100">
                        Filter
                    </button>

                    <a href="{{ url()->current() }}" class="btn btn-secondary w-100">
                        Reset
                    </a>

                </div>

            </div>

        </form>

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
                                        <a href="{{ route('pages.updateInvoice',['id'=>$value->id]) }}" class="edit-appointment btn btn-primary"> Edit </a>
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
                    <h3 align="center">Sorry No Data Found</h3>
                    @endif
                </div>
            </div>
            
            

        </div><!--/.row-->
    </div>

@endsection