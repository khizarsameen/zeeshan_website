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
                    <div class="card-header text-center font-weight-bold">{{ __('Manage Items') }}</div>

                    <div class="card-body">
                        
                        <table class="table table-sm" id="myTable" style="width: 100%;">
                            <thead style="border: none !important;">
                                <tr>
                                    <th style="width: 10%;">S#</th>
                                    <th style="width: 30%;">Title</th>
                                    <th style="width: 20%;">Price</th>
                                    <th style="width: 40%;">Action</th>
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
@include('admin.itemModal')
@section('js')
<script>
    var itemsTable;
    $(document).ready(function() {
       
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        itemsTable = $('#myTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    text: 'Add New Item',
                    className: 'btn btn-primary',
                    action: function ( e, dt, node, config ) {
                        $('#itemModal .modal-title').text('Add New Item'); 
                        $('#itemForm').trigger('reset');
                        $('#itemForm input').removeClass('is-invalid');


                        $('#itemModal label[for="item_image"]').text('Select Image');    
                        $('.cimgBtn').hide();   
                        $('#itemModal').modal('show');       
                    }
                }
            ],
            serverSide: true,
            ajax: "{{ route('items.index') }}",
            columns: [{
                    data: 'id'
                },
                {
                    data: 'title'
                },
                {
                    data: 'price'
                },
                {
                    data: 'action'
                }
            ],
            initComplete: function() { 
                var btns = $('.dt-button');
                btns.removeClass('dt-button');
            },
        });

        $('#itemForm').submit(function(e) {
            e.preventDefault();

            
            
            $('#saveItem').hide();
            $('#itemForm input').removeClass('is-invalid');
            $('.alert-danger.items').fadeOut(function() {
                $(this).html("");
            });

            var fd = new FormData($('#itemForm')[0]);
            
            $.ajax({

                data: fd,
                url: "{{ route('items.store')}}",
                cache: false,
                processData: false,
                contentType: false,
                type: 'POST',
                dataType: "json",
                success: function(data) {

                    $('#saveItem').show();
                    
                    
                    $('#itemForm').trigger('reset');
                    $('#item_id').val("");
                    $('#itemForm input').removeClass('is-invalid');

                    
                    if ($('#saveItem').val() == 'update') {
                        Swal.fire({
                                icon: 'success',
                                text: 'Item updated successfully',
                                timer: 1400,
                                didClose: () => {
                                    $('#itemModal').modal('hide');
                                }
                            });            
            
                    } else {
                        Swal.fire({
                                icon: 'success',
                                text: 'Item saved successfully',
                                timer: 1400
                                
                            });
                        
                    }
                    itemsTable.draw();



                },
                error: function(data) {
                    $('#saveItem').show();
                    var subdata = JSON.parse(data.responseText);
                    if (data.status === 422) {
                        jQuery.each(subdata.errors, function(key, value) {
                            $(`#${key}`).addClass('is-invalid');
                            $(`.invalid-feedback.${key}`).text(value);
                            $(`.invalid-feedback.${key}`).show();

                        });
                    } else if (data.status === 500) {
                        var err = "";
                        jQuery.each(subdata.errors, function(key, value) {
                            err = err + value + "</br>";
                        });

                        Swal.fire({
                            icon: 'error',
                            html: err
                        });
                    } else {
                        $('.alert-danger.movie').html(subdata.message);
                        $('.alert-danger.movie').fadeIn();

                    }



                }
            })
        })
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

    $('input[type="file"]').change(function(e){
        var fileName = e.target.files[0].name;
        $('.custom-file-label').html(fileName);
    });

    $('body').on('click', '.btn-edit', function() {
        
        var rowid = $(this).closest('tr').index();
        var id = $(this).val();

        $.get("{{ route('items.index') }}" + '/' + id + '/edit', function(data) {

            $('#itemModal .modal-title').text('Edit Item');
            $('#itemForm').trigger('reset');
            $('#item_id').val(id);
            $('#title').val(data.title);
            $('#description').val(data.description);
            $('#price').val(data.price);
            $('#itemModal label[for="item_image"]').text('Change Image');       
            $('.cimgBtn').prop('href', data.image_url);   
            $('.cimgBtn').show();   

            $('#itemForm input').removeClass('is-invalid');
            $('#saveItem').val('update');
            $('#itemModal').modal('show');
            $('#itemModal').on('shown.bs.modal', function() {
                $('#item_name').trigger('focus');
            });
        }).fail(function(data) {
            console.log(data);
        });


    });

    $('body').on('click', '.btn-delete', async function() {
        // if($('#pt_type :selected').text() != "General"){
        //     Swal.fire({
        //         icon: 'error',
        //         text: 'select General to delete procedure !',

        //     });
        //     return;
        // }
        var rowid = $(this).closest('tr').index();
        var id = $(this).val();

        try {
            var allowed = await deleteAllowed(id);

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {

                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('items.store')}}" + "/" + id,
                        data: {
                            'check': false
                        },
                        success: function(data) {
                            itemsTable.draw();


                            Swal.fire({
                                icon: 'success',
                                text: 'Item has been deleted.',
                                timer: 1400,
                                // didClose: () => {
                                //     $('#zoneModal').modal('hide');
                                // }
                            });
                        },
                        error: function(data) {
                            var subdata = JSON.parse(data.responseText);
                            jQuery.each(subdata.errors, function(key, value) {


                            });


                        }
                    })

                }
            });

        } catch (error) {
            var error = JSON.parse(error.responseText);
            var errors = '';
            jQuery.each(error.errors, function(key, value) {
                errors += value;
            });
            Swal.fire({
                icon: 'error',
                html: errors
            });
        }





    });

    function deleteAllowed(id) {
        return new Promise(function(resolve, reject) {
            $.ajax({
                type: "DELETE",
                url: "{{ route('items.store')}}" + "/" + id,
                data: {
                    'check': true
                },
                success: function(data) {
                    resolve(data);

                },
                error: function(error) {
                    reject(error);
                }
            })
        });
    }

</script>

@endsection


