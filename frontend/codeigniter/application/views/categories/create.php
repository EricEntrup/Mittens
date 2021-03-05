<?php echo form_error('name'); ?> 
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title"><?php echo isset($pageTitle) ? $pageTitle : 'Add Form' ?></h4>
                            </div>
                            
                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                <a href="<?php echo base_url('index.php/category-list');?>" class="float-right mr-1 btn btn-sm btn-primary"><i class="ri-arrow-drop-left-line"></i>Back</a> 
                            </div>
                        </div>
                        <div class="iq-card-body">
                        <?php
                            $url='';
                            if(isset($categorydata->id)){
                                $url = "index.php/category-update";

                            }
                            else{
                                $url = "index.php/category-store";
                            }
                        ?>
                            <?php echo form_open(base_url($url)); ?>
                               <input type="hidden" name="id" value=<?php echo isset($categorydata->id) ? $categorydata->id :'';?> />
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label class="form-control-label">Name <span class="text-danger">*</span>'</label>
                                        <input type="text" name="name" id="name" class="form-control" value="<?php echo isset($categorydata->name) ? $categorydata->name:''  ?>" />
                                        <?php echo form_error('name'); ?> 
                                        <small class="help-block with-errors text-danger"></small>
                                    </div>                            
                                    <div class="form-group col-md-12">
                                        <label for="color" class="form-control-label">Color</label>
                                        <input placeholder="Color" class="form-control" id="color" name="color" type="color">
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-md btn-primary">Save</button>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

