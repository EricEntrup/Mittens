<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ $pageTitle }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
        {{ Form::model($boarddata,['method' => 'POST','route'=>'board.store', 'data-toggle'=>"validator" ,'id'=>'board' ] ) }}
        <div class="modal-body">
           {{ Form::hidden('id') }}
           <div class="row">
                <div class="col-md-12 form-group">
                   {{ Form::label('title',trans('messages.title').' <span class="text-danger">*</span>', ['class' => 'form-control-label'],false) }}
                   {{ Form::text('title', null, [ 'placeholder' => trans('messages.title') ,'class' => 'form-control' ,'required']) }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                {{ Form::label('sequence',trans('messages.sequence').' <span class="text-danger">*</span>', ['class' => 'form-control-label'],false) }}
                {{ Form::number('sequence',null,[ 'placeholder' => trans('messages.sequence'),'class' =>'form-control','min' => 1 ,'max' =>  $max ,'id' => 'sequence','readonly' ] ) }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                   {{ Form::label('color',trans('messages.color'), ['class' => 'form-control-label']) }}
                   {{ Form::color('color',null, ['placeholder' => trans('messages.color'),'class' =>'form-control' ,'id' => 'color']) }}
                </div>
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-md btn-secondary" data-dismiss="modal">{{ trans('messages.close') }}</button>
            <button type="submit" class="btn btn-md btn-primary" id="btn_submit" data-form="ajax" >{{ trans('messages.save') }}</button>
        </div>
        {{ Form::close() }}
    </div>
</div>