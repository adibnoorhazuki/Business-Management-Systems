@extends('layouts.app', [
    'namePage' => 'Inventory List',
    'class' => 'sidebar-mini',
    'activePage' => 'inventory',
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
              <a class="btn btn-primary btn-round text-white pull-right" href="{{ route('page.index','inventory') }}">{{ __('Add Inventory') }}</a>
            <h4 class="card-title">{{ __('View Inventory Details') }}</h4>
            <div class="col-12 mt-2">
              @include('alerts.success')
              @include('alerts.errors')
            </div>
          </div>
          <div class="card-body">
            <div class="toolbar">
              <!--        Here you can write extra buttons/actions for the toolbar              -->
            </div>
            <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th style='font-size:16px'>{{ __('No') }}</th>
                  <th style='font-size:16px'>{{ __('ID') }}</th>
                  <th style='font-size:16px'>{{ __('Inventory Name') }}</th>
                  <th style='font-size:16px'>{{ __('Date In') }}</th>
                  <th style='font-size:16px'>{{ __('Price') }}</th>
                  <th style='font-size:16px'>{{ __('Quantity') }}</th>
                  <th class="disabled-sorting text-right" style='font-size:16px'>{{ __('Actions') }}</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th style='font-size:13px'>{{ __('No') }}</th>
                  <th style='font-size:13px'>{{ __('ID') }}</th>
                  <th  style='font-size:13px'>{{ __('Inventory Name') }}</th>
                  <th  style='font-size:13px'>{{ __('Date In') }}</th>
                  <th  style='font-size:13px'>{{ __('Price') }}</th>
                  <th  style='font-size:13px'>{{ __('Quantity') }}</th>
                  <th class="disabled-sorting text-right"  style='font-size:13px'>{{ __('Actions') }}</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach($inventory as $index => $row)
                  <tr>
                    <td  style='font-size:12px'>{{$index +1}}</td>
                    <td  style='font-size:12px'>{{$row->item_id}}</td>
                    <td  style='font-size:12px'>{{$row->item_name}}</td>
                    <td  style='font-size:12px'>{{ \Carbon\Carbon::parse ($row->item_date_in)->format('d/m/Y')}}</td>
                    <td  style='font-size:12px'>RM {{$row->item_price}}</td>
                    <td  style='font-size:12px'>{{$row->item_qty}}</td>
                      
                    <td>
                        <a type="button" href="edit_inventory/{{ $row->item_id }}" rel="tooltip" class="btn btn-success btn-icon btn-sm " data-original-title="" title="">
                          <i class="now-ui-icons ui-2_settings-90"></i>
                        </a>
                        <form action="/delete_inventory/{{ $row->item_id }}" style="display:inline-block;" class ="delete-form">
                            <button type="button" rel="tooltip" class="btn btn-danger btn-icon btn-sm delete-button" data-original-title="" title="" onclick="confirm('{{ __('Are you sure you want to delete this user?') }}') ? this.parentElement.submit() : ''">
                                <i class="now-ui-icons ui-1_simple-remove"></i>
                            </button>
                      </form>
                    </td>
                    
                   
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- end content-->
        </div>
        <!--  end card  -->
      </div>
      <!-- end col-md-12 -->
    </div>
    <!-- end row -->
  </div>
  {{ $inventory->links() }}
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      $(".delete-button").click(function(){ 
        var clickedButton = $( this );
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonClass: 'btn btn-success',
        cancelButtonClass: 'btn btn-danger',
        confirmButtonText: 'Yes, delete it!',
        buttonsStyling: false
      }).then((result) => {
        if (result.value) {
          clickedButton.parents(".delete-form").submit();
        }
      })

      })
      $('#datatable').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
          [10, 25, 50, -1],
          [10, 25, 50, "All"]
        ],
        responsive: true,
        language: {
          search: "_INPUT_",
          searchPlaceholder: "Search records",
        }

      });

      var table = $('#datatable').DataTable();

      // Edit record
      table.on('click', '.edit', function() {
        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')) {
          $tr = $tr.prev('.parent');
        }

        var data = table.row($tr).data();
        alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
      });

      // Delete a record
      table.on('click', '.remove', function(e) {
        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')) {
          $tr = $tr.prev('.parent');
        }
        table.row($tr).remove().draw();
        e.preventDefault();
      });

      //Like record
      table.on('click', '.like', function() {
        alert('You clicked on Like button');
      });
    });
  </script>
@endpush