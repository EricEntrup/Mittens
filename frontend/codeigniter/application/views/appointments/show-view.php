<?php foreach($appointmentdata as $data){ ?>
<div class="table-responsive">
    <table class="table table-hover table-bordered">
        <input type="hidden" name="id" value="<?php echo isset($row->id) ? $row->id :'' ?>" >
        <tbody>
            <tr>
                <th>Date Time</th>
                <td><?php echo isset($data->date) ? $data->date :'';?></td>
            </tr>
            <tr>
                <th>name</th>
                <td><?php echo isset($data->name) ? $data->name: ''; ?></td>
            </tr>
            <tr>
                <th>category</th>
                <td><?php echo isset($data->catname) ? $data->catname :''; ?></td>
            </tr>
            <tr>
                <th>Service</th>
                <td><?php echo isset($data->sname) ?$data->sname :''; ?></td>
            </tr>
            <tr>
                <th>price</th>
                <td><?php echo isset($data->price) ?$data->price :''; ?></td>
            </tr>
            
        </tbody>
        
    </table>
</div>

<div class="modal-footer">
    <a class="btn btn-md btn-info text-white" href="<?php echo base_url('index.php/AppointmentController/create/'.$data->id);  ?>" >Edit Appointment</a>
    <a class="btn btn-md btn-danger" href="<?php echo base_url('index.php/AppointmentController/deleteAppoimtment/'.$data->id);  ?>" >Delete Appointment</a>
    <button type="button" class="btn btn-md btn-secondary" data-dismiss="modal">Close</button>
</div>
<?php } ?>