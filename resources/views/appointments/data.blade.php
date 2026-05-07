
					@if($appointments->count())
                    <div class="table-responsive">
                        <table class="table center-aligned-table">
                            <thead>
                                <tr class="bg-light">
                                    <th>ID</th>
                                    {{-- <th>Name</th> --}}
                                    <th>Patient Name</th>
                                    <th>Doctor</th>
                                    <th>Doctor Fee</th>
                                    <th>Description</th>
                                    <th>Time</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
						    <tbody>
						        @foreach($appointments as $key => $appointment)
						    	<tr>
						    	<td>{{$appointment->id}}</td>
						    	{{-- <td>{{$appointment->name}}</td> --}}
						    	<td>{{$appointment->patient->first_name}} {{$appointment->patient->last_name}}</td>
						    	<td>{{$appointment->doctor->employee->first_name}} {{$appointment->doctor->employee->middle_name}} {{$appointment->doctor->employee->last_name}}</td>
						    	<td>{{$appointment->doctor->fee}}</td>
						    	<td>{{$appointment->description}}</td>
						    	<td>{{$appointment->time}}</td>
						    	<td>{{$appointment->appointment_date}}</td>
								<td> 
                                    @php
                                        $statuses = [
                                            0 => 'Pending',
                                            1 => 'Confirmed',
                                            2 => 'Checked-in',
                                            3 => 'Completed',
                                        ];
                                    @endphp

                                    <div class="form-group m-0">
                                        <select id="status" name="status" class="form-control m-0 changeStatus" data-id="{{$appointment->id}}" data-model="Appointment">
                                            <option value="">-- Select Status --</option>

                                            @foreach($statuses as $key => $value)
                                                <option value="{{ $key }}"
                                                    {{ isset($appointment->status) && $appointment->status == $key ? 'selected' : '' }}>
                                                    {{ $value }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

									{{-- @if($appointment->status)
								   	<a class="btn btn-sm btn-success" href="{{ route('appointment.edit',$appointment->id) }}"><span class=" glyphicon glyphicon-ok"></span> Completed</a>	
									@else
									<a class="btn btn-sm btn-warning" href="{{ route('appointment.edit',$appointment->id) }}"><span class=" glyphicon glyphicon glyphicon-refresh"> </span> Pending</a>
									@endif --}}
								</td>
						    	<td>
                                    <div class="d-flex gap-3">
                                        {{-- <a href="{{ route('appointment.edit',$appointment->id) }}" class="edit-appointment btn btn-primary"> Edit </a> --}}
                                        <a href="{{ route('pages.updateAppointment',['id'=>$appointment->id]) }}" class="edit-appointment btn btn-primary"> Edit </a>
                                        @permission
                                        <a href="{{route('app_action.trash',['model'=>'Appointment','id'=>$appointment->id])}}" class="delete-modal btn btn-danger"
                                        data-info="{{$appointment->id}}" id="deleteConfirm">
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