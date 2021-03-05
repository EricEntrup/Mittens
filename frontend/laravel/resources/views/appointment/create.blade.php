@extends('layouts.master')

@section('content')
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title"> {{ $pageTitle ?? trans('messages.form') }} </h4>
                            </div>
                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                <a href="{{ route('appointment.index') }}" class="float-right mr-1 btn btn-sm btn-primary"><i class="ri-arrow-drop-left-line"></i>{{ trans('messages.back') }}</a> 
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <ul id="top-tabbar-vertical" class="p-0">
                                        <li class="active" id="personal">
                                            <a href="javascript:void();">
                                                <i class="ri-lock-unlock-line text-primary"></i><span>Step-1</span>
                                            </a>
                                        </li>
                                        <li id="contact">
                                            <a href="javascript:void();">
                                                <i class="ri-check-fill text-warning"></i><span>Step-2</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-9">
                                    {{ Form::model($appointmentdata,['method' => 'POST','route'=>'appointment.store', 'data-toggle'=>"validator" ,'id'=>'form-wizard1' , 'class'=>'text-center'] ) }}
                                    {{ Form::hidden('id') }}
                                        <!-- fieldsets -->
                                        <fieldset>
                                            <div class="form-card text-left">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h3 class="mb-4">Select Service :</h3>
                                                    </div>
                                                </div>
                                                <div class="row"> 
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            {{ Form::label('category',trans('messages.category').' <span class="text-danger">*</span>',['class'=>'form-control-label'], false ) }}
                                                            <select name="category_id" id="category" class="select2js form-control" data-ajax--url="{{ route('ajax-list', ['type' => 'category']) }}" data-ajax--cache = "true" required>
                                                                @if(isset($appointmentdata->category_id) && isset($appointmentdata->category))
                                                                    <option value="{{ $appointmentdata->category_id }}" selected > {{ isset($appointmentdata->category ) ? $appointmentdata->category->name : "" }}</option>
                                                                @endif
                                                            </select>
                                                            <small class="help-block with-errors text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            {{ Form::label('service_id',trans('messages.service').' <span class="text-danger">*</span>',[ 'class'=>'form-control-label' ],false ) }}
                                                            <select name="service_id" id="service_id" class ="select2js form-control" required>
                                                                @if(isset($appointmentdata->service_id) && $appointmentdata->service != null)
                                                                    <option value="{{ $appointmentdata->service_id }}" selected > {{ isset($appointmentdata->service ) ? $appointmentdata->service->name : "" }}</option>
                                                                @endif
                                                            </select>
                                                            <small class="help-block with-errors text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            {{ Form::label('price',trans('messages.price').' <span class="text-danger">*</span>',['class'=>'form-control-label'], false ) }}
                                                            {{ Form::number('price', old('price') ,['placeholder' => trans('messages.price'), 'step' => 'any' ,'class' =>'form-control','required' ,'readonly']) }}
                                                            <small class="help-block with-errors text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            {{ Form::label('date',trans('messages.date').' <span class="text-danger">*</span>',['class'=>'form-control-label'], false ) }}
                                                            {{ Form::text('date',old('date') ,['placeholder' => trans('messages.date'), 'class' =>'form-control datepicker','required']) }}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            {{ Form::label('time',trans('messages.time').' <span class="text-danger">*</span>',['class'=>'form-control-label'], false ) }}
                                                            {{ Form::text('time',old('time') , ['placeholder' => trans('messages.time'),'class' =>'form-control timepicker','required' ]) }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button id="submit" type="button" name="next" class="btn btn-primary next action-button float-right"  value="Next">Next</button>
                                        </fieldset>
                                        <fieldset>
                                            <div class="form-card text-left">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h3 class="mb-4 text-left">Customer:</h3>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                                <input type="checkbox" class="custom-control-input existingCustomer" id="customCheck1" {{ isset($appointmentdata->user_id) ? 'checked' : '' }} {{ isset($appointmentdata->id) ? 'disabled' : '' }}>
                                                                <label class="custom-control-label" for="customCheck1">Existing Customer</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-12 existing_customer">
                                                        <div class="form-group">
                                                            {{ Form::label('customer',trans('messages.customer').' <span class="text-danger">*</span>',['class'=>'form-control-label'], false ) }}
                                                            <select name="user_id" id="user" class="select2js form-control" data-ajax--url="{{ route('ajax-list', ['type' => 'user']) }}" data-ajax--cache = "true">
                                                                @if(isset($appointmentdata) && $appointmentdata->user_id != null)
                                                                    <option value="{{ $appointmentdata->user_id }}" selected > {{ isset($appointmentdata->user ) ? $appointmentdata->user->name : "" }}</option>
                                                                @endif
                                                            </select>
                                                            <small class="help-block with-errors text-danger"></small>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-12 new_customer">
                                                        <div class="form-group">
                                                            {{ Form::label('name',trans('messages.name').' <span class="text-danger">*</span>',['class'=>'form-control-label'], false ) }}
                                                            {{ Form::text('name',old('name'),['placeholder' => trans('messages.name'),'class' =>'form-control']) }}
                                                            <small class="help-block with-errors text-danger"></small>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-12 new_customer">
                                                        <div class="form-group">
                                                            {{ Form::label('email',trans('messages.email').' <span class="text-danger">*</span>',['class'=>'form-control-label'], false ) }}
                                                            {{ Form::email('email',old('email'), ['placeholder' => trans('messages.email'),'class' =>'form-control']) }}
                                                            <small class="help-block with-errors text-danger"></small>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 new_customer">
                                                        <div class="form-group">
                                                            {{ Form::label('contact_number',trans('messages.contact_number'),['class'=>'form-control-label']) }}
                                                            {{ Form::text('contact_number',old('contact_number'),['placeholder' => trans('messages.contact_number'),'pattern'=>"[0-9]{6,12}",'class' =>'form-control']) }}
                                                            <small class="help-block with-errors text-danger"></small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary action-button float-right" value="Submit">Submit</a>
                                            <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-right mr-3" value="Previous">Previous</button>
                                        </fieldset>
                                    {{ Form::close() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body_bottom')
<script type="text/javascript">
    (function($) {
        "use strict";
        $(document).ready(function(){
            $('#category').select2({
                placeholder: "{{ trans('messages.select_name',['select' => trans('messages.category')]) }}",
            });
            $('#service_id').select2({
                placeholder: "{{ trans('messages.select_name',['select' => trans('messages.service')]) }}",
            });
            $('#user').select2({
                width: '100%',
                placeholder: "{{ trans('messages.select_name',['select' => trans('messages.customer')]) }}",
            });

            var category =  "{{ isset($appointmentdata->category_id) ? $appointmentdata->category_id : '' }}";
            var service_id =  "{{ isset($appointmentdata->service_id) ? $appointmentdata->service_id : '' }}";
            var exsiting_customer = "{{ isset($appointmentdata->user_id) ? true : false }}"
            serviceRecords(category,service_id)
            customerFields(exsiting_customer);
            $(document).on('change' , '#category' , function (){
                category = $(this).val();
                $('#service_id').empty();
                $('#price').val('');
                serviceRecords(category);
            })
            
            function serviceRecords(category , service_id = ''){
                // $('#service_id').attr('required','required');
                
                var route = "{{ route('ajax-list', [ 'type' => 'service' ,'data_type' =>'']) }}"+category;
                route = route.replace('amp;','');
                
                $("#service_id").select2({
                    placeholder: "{{ trans('messages.select_name',['select' => trans('messages.service')]) }}",
                    ajax: {
                        url: route,
                        cache: false
                    }
                });
                // if(service_id != null ){
                //     $("#service_id").val(service_id).trigger('change');
                // }
            }

            $('#service_id').on('select2:select', function (e) {
                // console.log(e.params.data)
                $('#price').val(e.params.data.price)
            });

            $(document).on('click', '.existingCustomer' , function () {
                customerFields(this.checked)
            })

            function customerFields(checked) {
                if(checked) {
                    
                   $('.new_customer').addClass('d-none')
                   $('.new_customer').find('input[type=text]').val('');
                   $('.new_customer').find('input[type=email]').val('');
                   $('.existing_customer').removeClass('d-none')
                }else{
                    $('.existing_customer').addClass('d-none')
                    $("#user").val(null).trigger("change");
                    $('.new_customer').removeClass('d-none')
                }
            }
        })
    })(jQuery);
</script>
@endsection
