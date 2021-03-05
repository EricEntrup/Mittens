
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title"><?php echo isset($pageTitle) ? $pageTitle : 'Form' ?></h4>
                            </div>
                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                <a href="<?php echo base_url('index.php/service-list'); ?>" class="float-right mr-1 btn btn-sm btn-primary"><i class="ri-arrow-drop-left-line"></i>Back</a> 
                            </div>
                        </div>
                        <div class="iq-card-body">
                        <?php
                            $url='';
                            if(isset($servicedata->id)){
                                $url = "index.php/service-update";

                            }
                            else{
                                $url = "index.php/service-store";
                            }
                        ?>
                         <?php  echo form_open(base_url($url)); ?>
                               <input type="hidden" name="id" value="<?php echo isset($servicedata->id) ? $servicedata->id :'';?>" />
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label class="form-control-label">Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control" value="<?php echo isset($servicedata->name) ?$servicedata->name :''; ?>" required>
                                         <small class="help-block with-errors text-danger"></small>
                                    </div>
                                </div>
                             
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>Category <span class="text-danger">*</span></label>
                                        <select name="category_id" id="category" class="select2js form-control"  required>
                                            <option>Select Category</option>
                                            <?php foreach($category as $cat) { ?>
                                                <option value="<?php echo $cat->id;?>" <?php if($cat->id == isset($servicedata->category_id) ? $servicedata->category_id: '' ) echo 'selected="selected"'; ?> > <?php echo $cat->name; ?></option>
                                            <?php } ?>
                                        </select>
                                        <small class="help-block with-errors text-danger"></small>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label class="form-control-label">Price</label>
                                        <input type="number"  name="price" class="form-control" step="any" value="<?php echo isset($servicedata->price) ? $servicedata->price: '' ;?>" required />
                                        <small class="help-block with-errors text-danger"></small>
                                    </div>
                                </div>    
                                <button type="submit" class="btn btn-md btn-primary">Save</button>                      
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     
