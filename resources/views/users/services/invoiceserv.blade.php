@extends('layouts.app', [
    'namePage' => 'Service invoice',
    'class' => 'sidebar-mini',
    'activePage' => 'invoiceserv',
    'activeNav' => '',
])

@section('content')

@if(\Session::has('success'))
<div class="alert">
  <h4> {{ \Session::get('success') }} </h4>
</div>
@endif
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    
    
    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
        text-align: left;

    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
        text-align: left;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
        text-align: left;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(4) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: center;
    }
    
    .rtl table tr td:nth-child(3) {
        text-align: center;
    }

    .center {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 50%;
    }
    .centertext {
    text-align: center;
}
    </style>
</head>

<body>
<div class="panel-header">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">  
        <div class="card-body"> 
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="4">
                    <table>
                        <tr>
                            <td class="title">
                                <div>
                                </div>   
                            </td>
                            
                            
                            
                            @foreach ($invoiceserv as $invoiceserv) 
                            <td>Invoice #:{{ $invoiceserv->service_id }}
                            <br>Customer #:{{ $invoiceserv->service_cust_id }}</td>
                            
                                
                                
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="3">
                    <table >
                        <tr>
                            <td>
                                PhoneServices<br>
                                No 2<br>
                                Ayer Keroh
                            </td>
                            
                            
                        </tr>
                    </table>
                </td>
            </tr>
            
            
	

            
            <tr class="heading" >
                <td>
                    Device Name
                </td>
                <td>
                    Device Colour 
                </td>
                <td>
                    Description
                </td>
                
                
                <td>
                    Price
                </td>
                
            </tr>
            
            <tr class="item" >
                
                <td>
                    {{ $invoiceserv->device_model }}
                </td>
                <td>
                    {{ $invoiceserv->device_color }}
                </td>
                <td>
                    {{ $invoiceserv->service_desc }} 
                </td>
                
                <td>
                    RM {{ $invoiceserv->total_amount }} 
                </td>
                
            </tr>
            
				
            
            <tr class="total">
                <td></td>
                <td></td>
                <td>Total</td>
                <td>
                   RM {{ $invoiceserv->total_amount }} 
                </td>
            </tr>
            
            <tr class="total">
                <td></td>
                <td></td>
                <td>Total Paid</td>
                <td>RM {{ $invoiceserv->amount_received }}</td>
            </tr>

            <tr class="total">
                <td></td>
                <td></td>
                <td>Balance</td>
                <td>RM {{ $invoiceserv->amount_received - $invoiceserv->total_amount}}</td>
            </tr>
        </table>
        <div class="center" style="width:100%; max-width:300px;">
            {!! QrCode::size(300)->generate(Request::url('http://127.0.0.1:8000/status.blade.php?service_id=')) !!}
        </div>
        <div class="centertext">
        <td>scan here to track your device</td>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    @endforeach
    
</body>
</html>