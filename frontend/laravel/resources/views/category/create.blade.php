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
                                <a href="{{ route('category.index') }}" class="float-right mr-1 btn btn-sm btn-primary"><i class="ri-arrow-drop-left-line"></i>{{ trans('messages.back') }}</a> 
                            </div>
                        </div>
                        <div class="iq-card-body">
                            {{ Form::model($categorydata,['method' => 'POST','route'=>'category.store', 'data-toggle'=>"validator" ,'id'=>'category'] ) }}
                                {{ Form::hidden('id') }}
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        {{ Form::label('name',trans('messages.name').' <span class="text-danger">*</span>',['class'=>'form-control-label'], false ) }}
                                        {{ Form::text('name',old('name'),['placeholder' => trans('messages.name'),'class' =>'form-control','required']) }}
                                        <small class="help-block with-errors text-danger"></small>
                                    </div>
                                   
                                    <div class="form-group col-md-12">
                                        {{ Form::label('color',trans('messages.color'), ['class' => 'form-control-label']) }}
                                        {{ Form::color('color',null, ['placeholder' => trans('messages.color'),'class' =>'form-control' ,'id' => 'color']) }}
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
</script>        
@endsection
