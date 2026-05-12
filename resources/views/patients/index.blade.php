@extends('master')

@section('body')


    <div class="col-md-12 main">
       
        <div class="row">
            <div class="col-lg-12 d-flex flex-row justify-content-between align-items-center">
                <h2 class="page-header">Patients</h2>
                <a href="{{route('pages.updatePatient')}}" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> Add Patient
                </a>
            </div>
        </div>
        
        <form method="GET" class="card p-3 mb-3 form-group">

            <div class="row g-3">
                
                <!-- Name -->
                <div class="col-md-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="first_name" class="form-control" value="{{request('first_name') ?? ''}}">
                </div>
                
                <!-- Email -->
                <div class="col-md-3">
                    <label class="form-label">Email</label>
                    <input type="text" name="email" class="form-control" value="{{request('email') ?? ''}}">
                </div>

                <!-- Phone -->
                <div class="col-md-3">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{request('phone') ?? ''}}">
                </div>
                
                <div class="col-md-3">
                    <label class="form-label">Disease</label>
                    <select name="disease_id" class="form-control select">
                        <option value="">-- Select --</option>
                        @foreach($diseases as $disease)
                            <option value="{{ $disease->id }}"
                                {{ request()->disease_id == $disease->id ? 'selected' : '' }}>

                                {{ $disease->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="col-md-3">
                    <label class="form-label">Gender</label>
                    <select name="gender" class="form-control select">
                        <option value="">-- Select --</option>
                        <option value="Male" {{ request()->gender == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ request()->gender == 'Female' ? 'selected' : '' }}>Female</option>
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
                                    <th>Name</th>
                                    <th>Disease</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
						    <tbody>
						        @foreach($data as $key => $value)
						    	<tr>
                                    <td>{{ $value->id}}</td>
                                    <td>{{$value->first_name ?? '--'}}</td>
                                    <td>{{$value->disease->name ?? '--'}}</td>
                                    <td>{{$value->email}}</td>
                                    <td>{{$value->phone}}</td>
                                    <td>{{$value->location}}</td>
						    	<td>
                                    <div class="d-flex gap-3">
                                        <a href="{{ route('patient.show',$value->id) }}" class="btn btn-secondary"> Profile </a>
                                        <a href="{{ route('pages.updatePatient',['id'=>$value->id]) }}" class="btn btn-primary"> Edit </a>
                                        @permission
                                        <a href="{{route('app_action.trash',['model'=>'Patient','id'=>$value->id])}}" class="delete-modal btn btn-danger"
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