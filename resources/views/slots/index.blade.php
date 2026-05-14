@extends('master')

@section('body')


    <div class="col-md-12 main">
       
        <div class="row">
            <div class="col-lg-12 d-flex flex-row justify-content-between align-items-center">
                <h2 class="page-header">Slots</h2>
                <a href="{{route('pages.updateSlot')}}" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> Add New
                </a>
            </div>
        </div>
        {{-- @include('includes.searchItem',['model' => 'Slot','key' => 'from']) --}}
        <form method="GET" class="card p-3 mb-3 form-group">

            <div class="row g-3">

                <!-- Inventory / Category -->
                <div class="col-md-3">
                    <label class="form-label">Inventory</label>
                    <select name="inventory_id" class="form-control select">
                        <option value="">-- Select --</option>
                        @foreach($inventories as $inventory)
                            <option value="{{ $inventory->id }}"
                                {{ request()->inventory_id == $inventory->id ? 'selected' : '' }}>

                                {{ $inventory->name }}
                            </option>
                        @endforeach
                    </select>
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

                <!-- Date From -->
                {{-- <div class="col-md-3">
                    <label class="form-label">Booking Date</label>
                    <input type="date" name="booking_date" class="form-control" value="{{request('booking_date') ?? ''}}">
                </div> --}}

                <!-- Date From -->
                <div class="col-md-3">
                    <label class="form-label">From Date</label>
                    <input type="date" name="from" class="form-control" value="{{request('from') ?? ''}}">
                </div>

                <!-- Date To -->
                <div class="col-md-3">
                    <label class="form-label">To Date</label>
                    <input type="date" name="to" class="form-control" value="{{request('to') ?? ''}}">
                </div>

                <!-- Start Time -->
                <div class="col-md-3">
                    <label class="form-label">Start Time:</label>
                    <select id="start_time" name="start_time" class="form-control">
                        <option value="">Select</option>

                    @php
                        $start = strtotime("09:00");
                        $end = strtotime("23:30");
                    @endphp

                    @for ($time = $start; $time <= $end; $time += 1800)

                        <option value="{{ $time }}" {{request('start_time') == $time ? 'selected' : ''}}>
                            {{ date('h:i A', $time) }}
                        </option>

                    @endfor

                    </select>
                </div>

                <!-- End Time -->
                <div class="col-md-3">
                    <label class="form-label">End Time</label>
                    <select id="end_time" name="end_time" class="form-control">
                        <option value="">Select</option>

                    @for ($time = $start; $time <= $end; $time += 1800)

                        <option value="{{ $time }}" {{request('end_time') == $time ? 'selected' : ''}}>
                            {{ date('h:i A', $time) }}
                        </option>

                    @endfor
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
            @include('slots.data')
                </div>
            </div>
            
            

        </div><!--/.row-->
    </div>

@endsection