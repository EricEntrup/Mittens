<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><?php echo isset($pageTitle) ?$pageTitle :''?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="POST" action="">
        <div class="modal-body">
            <input type="hidden" name="id" />
           <div class="row">
                <div class="col-md-12 form-group">
                    <label class="form-control-label"> Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" placeholder="Enter Title" />
                   
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    <label class="form-control-label">Sequence <span class="text-danger">*</span></label>
                    <input type="number" name="sequence" class="form-control" min="1" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    <label class="form-control-label">Color</label>
                    <input type="color" class="form-control" id="color" />
                </div>
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-md btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-md btn-primary" id="btn_submit" data-form="ajax" >Save</button>
        </div>
        </form>
    </div>
</div>