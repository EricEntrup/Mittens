
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="iq-card">
                                    <div class="iq-card-header d-flex justify-content-between">
                                        <div class="iq-header-title">
                                            <h4 class="card-title"><?php isset($pageTitle) ? $pageTitle :'List' ?></h4>
                                        </div>
                                        <div class="iq-card-header-toolbar d-flex align-items-center">
                                            <a href="#" onclick="add()" class="float-right mr-1 btn btn-sm btn-primary loadRemoteModel"><i class="fa fa-plus-circle"></i> Add Board</a> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 track">
                        <?php if(isset($boarddata) ) {
                            foreach($boarddata as $k => $item){ ?>
                            <input type="hidden" name="id" id="id" value="<?php echo isset($item->id) ? $item->id :''?>" />
                                <div class="bg-transparent shadow-none mr-3 w-25 iq-card">
                                    <div class="iq-card-header d-flex justify-content-between iq-border-radius-10" style="background-color:<?php echo $item->color ?>" >
                                        <div class="iq-header-title">
                                            <h5 class="text-white"><?php echo $item->title?></h5>
                                        </div>
                                        <div class="iq-card-header-toolbar d-flex align-items-center">
                                            <a onclick="editboard(<?php echo $item->id;?>)" class="text-white" ><i class="ri-ball-pen-line mr-0 font-size-18" role="button" tabindex="0"></i></a>
                                            <a href="<?php echo base_url('index.php/ProjectController/deleteboard/'.$item->id);?>"   onclick="return confirm('Are you sure you want to delete?')"><i class="ri-delete-bin-line font-size-18 text-white"></i></a>
                                        </div>
                                    </div>
                                    <div class="card-body iq-card-body pro-bg-card bg-white">
                                    <div id="board<?php echo $k++ ?>" data-board_id ="<?= $item->id ?>" >
                                            &nbsp;
                                                <?php foreach( $taskdata as $task ) { 
                                                    if($task->board_id == $item->id){    
                                                ?>
                                                    <div class="iq-card" data-boardtask_id ="<?php echo $task->id ?>">
                                                        <div class="iq-card-header d-flex justify-content-between pro-task-bg-card">
                                                            <div class="iq-header-title">
                                                                <h5 class="card-title text-muted"><?= $task->name ?></h5>
                                                                <h6 class="text-muted"><?= $task->date ?></h6>
                                                            </div>
                                                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                                                <span class="badge badge-secondary mr-2 p-2"><?= $task->priority ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="card-body iq-card-body pro-task-bg-card">
                                                            <p class="font-size-12"> <?= $task->description ?></p>
                                                            <div class="d-flex justify-content-between">
                                                                <div>
                                                                    
                                                                    <a onclick="edittask()" class="" ><i class="ri-ball-pen-line font-size-18 edit_data" role="button" tabindex="0"></i></a>
                                                                    <a href="<?php echo base_url('index.php/ProjectTaskController/deletetask/'.$task->id);?>"  onclick="return confirm('Are you sure you want to delete')"><i class="ri-delete-bin-line font-size-18 iq-bg-danger"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php }}?>
                                        </div>
                                        <a onclick="loadTaskModal(<?php echo $item->id?>)" class="btn iq-bg-primary btn-lg btn-block loadRemoteModel">Add Item</a>
                                    </div>
                                </div>
                           <?php } }?>
                    </div>
                </div>
            </div>
        </div>   
    </div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script type="text/javascript">
      (function($) {
        "use strict";
        $(document).ready(function(){
            var board =  <?php echo json_encode($boarddata); ?>;

            var selector = [];
            if(board.length > 0 )
            {
                for(var i = 0 ; i < board.length ; i++) {
                    selector.push(document.querySelector('#board'+i));
                }
            }
            dragula( selector ).on('drop', function(el) {
                var board_id = $(el).parent().attr('data-board_id')
                var boardtask_id = el.dataset.boardtask_id
                $.ajax({
                    url: "<?php echo base_url('index.php/task-sequence-update') ?>",
                    type: 'post',
                    data: { 'board_id' : board_id , 'boardtask_id' : boardtask_id  }
                })
            });
        })
        })(jQuery);

        var save_method; 
        var table;

    function add()
    {
      save_method = 'add';
      $('#form')[0].reset(); 
      $('#modal_form').modal('show'); 
    }
    function loadTaskModal(id){
        $('#form1')[0].reset(); 
        $('#task_form').modal('show');
        $("#board_id").val(id);
    }
    function save()
    {
       
      var url;
      if(save_method == 'add')
      {
          url = "<?php echo base_url('index.php/board-store')?>";
      }
      else{
        url = "<?php echo base_url('index.php/update-data')?>";
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
  
    function save_task(){
        $.ajax({
            url : "<?php echo base_url('index.php/task-save') ?>",
            type: "POST",
            data: $('#form1').serialize(),
            dataType: "JSON",
            success: function(data)
            {
                $('#id').val(data.data.sequence);
               $('#task_form').modal('hide');
              location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }
    function editboard(id){
          
           $.ajax({  
                url:"<?php echo base_url('index.php/board-update'); ?>",  
                method:"POST",  
                data:{id:id},  
                dataType:"json",  
                success:function(data){ 
                    $('#id').val(data.data.id);
                     $('#title').val(data.data.title);  
                     $('#sequence').val(data.data.sequence);  
                     $('#color').val(data.data.color);  
                     $('#modal_form').modal('show');  
                }  
           });  
    }
    function edittask(){
        var id = $('#id').val();  
           $.ajax({  
                url:"<?php echo base_url('index.php/task-update'); ?>",  
                method:"POST",  
                data:{id:id},  
                dataType:"json",  
                success:function(data){ 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        
                     $('#task_form').modal('show');  

                }  
           });  
    }
     
  </script>
 
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog" role="document">
     <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Board Form</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
            <form id="form">
                <input type="hidden" id="id" name="id"/>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label class="form-control-label">Title <span class="text-danger">*</span><label>
                        <input type="text" name="title" class="form-control" id="title" required />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label name="sequence" class="form-control-label">Sequence <span class="text-danger">*</span><label>
                        <input type="text" name="sequence" id="sequence" class="form-control"  value ="<?php echo $max?>" required/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label name="sequence" class="form-control-label">Color <span class="text-danger">*</span><label>
                        <input type="color" id="color" name="color" class="form-control" required />
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save()" class="btn btn-md btn-primary">Save</button>
            <button type="button" class="btn btn-md btn-secondary" data-dismiss="modal">Close</button>
        </div>
      
        </div>
      </div>
</div>

<div class="modal fade" id="task_form" role="dialog">
    <div class="modal-dialog" role="document">
     <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Board Form</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
            <div class="modal-body">
                <form id="form1">
                    <input type="hidden" name="id" />
                    <input type="hidden" name="board_id" id="board_id"/>

                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label class="form-control-label">Name <span class="text-danger">*</span> </label>
                            <input type="text" name="name" id="name" class="form-control" required/>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label class="form-control-label">Description <span class="text-danger">*</span> </label>
                            <input type="text" name="description" id="description" class="form-control" required/>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label class="form-control-label">Date <span class="text-danger">*</span> </label>
                            <input type="date" name="date" id="date" class="form-control" required/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label class="form-control-label">priority <span class="text-danger">*</span> </label>
                            <div class="form-group">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="1" id="low" name="priority" class="custom-control-input" checked>
                                    <label class="custom-control-label" for="low">Low</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="2" id="high" name="priority" class="custom-control-input">
                                    <label class="custom-control-label" for="high">High</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="3" id="critical" name="priority" class="custom-control-input">
                                    <label class="custom-control-label" for="critical"> Critical</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnTask" class="btn btn-md btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-md btn-primary" id="btn_submit" onclick="save_task()" >Save</button>
            </div>
        </div>
      </div>
</div>
 
 


  
