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
                    <div class="card-header text-center font-weight-bold">{{ __('Manage Admin Users') }}</div>

                    <div class="card-body">
                        
                        <table class="table table-sm" id="usersTable" style="width: 100%;">
                            <thead style="border: none !important;">
                                <tr>
                                    <th style="width: 10%;">S#</th>
                                    <th style="width: 30%;">User Email</th>
                                    <th style="width: 20%;">User Name</th>
                                    <th style="width: 20%;">User Type</th>
                                    <th style="width: 20%;">Action</th>
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
@include('admin.userModal')
@section('js')
<script>
    var usersTable;
    $(document).ready(function() {
       
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        usersTable = $('#usersTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    text: 'Add New User',
                    className: 'btn btn-primary',
                    action: function ( e, dt, node, config ) {
                        $('#userModal .modal-title').text('Add User');
                        $('#userForm').trigger('reset');
                        $('#user_id').val('');
                        $('#userForm input').removeClass('is-invalid');
                        $('#saveUser').val('save');
                        $('.password-det').hide();
                        $('#userModal').modal('show');
                        $('#userModal').on('shown.bs.modal', function() {
                            $('#user_name').trigger('focus');

                        });       
                    }
                }
            ],
            serverSide: true,
            ajax: "{{ route('admin-users.index') }}",
            columns: [{
                    data: 'id'
                },
                {
                    data: 'email'
                },
                {
                    data: 'name'
                },
                {
                    data: 'user_type'
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

        
    });


    $('body').on('click', '.btn-edit', function() {
        var rowid = $(this).closest('tr').index();
        var id = $(this).val();
        console.log(id);
        $.get("{{ route('admin-users.index') }}" + '/' + id + '/edit', function(data) {

            $('#userModal .modal-title').text('Edit User');
            $('#userForm').trigger('reset');
            $('.password-det').show();

            $('#user_id').val(id);
            $('#user_name').val(data.name);
            $('#user_email').val(data.email);
            $(`input[name="user_type"][value="${data.user_type}"]`).prop('checked', true);
           
            

            $('#userForm input').removeClass('is-invalid');
            $('#saveUser').val('update');
            $('#userModal').modal('show');
            $('#userModal').on('shown.bs.modal', function() {
                $('#user_name').trigger('focus');
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
                        url: "{{ route('admin-users.store')}}" + "/" + id,
                        data: {
                            'check': false
                        },
                        success: function(data) {
                            usersTable.draw();


                            Swal.fire({
                                icon: 'success',
                                text: 'User has been deleted.',
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
                url: "{{ route('admin-users.store')}}" + "/" + id,
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
@stack('adminUserScripts')

@endsection


