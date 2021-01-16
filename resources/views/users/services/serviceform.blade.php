@extends('layouts.app', [
    'namePage' => 'Add Service',
    'class' => 'sidebar-mini',
    'activePage' => 'services',
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
            <h4 class="card-title">{{ __('Add Service') }}</h4>
            <div class="col-12 mt-2">
              @include('alerts.success')
              @include('alerts.errors')
            </div>
          </div>
          <div class="card-body">
            <div class="toolbar">
              <!--        Here you can write extra buttons/actions for the toolbar              -->
            </div>

            <form id="" method="post" action="/add_service">
              {{ csrf_field() }}

              <div class="form-group">
                <label for="service_date_in">Service Date</label>
                <input type="date" id="service_date_in" name="service_date_in" class="form-control" required>
              </div>

              <label for="">Customer Name</label>
              <select class="form-control" name="service_cust_id" value="" required>
                <option selected="select" disabled value="0">Select Customer</option>
                    @foreach($customers as $rows)
                        <option value="{{$rows->cust_id}}">{{$rows->cust_name}}</option>
                    @endforeach
              </select>

              <div class="form-group">
                <label for="device_name">Device Name</label>
                <input type="text" id="device_name" name="device_name" class="form-control" required>
              </div>

              <div class="form-group">
                <label for="device_model">Device Model</label>
                <input type="text" id="device_model" name="device_model" class="form-control" required>
              </div>

              <div class="form-group">
                <label for="device_color">Device Color</label>
                <input type="text" id="device_color" name="device_color" class="form-control" required>
              </div>

              <label for="">Item </label>
              <select class="form-control picker" name="service_item_id" data-live-search="true">
                <option selected="select" disabled value="0">Select Item</option>
                @foreach($inventory as $row)
                <option value="{{$row->item_id}}">{{$row->item_name}}</option>
                @endforeach
              </select>
                        
              <div class="form-group">
                <label for="service_desc">Service Description</label>
                <input type="text" id="service_desc" name="service_desc" class="form-control" required>
              </div>

              <div class="form-group">
                <label for="total_amount">Total Amount</label>
                <input type="text" id="total_amount" name="total_amount" class="form-control" required>
              </div>

              <div class="form-group">
                <label for="amount_received">Amount Received</label>
                <input type="text" id="amount_received" name="amount_received" class="form-control" required>
              </div>
              
              <div class="form-group">
                <label for="balance">Balance</label>
                <input type="text" id="balance" name="balance" class="form-control" required>
              </div>

              <label for="status">Status</label>
              <select class="form-control" name="status" value="" required>
                   <option selected="select" disabled value="0">Status</option>
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

      