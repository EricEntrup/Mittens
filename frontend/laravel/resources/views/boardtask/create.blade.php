<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ $pageTitle }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
        {{ Form::model($boardtaskdata,['method' => 'POST','route'=>'boardtask.store', 'data-toggle'=>"validator" ,'id'=>'board' ] ) }}
        <div class="modal-body">
           {{ Form::hidden('id') }}
           {{ Form::hidden('board_id') }}
            <div class="row">
                <div class="col-md-12 form-group">
                   {{ Form::label('name',trans('messages.name').' <span class="text-danger">*</span>', ['class' => 'form-control-label'],false) }}
                   {{ Form::text('name', null, [ 'placeholder' => trans('messages.name') ,'class' => 'form-control' ,'required']) }}
                </div>
            </div>
           
            <div class="row">
                <div class="col-md-12 form-group">
                   {{ Form::label('description',trans('messages.description'), ['class' => 'form-control-label']) }}
                   {{ Form::text('description', null, [ 'placeholder' => trans('messages.description') ,'class' => 'form-control' ,'required']) }}                   
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12 form-group">
                   {{ Form::label('date',trans('messages.date'), ['class' => 'form-control-label']) }}
                   {{ Form::text('date',old('date') ,['placeholder' => trans('messages.date'), 'class' =>'form-control datepicker','required']) }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    {{ Form::label('priority',trans('messages.priority'), ['class' => 'form-control-label']) }}
                    <div class="form-group">
                        @foreach($taskpriority as $key => $priority)
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" value="{{ $priority['value'] }}" id="{{$key}}" name="priority" class="custom-control-input" {{ ($boardtaskdata->priority == $priority['value']) ? 'checked' : '' }} />
                                <label class="custom-control-label text-capitalize" for="{{$key}}">{{$key}}</label>
                            </div>
                        @endforeach
                    </div>
                    
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