@extends('layouts.app', [
    'namePage' => 'Customer',
    'class' => 'sidebar-mini',
    'activePage' => 'customer',
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
            <h4 class="card-title">{{ __('Customer Registration Form') }}</h4>
            <div class="col-12 mt-2">
              @include('alerts.success')
              @include('alerts.errors')
            </div>
          </div>
          <div class="card-body">
            <div class="toolbar">
              <!--        Here you can write extra buttons/actions for the toolbar              -->
            </div>

            <form id="addcustomer" method="post" action="/addcustomer">
              {{ csrf_field() }}

              <div class="form-group">
                <label for="cust_name">Customer Name</label>
                <input type="text" id="cust_name" name="cust_name" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="cust_phone">Telephone No.</label>
                <input type="tel" id="cust_phone" name="cust_phone" class="form-control" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required>
              </div>
              <div class="form-group">
                <label for="cust_email">Email</label>
                <input type="email" id="cust_email" name="cust_email" class="form-control" required>
              </div>
              
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

