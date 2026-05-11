@extends('master')

@section('body')


    <div class="col-md-12 main">
       
        <div class="row">
            <div class="col-lg-12 d-flex flex-row justify-content-between align-items-center">
                <h2 class="page-header">Hospitals</h2>
                <a href="{{route('pages.updateHospital')}}" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> Add New
                </a>
            </div>
        </div>
        
        <form method="GET" class="card p-3 mb-3 form-group">

            <div class="row g-3">

                <!-- Name -->
                <div class="col-md-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{request('name') ?? ''}}">
                </div>
                
                {{-- <!-- Phone -->
                <div class="col-md-3">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{request('phone') ?? ''}}">
                </div>
                
                <!-- Type -->
                <div class="col-md-3">
                    <label class="form-label">Type</label>
                    <select name="type" class="form-control select">
                        <option value="">-- Select --</option>
                        @foreach($roles as $roleId => $roleName)
                            <option value="{{ $roleId }}" {{ request()->type == $roleId ? 'selected' : '' }}>
                                {{ $roleName }}
                            </option>
                        @endforeach
                    </select>
                </div> --}}

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
                                    <th>Logo</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th>Pan Number</th>
                                    <th>Registration</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
						    <tbody>
						        @foreach($data as $key => $value)
						    	<tr>
                                    <td>{{ $value->id}}</td>
                                    <td><img src="{{ asset($value->logo) }}" alt="Logo" style="width: 50px; height: 50px;"></td>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->contact}}</td>
                                    <td>{{$value->email}}</td>
                                    <td>{{$value->pan_no}}</td>
                                    <td>{{$value->registration_no}}</td>
						    	<td>
                                    <div class="d-flex gap-3">
                                        <a href="{{ route('pages.updateHospital',['id'=>$value->id]) }}" class="btn btn-primary"> Edit </a>
                                        @permission
                                        <a href="{{route('app_action.trash',['model'=>'Hospital','id'=>$value->id])}}" class="delete-modal btn btn-danger"
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