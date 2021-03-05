@extends('layouts.master')

@section('content')
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">{{ isset($pageTitle) ? $pageTitle : trans('messages.form') }}</h4>
                            </div>
                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                <a href="{{ route('service.index') }}" class="float-right mr-1 btn btn-sm btn-primary"><i class="ri-arrow-drop-left-line"></i>{{ trans('messages.back') }}</a> 
                            </div>
                        </div>
                        <div class="iq-card-body">
                            {{ Form::model($servicedata,['method' => 'POST','route'=>'service.store', 'data-toggle'=>"validator" ,'id'=>'service'] ) }}
                                {{ Form::hidden('id') }}
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        {{ Form::label('name',trans('messages.name').' <span class="text-danger">*</span>',['class'=>'form-control-label'], false ) }}
                                        {{ Form::text('name',old('name'),['placeholder' => trans('messages.name'),'class' =>'form-control','required']) }}
                                        <small class="help-block with-errors text-danger"></small>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        {{ Form::label('category',trans('messages.category').' <span class="text-danger">*</span>',['class'=>'form-control-label'], false ) }}
                                        <select name="category_id" id="category" class="select2js form-control" data-ajax--url="{{ route('ajax-list', ['type' => 'category']) }}" data-ajax--cache = "true" required>
                                            @if(isset($servicedata->category_id) && isset($servicedata->category))
                                                <option value="{{ $servicedata->category_id }}" selected > {{ isset($servicedata->category ) ? $servicedata->category->name : "" }}</option>
                                            @endif
                                        </select>
                                        <small class="help-block with-errors text-danger"></small>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        {{ Form::label('price',trans('messages.price').' <span class="text-danger">*</span>',['class'=>'form-control-label'], false ) }}
                                        {{ Form::number('price',old('price'),['placeholder' => trans('messages.price'), 'step' => 'any' ,'class' =>'form-control','required']) }}
                                        <small class="help-block with-errors text-danger"></small>
                                    </div>
                                </div>                          
                                {{ Form::submit( trans('messages.save'), ['class'=>'btn btn-md btn-primary']) }}
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('body_bottom')
<script>
    $(document).ready(function(event)
    {
        $('#category').select2({
            placeholder: "{{ trans('messages.select_name',['select' => trans('messages.category')]) }}",
        });
    })
</script>        
@endsection
