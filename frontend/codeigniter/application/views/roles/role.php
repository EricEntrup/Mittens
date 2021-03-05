
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Role List</h4>
                        </div>
                        <div class="iq-card-header-toolbar d-flex align-items-center">
                         <a href="#" onclick="add()" class="float-right mr-1 btn btn-sm btn-primary loadRemoteModel"><i class="fa fa-plus-circle"></i> Add Role</a> 
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="table-responsive">
                            <table id="table_id" class="table text-center w-100" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $no=1; $toggle=1;?>
                                <?php foreach($roles as $role){?>
                                    <tr>
                                        <td><?php echo $no++;?></td>
                                        <td><?php echo $role->name;?></td>
                                        <td>
                                                <?php if($role->status == 1){ ?>
                                                    <input data-id="<?php echo $role->id ?>" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive"  checked>
                                                <?php }else{ ?>
                                                    <input data-id="<?php echo $role->id ?>" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive">
                                                <?php } ?>
                                        </td>
                                    
                                    </tr>
                                <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


  <script type="text/javascript">
    $(function() {
        url = "<?php echo base_url('index.php/role-status/status/id')?>";
        $('.toggle-class').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0; 
            var id = $(this).data('id'); 
            $.ajax({
                type: "POST",
                dataType: "json",
                url: url,
                data: {'status': status, 'id': id},
                success: function(data){
                  console.log(data.success)
                }

            });

    })

})
   
  
    var save_method; 
    var table;
 
 
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
          url = "<?php echo base_url('index.php/role-add')?>";
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
            <h5 class="modal-title" id="exampleModalLabel">Role Form</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
            <form action="#" id="form" class="form-horizontal">
                 <input type="hidden" value="" name="id"/>
                 <div class="row">
                    <div class="col-md-12 form-group">
                    <label name="name" class="form-control-label">Name</label>
                    <input type="text" name="name" class="form-control">
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save()" class="btn btn-md btn-primary">Save</button>
            <button type="button" class="btn btn-md btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
        </div>
      </div>
    </div>
 
 


  
