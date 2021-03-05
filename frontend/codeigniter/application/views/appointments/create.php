
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title"> <?php echo isset($pageTitle) ? $pageTitle: 'Form' ?></h4>
                    </div>
                    <div class="iq-card-header-toolbar d-flex align-items-center">
                        <a href="<?php echo base_url('appointment-list')?>" class="float-right mr-1 btn btn-sm btn-primary"><i class="ri-arrow-drop-left-line"></i>Back</a> 
                    </div>
                </div>
                <div class="iq-card-body">
                    <div class="row">
                        
                        <div class="col-md-3">
                            <ul id="top-tabbar-vertical" class="p-0">
                                <li class="active" id="personal">
                                    <a href="javascript:void();">
                                        <i class="ri-lock-unlock-line text-primary"></i><span>Step-1</span>
                                    </a>
                                </li>
                                <li id="contact">
                                    <a href="javascript:void();">
                                        <i class="ri-check-fill text-warning"></i><span>Step-2</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                            
                    <!-- Add Appoiment form !-->
                        <div class="col-md-9">

                            <form action="<?php echo base_url('index.php/appointment-store') ?>" method="POST" class="text-center" id="form-wizard1" />
                                <input type="hidden" name="id" value=" <?php echo isset($d->id) ? $d->id :'';?>" />   
                                <fieldset>
                                    <div class="form-card text-left">
                                        <div class="row">
                                            <div class="col-12">
                                                <h3 class="mb-4">Select Service :</h3>
                                            </div>
                                        </div>
                                        <div class="row"> 
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Category  <span class="text-danger">*</span></label>
                                                    <select name="category_id" id="category" class="select2js form-control"  required>
                                                        <option>Select Category</option>
                                                        <?php foreach($category as $cat) {?>
                                                            <option value="<?php echo $cat->id;?>" > <?php echo $cat->name; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <small class="help-block with-errors text-danger"></small>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Service <span class="text-danger">*</span></label>
                                                    <select name="service_id" id="service_id" class ="select2js form-control" required>
                                                   
                                                    </select>
                                                    <small class="help-block with-errors text-danger"></small>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Price <span class="text-danger">*</span></label>
                                                    <input type="number" name="price" step = 'any' class = 'form-control' id="price"  required/>
                                                    <small class="help-block with-errors text-danger"></small>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Date <span class="text-danger">*</span></label>
                                                    <input type="text" name="date" class="form-control datepicker" required/>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Time <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control timepicker" name="time" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button id="submit" type="button" name="next"
                                        class="btn btn-primary next action-button float-right"
                                        value="Next">Next</button>
                                </fieldset>

                                <fieldset>
                                    <div class="form-card text-left">
                                        <div class="row">
                                            <div class="col-12">
                                                <h3 class="mb-4 text-left">Customer:</h3>
                                            </div>
                                        </div>
                                        <div class="row">
                                            
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input existingCustomer" id="customCheck1">
                                                        <label class="custom-control-label" for="customCheck1">Existing Customer</label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-12 existing_customer">
                                                <div class="form-group">
                                                <label name="customer" class="form-control-label"> Customer <span class="text-danger">*</span></label>
                                                    <select name="user_id" id="user" class="select2js form-control">
                                                        <?php foreach($users as $u){ ?>
                                                            <option value="<?php echo $u->id ?> <?php if($u->id == isset($d->user_id) ? $d->user_id: '' ) echo 'selected="selected"'; ?>" ><?php echo $u->username; ?> </option>
                                                        <?php } ?>
                                                    </select>
                                                    <small class="help-block with-errors text-danger"></small>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-12 new_customer">
                                                <div class="form-group">
                                                    <label class="form-control-label">Name <span class="text-danger">*</span></label>
                                                    <input type="text" name="name" class="form-control">
                                                    <small class="help-block with-errors text-danger"></small>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-12 new_customer">
                                                <div class="form-group">
                                                    <label class="form-control-label">Email <span class="text-danger">*</span></label>
                                                    <input type="email" name="email"  class="form-control" required/>
                                                    <small class="help-block with-errors text-danger"></small>
                                                </div>
                                            </div>

                                            <div class="col-md-12 new_customer">
                                                <div class="form-group">
                                                        <label class="form-control-label">Contact No <span class="text-danger">*</span></label>
                                                    <input type="text" name="contact_number"   class="form-control" required/>
                                                    <small class="help-block with-errors text-danger"></small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary action-button float-right" value="Submit">Submit</a>
                                    <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-right mr-3" value="Previous">Previous</button>
                                </fieldset>
                            </form>
                        </div>
                    <!-- End Appoiment form !-->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script type="text/javascript">

     $(document).ready(function(){
            var exsiting_customer = "<?php echo isset($appointmentdata->user_id) ? true : false ?>"
            customerFields(exsiting_customer);
        $('#category').change(function(){ 
            var id=$(this).val();
            $.ajax({
                url : "<?php echo base_url('index.php/get-service');?>",
                method : "POST",
                data : {id: id},
                async : true,
                dataType : 'json',
                success: function(data){
                    var html = '';
                    var price_dtaa = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].id+' selected>'+data[i].name+'</option>';
                        price_dtaa = data[i].price;
                    }
                    $('#service_id').html(html);
                    $('#price').val(price_dtaa);
                }
            });
            return false;
          
        }); 
        $(document).on('click', '.existingCustomer' , function () {
                customerFields(this.checked)
        })
        
        function customerFields(checked) {
                if(checked) {
                   $('.new_customer').addClass('d-none')
                   $('.existing_customer').removeClass('d-none')
                }else{
                    $('.existing_customer').addClass('d-none')
                    $('.new_customer').removeClass('d-none')
                }
            } 
      
        
});
</script>