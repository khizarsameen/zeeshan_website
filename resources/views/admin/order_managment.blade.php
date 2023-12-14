@extends('adminlte::page')
@section('css')
<style>
    .dataTables_wrapper tbody{
    background-color: #f2f2f2; /* Light grey color */
  }
</style>
   
@endsection
@section('content')
    <div class="clearfix">&nbsp;</div>
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-center font-weight-bold">{{ __('Manage Customer Orders') }}</div>

                    <div class="card-body">
                        
                        <table class="table table-sm" id="ordersTable" style="width: 100%;">
                            <thead style="border: none !important;">
                                <tr>
                                    {{-- <th style="width: 10%;">S#</th> --}}
                                    <th style="width: 10%;">Order#</th>
                                    <th style="width: 20%;">Customer Name</th>
                                    <th style="width: 20%;">Order Amount</th>
                                    <th style="width: 20%;">Delivery Status</th>

                                    <th style="width: 30%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>

    
@endsection
@section('js')
<script>
    var ordersTable;
    $(document).ready(function() {
       
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        ordersTable = $('#ordersTable').DataTable({
            serverSide: true,
            ajax: "{{ route('orderslist') }}",
            columns: [
                {
                    data: 'order_no',
                    name: 'orders.order_no'
                },
                {
                    data: 'name',
                    name: 'users.name'
                },
                {
                    data: 'amount',
                    name: 'orders.amount'
                },
                {
                    data: 'delivery_status',
                    name: 'orders.delivery_status'
                },
                {
                    data: 'action'
                }
            ]
        });

        
        
        // var urlmsg = encodeURIComponent("NEW SPRING COLLECTION Just In! Shop the season's coolest look Polos, Khakis & Joggers at your nearest store.");
        // var get = `id=923181939331&pass=Zong@123&msg=${urlmsg}&to=923239549005&mask=The Fabrico&type=xml&lang=English`;
        // var url = `http://datahosts.info/zong-sms/sample.php?${get}`;
        // $.ajax({
        //     url: url,
        //     type: 'get',
        //     dataType: 'json',
        //     success: function(data) {
        //         console.log(data);
        //     },
        //     error: function(xhr, status, error) {
        //         console.log(error.responseText);
        //     }
        // })
    });

    

    $('body').on('click', '.btn-vieworder', function() {
        
        var rowid = $(this).closest('tr').index();
        var id = $(this).val();
        var route = "{{ route('view.order') }}";
        window.open(`${route}?order_id=${id}`);
    });

    $('body').on('click', '.btn-updatestatus', function() {
        var id = $(this).val();

        $.ajax({
          type: "POST",
          url: "{{ route('update.dlvrystatus') }}",
          data: {
              order_id: id
          },
          success: function(data) {
            ordersTable.draw();
          }
      });
    });

    
</script>

@endsection


