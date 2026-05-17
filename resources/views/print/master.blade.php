<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Appointment Invoice</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background:#f5f5f5;
            font-family: Arial, Helvetica, sans-serif;
        }

        .invoice-wrapper{
            max-width:950px;
            margin:30px auto;
            background:#fff;
            border:1px solid #ddd;
        }

        .top-bar,
        .bottom-bar{
            height:12px;
            background:#5fd73d;
        }

        .invoice-body{
            padding:40px;
        }

        .logo-circle{
            width:65px;
            height:65px;
            border-radius:50%;
            background:#777;
            color:#fff;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:12px;
            font-weight:bold;
        }

        .company-name{
            font-size:20px;
            font-weight:700;
            margin-bottom:5px;
        }

        .invoice-title{
            font-size:34px;
            font-weight:300;
            color:#555;
        }

        .small-text{
            font-size:13px;
            color:#666;
            line-height:1.8;
        }

        .section-title{
            font-size:14px;
            font-weight:700;
            border-bottom:1px solid #ddd;
            padding-bottom:8px;
            margin-bottom:10px;
        }

        .table thead th{
            background:#5fd73d;
            color:#fff;
            border:none;
            font-size:13px;
            padding:12px;
        }

        .table tbody td{
            font-size:13px;
            color:#555;
            padding:12px;
        }

        .totals-table td{
            border:none;
            padding:8px 0;
            font-size:14px;
        }

        .balance-text{
            font-size:20px;
            font-weight:bold;
        }

        @media(max-width:768px){

            .invoice-body{
                padding:20px;
            }

            .invoice-title{
                font-size:28px;
                margin-top:20px;
            }

        }
        
        
.invoice-table {
    width: 100%;
    border-collapse: collapse;
    table-layout: fixed;
}

.invoice-table th {
    background: #d95c1a;
    color: #fff;
    padding: 8px;
    font-size: 12px;
    border: 1px solid #ccc;
    text-align: center;
}

.invoice-table td {
    border: 1px solid #ddd;
    padding: 6px;
    font-size: 12px;
}

.invoice-table tbody tr:nth-child(even) td {
    background: #f5f5f5;
}

.text-end {
    text-align: right;
}

.text-center {
    text-align: center;
}


/* PRINT STYLE */

@media print {

    * {
        -webkit-print-color-adjust: exact !important;
        print-color-adjust: exact !important;
    }

    html, body {
        width: 210mm;
        height: 297mm;
        margin: 0;
        padding: 0;
        background: #fff;
        overflow: hidden;
        font-size: 11px;
    }

    .invoice-container {
        width: 100%;
        /* padding: 10mm; */
        zoom: 0.85;
    }

    .invoice-table th {
        background: #d95c1a !important;
        color: #ffffff !important;
        border: 1px solid #999 !important;
    }

    .invoice-table td {
        border: 1px solid #ccc !important;
    }

    .invoice-table tbody tr:nth-child(even) td {
        background: #f5f5f5 !important;
    }

    table {
        width: 100% !important;
        border-collapse: collapse !important;
    }

    tr, td, th {
        page-break-inside: avoid !important;
    }

    @page {
        size: A4 portrait;
        margin: 0mm;
    }

    .no-print {
        display: none !important;
    }
}

    </style>
</head>
<body>
<div class="invoice-container">
    <div class="container">
    <div class="text-center my-3 no-print d-flex justify-content-between gap-2">

        <button onclick="history.back()" class="btn btn-secondary">
            Back
        </button>

        <button onclick="printInvoice()" class="btn btn-success">
            Print
        </button>

    </div>

        <div class="invoice-wrapper">

            <div class="top-bar"></div>

            <div class="invoice-body">

                <!-- HEADER -->
                <div class="row align-items-start mb-5">

                    <div class="col-md-9">

                        <div class="d-flex gap-3">

                            {{-- <div class="logo-circle"> --}}
                                <img class="logo-circle" src="{{asset('/').$hospital->logo}}" alt="photo" width="50px" height="50px">
                            {{-- </div> --}}

                            <div>
                                <div class="company-name">
                                    {{$hospital->name ?? 'Hospital Name'}}
                                </div>

                                <div class="small-text">
                                    {{$hospital->address ?? 'Hospital Address'}} <br>
                                    +91 {{$hospital->contact ?? 'Hospital Contact'}} <br>
                                    {{$hospital->email ?? 'Hospital Email'}}
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="col-md-3 text-md-end mt-4 mt-md-0">

                        <div class="invoice-title">
                            {{$invoice_type ?? 'Invoice'}}
                        </div>

                        <div class="small-text mt-3">
                            @if(isset($data->invoice_no))
                            <strong>{{$invoice_type ?? 'Invoice'}} #:</strong> {{$data->invoice_no ?? 'N/A'}} <br>
                            @endif
                            <strong>Date:</strong> {{$data->date ?? ($data->created_at ?? 'N/A')}}
                        </div>

                    </div>

                </div>

                <!-- PAYMENT TERMS -->
                {{-- <div class="row mb-4">

                    <div class="col-12 text-md-end">
                        <div class="small-text">
                            Payment Terms: Due upon receipt
                        </div>
                    </div>

                </div> --}}

                <!-- BILLING -->
                <div class="row mb-5">

                    <div class="col-md-6 mb-4 mb-md-0">

                        <div class="section-title">
                            BILL TO
                        </div>

                        <div class="small-text">
                            {{$data->patient->first_name ?? '--'}} <br>
                            {{$data->patient->address ?? '--'}} <br>
                            {{-- Address Line 2 <br>
                            City, State --}}
                        </div>

                    </div>

                </div>
@yield('body')
            </div>

            <div class="bottom-bar"></div>

        </div>

    </div>
</div>

<script>
    function printInvoice() {

        const printButton = document.querySelector('.no-print');

        printButton.style.display = 'none';

        window.print();

        setTimeout(() => {
            printButton.style.display = 'block';
        }, 500);
    }
</script>
</body>
</html>