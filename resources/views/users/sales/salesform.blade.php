@extends('layouts.app', [
    'namePage' => 'Add Sales',
    'class' => 'sidebar-mini',
    'activePage' => 'sales',
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
            <h4 class="card-title">{{ __('Add Sales') }}</h4>
            <div class="col-12 mt-2">
              @include('alerts.success')
              @include('alerts.errors')
            </div>
          </div>
          <div class="card-body">
            <div class="toolbar">
              <!--        Here you can write extra buttons/actions for the toolbar              -->
            </div>

            <form id="" method="post" action="/add_sales">
              {{ csrf_field() }}

              <div class="form-group">
                <label for="sales_date_in">Sales Date</label>
                <input type="date" id="sales_date_in" name="sales_date_in" class="form-control" required>
              </div>

              <label for="">Customer Name</label>
              
              <select class="form-control" name="sales_cust_id" value="" required>
                <option selected="select" disabled value="0">Select Customer</option>
                    @foreach($customers as $rows)
                        <option value="{{$rows->cust_id}}">{{$rows->cust_name}}</option>
                    @endforeach
              </select>

              <label for="">Item </label>
              <select class="form-control picker" name="sales_item_id" data-live-search="true">
                <option selected="select" disabled value="0">Select Item</option>
                @foreach($inventory as $row)
                <option value="{{$row->item_id}}">{{$row->item_name}}</option>
                @endforeach
              </select>

              <div class="form-group">
                <label for="sales_desc">Sales Description</label>
                <input type="text" id="sales_desc" name="sales_desc" class="form-control" required>
              </div>

              <div class="form-group">
                <label for="sales_total">Total Amount</label>
                <input type="text" id="sales_total" name="sales_total" class="form-control " required>
              </div>

              <div class="form-group">
                <label for="sales_amount_received">Amount Received</label>
                <input type="text" id="sales_amount_received" name="sales_amount_received" class="form-control " required>
              </div>
              
              <div class="form-group">
                <label for="sales_balance">Balance</label>
                <input type="text" id="sales_balance" name="sales_balance" class="form-control " required>
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

  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script type="text/javascript">
	$(document).ready(function(){

		$(document).on('change','.sales_item_id',function () {
			var item_id=$(this).val();

			var a=$(this).parent();
			console.log(item_id);
			var op="";
			$.ajax({
				type:'get',
				url:'{!!URL::to('findPrice')!!}',
				data:{'item_id':item_id},
				dataType:'json',//return data will be json
				success:function(data){
					console.log("item_price");
					console.log(data.item_price);

					// here price is coloumn name in products table data.coln name

					a.find('.sales_total').val(data.item_price);

          },
          error:function(){

          }
        });


      });

    });
  </script>

  <scirpt src="jquery.min.js"></script>
  <script>
  $('.form-group').on('input','.prc',function(){
    var sales_amount_received = document.getElementById("sales_amount_received").value;
      var inputVal = document.getElementById("sales_total").value;
      $('.form-group .prc').each(function(){
        var inputValue = $(this).val();
        if($.isNumeric(inputValue)){
          value = sales_amount_received - inputVal;
        }
      });
      $('#sales_balance').val(value);
  });
  form.addEventListener('submit', calculateTax, false);
  </script> -->

  

@endsection

      