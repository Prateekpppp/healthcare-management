@extends('print.master')

@section('body')
            <!-- TABLE -->
                <div class="table-responsive mb-5">

                    <table class="table table-bordered align-middle">

                        <thead>
                            <tr>
                                <th>NAME</th>
                                <th width="50%">DESCRIPTION</th>
                                <th>UNIT PRICE</th>
                            </tr>
                        </thead>

                        <tbody>

                            @php
                                $subTotal = 0;
                                $packageSubtotal = 0;
                            @endphp
                            <tr>
                                <td>{{$data->patient->first_name ?? '--'}}</td>
                                <td>{{$data->description ?? '--'}}</td>
                                <td>{{$data->doctor->fee ?? '--'}}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="" style="height:40px;"> Total</td>
                                <td colspan="" style="height:40px;"> {{$data->doctor->fee ?? '--'}}</td>
                            </tr>
                            @php
                                $subTotal += $data->doctor->fee ?? 0;
                            @endphp

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

                    <div class="col-md-6">

                        <table class="table totals-table w-100">

                            <tr>
                                <td>Subtotal</td>
                                <td class="text-end">{{$subTotal ?? '--'}}</td>
                            </tr>

                            {{-- <tr>
                                <td>Tax</td>
                                <td class="text-end">₹1,500</td>
                            </tr> --}}

                            <tr>
                                <td>Discount</td>
                                <td class="text-end">{{$data->discount ?? '--'}}</td>
                            </tr>

                            <tr>
                                <td class="balance-text">Balance Due</td>
                                <td class="text-end balance-text">{{$subTotal - (float) (($data->discount * $subTotal) / 100)}}</td>
                            </tr>

                        </table>

                    </div>

                </div>
@endsection

                

