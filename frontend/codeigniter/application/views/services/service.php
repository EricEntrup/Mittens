
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title"><?php echo isset($pageTitle) ?  $pageTitle : 'List' ?></h4>
                        </div>
                        <div class="iq-card-header-toolbar d-flex align-items-center">
                            <a href="<?php echo base_url('index.php/service-add') ?>" class="float-right mr-1 btn btn-sm btn-primary"><i class="fa fa-plus-circle"></i> Add Service</a> 
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="table-responsive">
                            <table id="table_id" class="table text-center w-100" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>Name</th>
                                        <th>Status</th>      
                                        <th>Action</th>         
                                    </tr>
                                <thead>
                                <?php $no=1; foreach($all_service as $s) {?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $s->name ?><td>
                                            <div class="custom-control custom-switch custom-switch-text custom-switch-color custom-control-inline">
                                                <div class="custom-switch-inner">
                                                    <input type="checkbox" class="custom-control-input bg-success change_status" data-type="category"<?php echo  ($s->status ? "checked" : "")?> value="<?php echo $s->id?>" id="<?php echo $s->id?>" data-id="<?php echo $s->id ?>">
                                                    <label class="custom-control-label" for="<?php echo $s->id?>"></label>
                                                </div>
                                            </div>
                                        <td>
                                            <a href="<?php echo base_url('index.php/ServiceController/create/'.$s->id); ?>"><i class="ri-pencil-line"></i></a>
                                            <a href="<?php echo base_url('index.php/ServiceController/deleteService/'.$s->id); ?>"  onclick="return confirm('Are you sure you want to delete?')"><i class="ri-delete-bin-line"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                           </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script>
    $(function() {
        url = "<?php echo base_url('index.php/service-status-change/status/id')?>";
            $('.change_status').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0; 
                var id = $(this).data('id'); 
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: url,
                    data: {'status': status, 'id': id},
                    success: function(data){
                        showMessage(data.message);
                    }

                });
        })

})
    </script>
    </div>

