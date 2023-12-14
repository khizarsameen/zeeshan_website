<div class="modal fade" id="userModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="userForm" enctype="multipart/form-data">
                <input type="hidden" name="user_id" id="user_id">
                <div class="modal-body" style="background-color: #F4F6F9">
                    
                    <div class="mb-2 row">
                        <label for="user_name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control bg-white" id="user_name" name="user_name" autocomplete="name">
                            <div class="invalid-feedback user_name">

                            </div>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="user_email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control bg-white" id="user_email" name="user_email" autocomplete="email">

                            <div class="invalid-feedback user_email">

                            </div>
                        </div>
                    </div>


                    <div class="mb-2 row">
                        <label for="user_password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control bg-white" id="user_password" name="user_password" autocomplete="new-password">
                            <div class="text-muted password-det"><small>Leave Empty to retain old password</small></div>
                            <div class="invalid-feedback user_password">

                            </div>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <div class="col-sm-4 offset-sm-2">


                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="admin" name="user_type" class="custom-control-input" value="1" checked>
                                <label class="custom-control-label" for="admin">Admin</label>
                              </div>
                              <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="guest" name="user_type" class="custom-control-input" value="0">
                                <label class="custom-control-label" for="guest">Guest</label>
                              </div>
                        </div>
                    
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="saveUser">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>

            </form>
        </div>
    </div>
    </div>
    @push('adminUserScripts')
    <script type="text/javascript">
        $(document).ready(function() {
    
    
    
    
    
            $('#userForm').submit(function(e) {
                e.preventDefault();
    
    
    
                $('#saveUser').hide();
                $('#userForm input').removeClass('is-invalid');
                $('.alert-danger.user').fadeOut(function() {
                    $(this).html("");
                });
    
                var fd = $(this).serialize();
    
                $.ajax({
    
                    data: fd,
                    url: "{{ route('admin-users.store')}}",
                    cache: false,
                    // processData: false,
                    // contentType: false,
                    type: 'POST',
                    dataType: "json",
                    success: function(data) {
    
                        $('#saveUser').show();
    
                        
    
                        $('#userForm').trigger('reset');
                        $('#user_id').val("");
                        $('#userForm input').removeClass('is-invalid');
    
    
                        if ($('#saveUser').val() == 'update') {
                            Swal.fire({
                                icon: 'success',
                                text: 'User updated successfully',
                                timer: 1400,
                                didClose: () => {
                                    $('#userModal').modal('hide');
                                }
                            });
    
                        } else {
                            Swal.fire({
                                icon: 'success',
                                text: 'User saved successfully',
                                timer: 1400
    
                            });
    
                        }
                        usersTable.draw();
    
    
    
                    },
                    error: function(data) {
                        $('#saveUser').show();
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
    
    
    
            });
    
    
        });
    </script>
    @endpush