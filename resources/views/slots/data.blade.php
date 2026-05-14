
					@if($data->count())
                    <div class="table-responsive">
                        <table class="table center-aligned-table">
                            <thead>
                                <tr class="bg-light">
                                    <th>ID</th>
                                    <th>Patient</th>
                                    <th>Inventory</th>
                                    <th>Slot</th>
                                    <th>Time Span</th>
                                    <th>Booking Date</th>
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
						    	<td>{{$value->patient->first_name ?? 'N/A'}}</td>
						    	<td>{{$value->inventory->name ?? 'N/A'}}</td>
						    	<td>{{$value->from . ' - ' . $value->to}}</td>
						    	<td>{{date('h:i A', $value->start_time) . ' - ' . date('h:i A', $value->end_time)}}</td>
						    	<td>{{$value->booking_date}}</td>
						    	<td>
                                    <div class="d-flex gap-3">
                                        <a href="{{ route('pages.updateSlot',['id'=>$value->id]) }}" class="edit-appointment btn btn-primary"> Edit </a>
                                        <a href="{{ route('pages.printSlot',['id'=>$value->id]) }}" class="btn btn-primary"> Print </a>
                                        @permission
                                        <a href="{{route('app_action.trash',['model'=>'Slot','id'=>$value->id])}}" class="delete-modal btn btn-danger"
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