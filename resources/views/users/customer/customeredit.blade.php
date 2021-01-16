@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Edit customer',
    'activePage' => 'customer',
    'activeNav' => '',
])

@section('content')
    <div class="panel-header">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Update Customer Details') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="addcustomer" method="post" action="/updatecustomer/{{ $customers[0]->cust_id }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="cust_name">Customer Name</label>
                                <input type="text" id="cust_name" name="cust_name" class="form-control" value="{{ $customers[0]->cust_name}}" >
                            </div>
                            <div class="form-group">
                                <label for="cust_phone">Telephone No.</label>
                                <input type="tel" id="cust_phone" name="cust_phone" class="form-control" value="{{ $customers[0]->cust_phone}}" placeholder="0123560914" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" >
                            </div>
                            <div class="form-group">
                                <label for="cust_email">Email</label>
                                <input type="email" id="cust_email" name="cust_email" class="form-control" value="{{ $customers[0]->cust_email}}" >
                            </div>
                            
                            <input type="submit" name="submit" class="btn btn-primary btn-round btn-lg btn-block mb-3" value="Update Customer">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection