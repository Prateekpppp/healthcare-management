@extends('print.master')

@section('body')
            <!-- TABLE -->
                <div class="table-responsive mb-5">

                    <table class="table table-bordered align-middle">

                        <thead>
                            <tr>
                                <th colspan="2">Desciption</th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr>
                                <th colspan="2">Therapy</th>
                            </tr>
                            <tr>
                                <th>NAME</th>
                                <th width="50%">No. of Days</th>
                            </tr>
                            <tr>
                                <td>{{$data->service->name ?? '--'}}</td>
                                <td>{{$data->no_of_days ?? '--'}}</td>
                            </tr>

                            @if(isset($medicines) && $medicines->count() > 0)
                            <tr>
                                <th colspan="2">Medicines</th>
                            </tr>
                            <tr>
                                <th>NAME</th>
                                <th width="50%">Description</th>
                            </tr>
                            @foreach($medicines as $medicine)
                            <tr>
                                <td>{{$medicine->name ?? '--'}}</td>
                                <td>{{$medicine->description ?? '--'}}</td>
                            </tr>
                            @endforeach
                            @endif
                            
                        </tbody>

                    </table>

                </div>
                <!-- FOOTER -->
                <div class="row">

                    <div class="col-md-6 mb-4 mb-md-0">

                        <div class="section-title">
                            Notes
                        </div>

                        {{-- <div class="small-text">
                            Thank you for your business. <br>
                            Please make payment before the due date.
                        </div> --}}

                    </div>

                </div>
@endsection

                

