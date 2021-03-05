<div class="pall-20">
    <form action="POST" action="">
                <input type="hidden" name="id" class="form-contro" />
                <div class="form-group has-feedback">
                    <label for="password" class="col-md-12 control-label">Old Password<span class="required">*</span></label>
                    <div class="col-md-12">
                        <input type="password" class="form-control"/>
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <label for="password" class="col-md-12 control-label">New Password<span class="required">*</span></label>
                    <div class="col-md-12">
                        <input type="password" name="password" class="form-control" required />
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <label for="password-confirm" class="col-md-12 control-label">Confirm Password<span class="required">*</span></label>
                    <div class="col-md-12">
                        <input type="password" name="password_confirmation" class="form-control" required/>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-md-12">
                    <?php echo form_submit('submit', 'Save',['class'=>'btn btn-md btn-primary float-md-right mt-15']); ?>
                    </div>
                </div>
    </form>
</div>