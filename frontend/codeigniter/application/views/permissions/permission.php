
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Permission List</h4>
                        </div>
                        <div class="iq-card-header-toolbar d-flex align-items-center">
                            <a href="#" onclick="add()" class="float-right mr-1 btn btn-sm btn-primary loadRemoteModel"><i class="fa fa-plus-circle"></i> Add Permission</a> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <form action="<?php echo base_url('index.php/permission-role') ?>" method="POST">
                    <div class="accordion cursor" id="permissionList">
                        <?php foreach($permission as  $key => $data){ ?>
                            <?php
                           
                                $a = str_replace("_"," ",$key);
                                $k = ucwords($a);
                            ?>
                            <div class="iq-card">
                                <div class="iq-card-header d-flex justify-content-between collapsed btn" id="heading_<?php echo $key ?>" data-toggle="collapse" data-target="#pr_<?php echo $key ?>" aria-expanded="false" aria-controls="pr_<?php echo $key ?>">
                                    <div class="iq-header-title">
                                        <h4 class="mb-0"> <i class="fa fa-plus mr-10"></i><?php echo $data->name ?><span class="badge badge-secondary"></span></h4>
                                    </div>
                                </div>
                                <div id="pr_<?php echo $key ?>" class="collapse bg_light_gray" aria-labelledby="heading_<?php echo $key ?>" data-parent="#permissionList">
                                    <div class="iq-card-body pall-10  table-responsive">
                                        <table class="table text-center table-bordered bg_white">
                                            <tr>
                                                <th>Name</th>
                                                <?php foreach($roles as $role){ ?>
                                                    <th><b><?php echo  ucwords(str_replace('_',' ',$role->name)) ?></b></th>
                                                <?php } ?>
                                            </tr>
                                            
                                            <?php foreach($sub_permission as $p) { ?>
                                                <?php if($data->id == $p->id) { ?>
                                                    <tr>
                                                        <td><?php echo $p->name ?></td>
                                                            <?php foreach($roles as $role) { ?>
                                                                <td>
                                                                    <input type="hidden" name="role_id" value="<?php echo $role->id ?>">
                                                                     <input class="checkbox no-wh permission_check" id="permission-<?php echo $role->id ?>-<?php echo $p->id ?>" type="checkbox" name="permission_id[]" value='<?php echo $p->subid ?>'>
                                                                </td>
                                                            <?php } ?>
                                                    </tr>
                                                <?php } ?>
                                            <?php } ?>
                                        </table>
                                        <input type="submit" name="Save" value="Save" class="btn btn-md btn-primary float-right mall-10">
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        (function($) {
            "use strict";
            $(document).ready(function(){
                $(document).on('click','#permissionList .iq-card-header',function(){
                    if($(this).find('i').hasClass('fa-minus')){
                        $('#permissionList .iq-card-header i').removeClass('fa-plus').removeClass('fa-minus').addClass('fa-plus');
                        $(this).find('i').addClass('fa-plus').removeClass('fa-minus');
                    }else{
                        $('#permissionList .iq-card-header i').removeClass('fa-plus').removeClass('fa-minus').addClass('fa-plus');
                        $(this).find('i').removeClass('fa-plus').addClass('fa-minus');
                    }
                });
            });
        })(jQuery);
        function add()
        {
            save_method = 'add';
            $('#form')[0].reset();
            $('#modal_form').modal('show'); 
        }
        function save()
        {
            var url;
            if(save_method == 'add')
            {
                url = "<?php echo base_url('index.php/permission-add')?>";
            }
                $.ajax({
                    url : url,
                    type: "POST",
                    data: $('#form').serialize(),
                    dataType: "JSON",
                    success: function(data)
                    {
                        $('#modal_form').modal('hide');
                        location.reload();
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('Error adding / update data');
                    }
                });
        }
    </script>


<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog" role="document">
     <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Permission Form</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
            <form id="form"> 
                <div class="modal-body">
                    <input type="hidden" name="id" value="-1" />
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <div class="col-md-12 form-group">
                                <label name="name" class="form-control-label">Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                            <label name="name" class="form-control-label">Parent Permission</label>
                                <select name="parent_id" id="parent_id" class="select2js form-control">
                                    <option value="0" selected>select parent</option>
                                   <?php foreach($parent_permission as $data){ ?>
                                        <option value="<?php echo $data->id ?>"><?php echo $data->name ?></option>
                                   <?php } ?>
                                </select>
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" id="btnSave" onclick="save()"  class="btn btn-md btn-primary">Save</button>
                <button type="button" class="btn btn-md btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
            </form>
        </div>
      </div>
</div>