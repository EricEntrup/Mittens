<!-- Modal -->

<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
       
        <div class="modal-footer">
            <button type="button" class="btn btn-md btn-secondary" data-dismiss="modal"></button>
            <button type="submit" class="btn btn-md btn-primary" id="btn_submit" data-form="ajax" ></button>
        </div>
        
    </div>
</div>
<script>
    $('#parent_id').select2({
        placeholder: "{{ trans('messages.select_name',['select' => trans('messages.parent_permission')]) }}",
    });
</script>

