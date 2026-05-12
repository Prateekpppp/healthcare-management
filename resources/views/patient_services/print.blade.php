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
                                <td>{{$data->service->name ?? '--'}}</td>
                                <td>{{$data->description ?? '--'}}</td>
                                <td>{{$data->service->amount ?? '--'}}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="" style="height:40px;"> Total</td>
                                <td colspan="" style="height:40px;"> {{$data->service->amount ?? '--'}}</td>
                            </tr>
                            @php
                                $subTotal += $data->service->amount ?? 0;
                            @endphp

                            @if($service->service_packages->count() > 0)
                            <tr>
                                <td colspan="3" style="height:40px;"> Packages</td>
                            </tr>
                            @foreach($data->packageSales as $packageSale)
                            <tr>
                                <td>{{$packageSale->package->name ?? '--'}}</td>
                                <td>--</td>
                                <td colspan="2">{{$packageSale->package->price ?? '--'}}</td>
                            </tr>
                            @php
                                $packageSubtotal += $packageSale->package->price ?? 0;
                                $subTotal += $packageSubtotal ?? 0;
                            @endphp
                            @endforeach
                            <tr>
                                <td></td>
                                <td colspan="" style="height:40px;"> Package total</td>
                                <td colspan="" style="height:40px;"> {{$packageSubtotal ?? '--'}}</td>
                            </tr>
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

                

