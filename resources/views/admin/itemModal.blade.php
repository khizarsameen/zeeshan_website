<div class="modal fade" id="itemModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="itemForm" enctype="multipart/form-data">
                <input type="hidden" name="item_id" id="item_id">
                <div class="modal-body" style="background-color: #F4F6F9">
                    <div class="row mb-2">
                        <label for="title" class="col-form-label col-md-3">Item Title</label>
                        <div class="col-md-4">
                            <input type="text" name="title" id="title" class="form-control">
                            <div class="invalid-feedback title">

                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="description" class="col-form-label col-md-3">Item Description</label>
                        <div class="col-md-6">
                            <textarea name="description" id="description" rows="4" class="form-control" style="resize: none"></textarea>
                            <div class="invalid-feedback description">

                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="price" class="col-form-label col-md-3">Item Price</label>
                        <div class="col-md-3">
                            <input type="number" name="price" id="price" class="form-control">
                            <div class="invalid-feedback price">

                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="item_image" class="col-form-label col-md-3">Item Visual</label>
                        <div class="col-md-4 ">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="item_image" name="item_image">
                                <label class="custom-file-label" for="item_image">Choose file</label>
                                <div class="invalid-feedback item_image">

                                </div>
                            </div>

                        </div>
                        <div class="col-md-4 ">
                            <a href="#" class="btn btn-success cimgBtn" target="_BLANK">Click Here to view Current Image</a>
                        </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="saveItem">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>

            </form>
        </div>
    </div>
    </div>
