@extends('master')

@section('body')


    <div class="col-md-12 main">
       
        <div class="row">
            <div class="col-lg-12 d-flex flex-row justify-content-between align-items-center">
                <h2 class="page-header">Transactions</h2>
                {{-- <a href="{{route('pages.updateMedicine')}}" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> Add Medicine --}}
                </a>
            </div>
        </div>
        
        <form method="GET" class="card p-3 mb-3 form-group">

            <div class="row g-3">
                
                <!-- Name -->
                <div class="col-md-3">
                    <label class="form-label">Transaction Id</label>
                    <input type="text" name="transaction_id" class="form-control" value="{{request('transaction_id') ?? ''}}">
                </div>

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
                                    <th>Patient Name</th>
                                    <th>Date</th>
                                    <th>Type</th>
                                    <th>Amount</th>
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </thead>
						    <tbody>
                                @php
                                    $cnt = 0;
                                    @endphp
						        @foreach($data as $key => $value)
						    	<tr>
						    	<td>{{($value->type == 'Appointment' ? $hospital->invoice_prefix.'-' : '').$value->transaction_id}}</td>
						    	<td>{{$value->patient_name}}</td>
						    	<td>{{$value->date}}</td>
						    	<td>{{$value->type}}</td>
						    	<td>{{$value->amount}}</td>
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