@extends('layouts.app', [
    'namePage' => 'Edit Inventory',
    'class' => 'sidebar-mini',
    'activePage' => 'inventoryedit',
    'activeNav' => '',
])

@section('content')

  <div class="panel-header">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
         <div class="card-header">
            <h4 class="card-title">{{ __('Update Inventory Details') }}</h4>
            <div class="col-12 mt-2">
              @include('alerts.success')
              @include('alerts.errors')
            </div>
          </div> 
          <div class="card-body">
            <form id="" method="post" action="/updateinventory/{{ $inventory[0]->item_id }}">

            {{ csrf_field() }}

              <div class="form-group">
                <label for="item_name">Item Name</label>
                <input type="text" id="item_name" name="item_name" class="form-control" value="{{$inventory[0]->item_name}}">
              </div>
              <div class="form-group">
                <label for="item_date_in">Item Date In</label>
                <input type="date" id="item_date_in" name="item_date_in" class="form-control" value="{{$inventory[0]->item_date_in}}" placeholder="12/12/2012">
              </div>
              <div class="form-group">
                <label for="item_price">Price</label>
                <input type="text" id="item_price" name="item_price" class="form-control" value="{{$inventory[0]->item_price}}">
              </div>
              <div class="form-group">
                <label for="item_qty">Quantity</label>
                <input type="text" id="item_qty" name="item_qty" class="form-control" value="{{$inventory[0]->item_qty}}">
              </div>
              
              <input type="submit" name="submit" class="btn btn-primary btn-round btn-lg btn-block mb-3" value="Update">
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