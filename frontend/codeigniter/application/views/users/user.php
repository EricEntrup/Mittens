
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">User List</h4>
                        </div>
                      
                    </div>
                    <div class="iq-card-body">
                        <div class="table-responsive">
                            <table id="table_id" class="table text-center w-100" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>User Type</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $no=1;?>
                                <?php foreach($users as $u){?>
                                    <tr>
                                        <td><?php echo $no++;?></td>
                                        <td><?php echo $u->username;?></td>
                                        <td><?php echo $u->email ?></td>
                                        <td><?php echo $u->user_type ?></td>
                                        <td>
                                            <a href="<?php echo base_url('index.php/UserController/edit/'.$u->id); ?>"  ><i class="ri-pencil-line"></i></a>
                                            <a href="<?php echo base_url('index.php/UserController/delete/'.$u->id); ?>"  onclick="return confirm('Are you sure you want to delete?')"><i class="ri-delete-bin-line"></i></a>
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
