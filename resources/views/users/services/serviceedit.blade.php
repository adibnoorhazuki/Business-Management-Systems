@extends('layouts.app', [
    'namePage' => 'Update Service',
    'class' => 'sidebar-mini',
    'activePage' => 'servicesedit',
    'activeNav' => '',
])

@section('content')

@if(\Session::has('success'))


<div class="alert">
  <h4> {{ \Session::get('success') }} </h4>
</div>

@endif
  <div class="panel-header">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">{{ __('Update Service') }}</h4>
            <div class="col-12 mt-2">
              @include('alerts.success')
              @include('alerts.errors')
            </div>
          </div>
          <div class="card-body">
            <div class="toolbar">
              <!--        Here you can write extra buttons/actions for the toolbar              -->
            </div>

            <form id="" method="post" action="/updateservice/{{ $service[0]->service_id }}">
              {{ csrf_field() }}

              <div class="form-group">
                <label for="service_date_in">Service Date</label>
                <input type="date" id="service_date_in" name="service_date_in" value="{{ $service[0]->service_date_in }}" class="form-control" disabled>
              </div>

              <div class="form-group">
                <label for="service_cust_id">Customer Name</label>
                <input type="input" id="service_cust_id"  class="form-control" name="service_cust_id" value="{{$service[0]->service_cust_id}}" disabled>
              </div>

              <div class="form-group">
                <label for="device_name">Device Name</label>
                <input type="text" id="device_name" name="device_name" value="{{ $service[0]->device_name }}" class="form-control" >
              </div>

              <div class="form-group">
                <label for="device_model">Device Model</label>
                <input type="text" id="device_model" name="device_model" value="{{ $service[0]->device_model }}" class="form-control" >
              </div>

              <div class="form-group">
                <label for="device_color">Device Color</label>
                <input type="text" id="device_color" name="device_color" value="{{ $service[0]->device_color }}" class="form-control" >
              </div>

              <div class="form-group">
                <label for="service_cust_id">Item Name</label>
                <input type="input" id="service_cust_id"  class="form-control" name="service_cust_id" value="{{$service[0]->service_cust_id}}" disabled>
              </div>

              <div class="form-group">
                <label for="service_desc">Service Description</label>
                <input type="text" id="service_desc" name="service_desc" value="{{ $service[0]->service_desc }}" class="form-control" disabled>
              </div>

              <div class="form-group">
                <label for="total_amount">Total Amount</label>
                <input type="text" id="total_amount" name="total_amount" value="{{ $service[0]->total_amount }}" class="form-control" disabled>
              </div>

              <div class="form-group">
                <label for="amount_received">Amount Received</label>
                <input type="text" id="amount_received" name="amount_received" value="{{ $service[0]->amount_received }}" class="form-control" disabled>
              </div>
              
              <div class="form-group">
                <label for="balance">Balance</label>
                <input type="text" id="balance" name="balance" value="{{ $service[0]->balance }}" class="form-control" disabled>
              </div>

              <label for="status">Status</label>
              <select class="form-control" name="status" value="{{ $service[0]->status }}" >
                   <option selected="select" disabled value="{{ $service[0]->status }}">{{ $service[0]->status }}</option>
                   <option value='Waiting for sparepart'>Waiting for sparepart</option>
                   <option value='On progress'>On progress</option>
                   <option value='Ready for pick up'>Ready for pick up</option>
              </select>

              
              <input type="submit" name="submit" class="btn btn-primary btn-round btn-lg btn-block mb-3" value="Save">
            </form>

          </div>
          <!-- end content-->
        </div>
        <!--  end card  -->
      </div>
      <!-- end col-md-12 -->
    </div>
    <!-- end row -->
  </div>

@endsection

      