@extends('master')

@section('body')


    <div class="col-md-12 main">
       
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-12 d-flex flex-row justify-content-between align-items-center">
                    <h2 class="page-header">Invoices</h2>
                    <a href="{{isset($data) ? route('pages.invoices',['id' => $data->patient_id]) : route('pages.invoices')}}" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> {{isset($data) ? 'Patient Invoices' : 'View All'}}
                    </a>
                </div>
            </div>
        </div>
        
        <div class="row">
            
            <div class="col-12 grid-margin">
                <div class="card">
                    <form action="{{ route('pages.updateInvoice') }}" method="post" class="row">

                        @csrf

                        @if(isset($data))
                            <input type="hidden" name="id" id="id" value="{{ $data->id ?? '' }}">
                        @endif


                        <div class="col-md-6 form-group">
                            <label>Services:</label>

                            <select class="form-control select"
                                    name="service_id"
                                    id="service_id">

                                <option value="">Select Services</option>

                                @foreach($services as $service)
                                    <option value="{{ $service->id }}"
                                        {{ ($data->service_id ?? '') == $service->id ? 'selected' : '' }}>

                                        {{ $service->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

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

                        <div class="col-md-3 form-group">
                            <label>Payment Type:</label>

                            <select name="payment_mode" class="form-control">

                                <option value="Cash"
                                    {{ ($data->payment_mode ?? '') == 'Cash' ? 'selected' : '' }}>
                                    Cash
                                </option>

                                <option value="Cheque"
                                    {{ ($data->payment_mode ?? '') == 'Cheque' ? 'selected' : '' }}>
                                    Cheque
                                </option>

                                <option value="Credit"
                                    {{ ($data->payment_mode ?? '') == 'Credit' ? 'selected' : '' }}>
                                    Credit
                                </option>

                            </select>
                        </div>

                        <div class=" col-md-4 form-group">
                            <label>Tansaction No.:</label>
                            <input type="text" name="transaction_no" class="form-control" id="transaction_no" value="{{$data->transaction_no ?? ''}}">
                        </div>
                        
                        <div class="col-md-2 form-group">
                            <label>Invoice No:</label>

                            <input type="text"
                                class="form-control"
                                name="invoice_no"
                                value="{{ $data->invoice_no ?? $setting->invoice_prefix . rand('1000','9999') }}"
                                readonly>
                        </div>

                        <div id="payment" style="display:block;">

                            <div class="col-md-3 form-group">
                                <label>Doctor Reffered:</label>

                                <select name="doctor_id" class="form-control">

                                    <option value="">Select Doctor</option>

                                    @foreach($doctors as $doctor)
                                        <option value="{{ $doctor->id }}"
                                            {{ ($data->doctor_id ?? '') == $doctor->id ? 'selected' : '' }}>

                                            {{ $doctor->employee->first_name }}
                                            {{ $doctor->employee->last_name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="col-md-2 form-group">
                                <label>Price :</label>

                                <input type="text"
                                    name="total_amount"
                                    class="form-control"
                                    id="total_amount"
                                    value="{{ $data->total_amount ?? '' }}"
                                    required>
                            </div>
                            
                            <div class="col-md-2 form-group">
                                <label>Discount % :</label>

                                <input type="text"
                                    name="discount"
                                    class="form-control"
                                    id="discount"
                                    value="{{ $data->discount ?? '' }}"
                                    required>
                            </div>

                        </div>

                        <div class="col-md-12 form-group"
                            id="comment"
                            style="display:block;">

                            <textarea class="form-control"
                                    name="comment"
                                    placeholder="Comment...">{{ $data->comment ?? '' }}</textarea>
                        </div>

                        <div class="col-md-12 form-group">
                            <button type="submit" class="btn btn-primary">
                                {{ isset($data) ? 'Update Invoice' : 'Create Invoice' }}
                            </button>
                        </div>

                    </form>
                </div>
            </div>
            
            

        </div><!--/.row-->
    </div>

@endsection

@section('js')
    
    <script>
        $('#patient_id').on('change',function(){
            let id = $(this).val();
            let service_id = $('#service_id').val();
            if(!id || !service_id) return;
            callApi('get', `{{ route('get.getPatientData') }}`, {'id': id, 'service_id': service_id}, (response) => {
                $('#total_amount').val(response.total_amount);
            });
        });
    </script>
@endsection