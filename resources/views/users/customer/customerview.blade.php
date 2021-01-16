@extends('layouts.app', [
    'namePage' => 'Customer List',
    'class' => 'sidebar-mini',
    'activePage' => 'customer',
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
              <a class="btn btn-primary btn-round text-white pull-right" href="{{ route('page.index','customer') }}">{{ __('Add Customer') }}</a>
            <h4 class="card-title">{{ __('Customer List') }}</h4>
            <div class="col-12 mt-2">
              @include('alerts.success')
              @include('alerts.errors')
            </div>
          </div>
          <div class="card-body">
            <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th style='font-size:16px'>{{ __('No') }}</th>
                  <th style='font-size:16px'>{{ __('ID') }}</th>
                  <th style='font-size:16px'>{{ __('Name') }}</th>
                  <th style='font-size:16px'>{{ __('Phone') }}</th>
                  <th style='font-size:16px'>{{ __('Email') }}</th>
                  <th class="disabled-sorting text-right" style='font-size:16px'>{{ __('Actions') }}</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th style='font-size:13px'>{{ __('No') }}</th>
                  <th style='font-size:13px'>{{ __('ID') }}</th>
                  <th style='font-size:13px'>{{ __('Name') }}</th>
                  <th style='font-size:13px'>{{ __('Phone') }}</th>
                  <th style='font-size:13px'>{{ __('Email') }}</th>
                  <th class="disabled-sorting text-right" style='font-size:13px'>{{ __('Actions') }}</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach($customers as $index => $customer)
                
                  <tr>
                    <td style='font-size:12px'>{{$index +1}}</td>
                    <td style='font-size:12px'>{{$customer->cust_id}}</td>
                    <td style='font-size:12px'>{{$customer->cust_name}}</td>
                    <td style='font-size:12px'>{{$customer->cust_phone}}</td>
                    <td style='font-size:12px'>{{$customer->cust_email}}</td>
 
                    <td align="center">
                      <a type="button" href="edit_customer/{{ $customer->cust_id }}" rel="tooltip" class="btn btn-success btn-icon btn-sm " data-original-title="" title="">
                        <i class="now-ui-icons ui-2_settings-90"></i>
                      </a>
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
  {{ $customers->links() }}
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