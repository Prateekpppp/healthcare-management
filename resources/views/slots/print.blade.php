@extends('print.master')

@section('body')
            <!-- TABLE -->
                <div class="table-responsive mb-5">

                    <table class="table table-bordered align-middle">

                        <thead>
                            <tr>
                                <th>Date</th>
                                <th width="50%">Time</th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr>
                                <td>{{$data->from ?? '--'}} to {{$data->to ?? '--'}}</td>
                                <td>{{date('H i A',$data->start_time) ?? '--'}} to {{date('H i A',$data->end_time) ?? '--'}}</td>
                            </tr>

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

                

