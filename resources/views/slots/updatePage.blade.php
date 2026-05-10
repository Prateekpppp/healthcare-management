@extends('master')

@section('body')


    <div class="col-md-12 main">
       
        <div class="row">
            <div class="col-lg-12 d-flex flex-row justify-content-between align-items-center">
                <h2 class="page-header">Slots</h2>
                <a href="{{isset($data) ? route('pages.slots',['id' => $data->patient_id]) : route('pages.slots')}}" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> 
                    {{isset($data) ? 'Patient Slots' : 'View All'}}
                </a>
            </div>
        </div>
        
        <div class="row">
            
            <div class="col-12 grid-margin">
                <div class="card">
                    <form class="row" action="{{route('post.updateSlot')}}" method="post">
                        @csrf
                        @if(isset($data))
                        <input name="id" type="hidden" class="form-control" id="id" value="{{$data->id ?? ''}}" >
                        @endif

                        <div class="col-md-6 form-group">
                            <label>Patients:</label>

                            <select class="form-control select"
                                    name="patient_id"
                                    id="patient_id"
                                    required>

                                <option value="">Select Patient</option>

                                @foreach($patients as $patient)
                                    <option value="{{ $patient->id }}"
                                        @if(isset($request->patient_id))
                                            {{ $request->patient_id == $patient->id ? 'selected' : '' }}
                                        @else
                                            {{ ($data->patient_id ?? '') == $patient->id ? 'selected' : '' }}>
                                        @endif

                                        ID: {{ $patient->id }}.
                                        {{ $patient->first_name }}
                                        {{ $patient->last_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="col-md-6 form-group">
                            <label>Inventory:</label>

                            <select class="form-control select"
                                    name="inventory_id"
                                    id="inventory_id"
                                    required>

                                <option value="">Select Inventory</option>

                                @foreach($inventories as $inventory)
                                    <option value="{{ $inventory->id }}"
                                        @if(isset($request->inventory_id))
                                            {{ $request->inventory_id == $inventory->id ? 'selected' : '' }}
                                        @else
                                            {{ ($data->inventory_id ?? '') == $inventory->id ? 'selected' : '' }}>
                                        @endif

                                        ID: {{ $inventory->id }}.
                                        {{ $inventory->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class=" col-md-4 form-group">
                            <label>Booking Date:</label>
                            <input type="date" name="booking_date" class="form-control" id="booking_date" required="" value="{{$data->booking_date ?? ''}}">
                        </div>
                        
                        <div class=" col-md-4 form-group">
                            <label>From:</label>
                            <input type="date" name="from" class="form-control" id="from" required="" value="{{$data->from ?? ''}}">
                        </div>
                        
                        <div class=" col-md-4 form-group">
                            <label>To:</label>
                            <input type="date" name="to" class="form-control" id="to" required="" value="{{$data->to ?? ''}}">
                        </div>
                        
                        <div class=" col-md-4 form-group">
                            <label>Start Time:</label>
                            <select id="start_time" name="start_time" class="form-control">

                            @php
                                $start = strtotime("09:00");
                                $end = strtotime("23:30");
                            @endphp

                            @for ($time = $start; $time <= $end; $time += 1800)

                                <option value="{{ $time }}" {{isset($data->start_time) && $data->start_time == $time ? 'selected' : ''}}>
                                    {{ date('h:i A', $time) }}
                                </option>

                            @endfor

                            </select>
                            {{-- <input type="text" class="form-control timepicker" id="start_time" name="start_time" value="{{$data->start_time ?? ''}}"> --}}
                        </div>
                        
                        <div class=" col-md-4 form-group">
                            <label>End Time:</label>
                            <select id="end_time" name="end_time" class="form-control">

                            @for ($time = $start; $time <= $end; $time += 1800)

                                <option value="{{ $time }}" {{isset($data->end_time) && $data->end_time == $time ? 'selected' : ''}}>
                                    {{ date('h:i A', $time) }}
                                </option>

                            @endfor

                            </select>
                            {{-- <input type="text" class="form-control timepicker" id="end_time" name="end_time" value="{{$data->end_time ?? ''}}"> --}}
                        </div>

                        <div class="col-md-12">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                        
                    </form>
                </div>
            </div>
            
            

        </div><!--/.row-->
    </div>

@endsection

@section('js')
    
    <script>
        flatpickr(".timepicker", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "h:i K",
            minTime: "09:00",
            maxTime: "18:00"
        });
        
        $('#from').on('change',function(){
            callApi('get', `{{ route('get.avaiableSlots') }}`, {'from': $(this).val(), 'inventory_id': $('#inventory_id').val()}, (response) => {
                $('#start_time').find('option').prop('disabled', false);
                $('#end_time').find('option').prop('disabled', false);
                $(response.slots).each(function(index, slot){
                    $('#start_time').find('option[value="'+slot.start_time+'"]').prop('disabled', true);
                    $('#end_time').find('option[value="'+slot.end_time+'"]').prop('disabled', true);
                });
            });
        })
    </script>
@endsection