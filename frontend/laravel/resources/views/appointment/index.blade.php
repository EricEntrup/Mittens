@extends('layouts.master')

@section('content')

<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">{{ $pageTitle ?? trans('messages.list') }}</h4>
                        </div>
                        <div class="iq-card-header-toolbar d-flex align-items-center">
                            @if($auth_user->can('appointment add'))
                            @endif
                            <a href="{{ route('appointment.create') }}" class="float-right mr-1 btn btn-sm btn-primary"><i class="fa fa-plus-circle"></i> {{ trans('messages.add_form_title',['form' => trans('messages.appointment')  ]) }}</a>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div id='calendar'></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('body_bottom')
<script>
    (function($) {
         "use strict";
         $(window).on('load',function(){
            var calendar = $('#calendar').fullCalendar({
                displayEventTime: true,
                themeSystem: 'bootstrap4',
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                height : 600,
                selectable: true,
                selectHelper: true,
                editable: true,
                eventLimit: true,
                showNonCurrentDates : false,
                events: {
                    color  : "rgb(19, 193, 240)",
                    textColor : "#fff",
                    url:  "{{ route('appointment.index') }}",
                    success: function(events) {
                        return events;
                    }
                },
                eventDataTransform: function(eventData) {
                    return {
                        id: eventData.id,
                        title: (eventData.user != null && eventData.user != '') ? eventData.user.name : eventData.name ,
                        start: eventData.date +" "+  eventData.time ,
                        // start: $.fullCalendar.formatDate(eventData.time, "HH:mm:ss"),
                        color: (eventData.category != null && eventData.category != '') ? eventData.category.color :  "rgb(19, 193, 240)",
                    };
                },
                eventRender: function (event, element, view) {
                    if (event.allDay === 'true') {
                        event.allDay = true;
                    } else {
                        event.allDay = false;
                    }
                },
                eventDrop: function(event, jsEvent, view) {
                    var id = event.id;
                    var date  = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                    var time  = $.fullCalendar.formatDate(event.start, "H:mm");
                    var url = "{{ route('appointment.update') }}"
                    $.ajax({
                        url : url,
                        type: "POST",
                        data : { "id" : id , "date" : date ,"time" : time },
                        success: function(data) {
                            Snackbar.show({
                                text: data.message,
                                pos: 'bottom-right'
                            });
                        }
                    })
                },
                eventClick:  function(event, jsEvent, view) {
                    var id = event.id;
                    var url = "{{ URL::to('appointment/view') }}/"+id;

                    $.get(url, function(data) {
                        $('#remoteModelData').html(data);
                        $('#remoteModelData').modal();
                    });
                },
            });
         });
        })(jQuery);
    </script>
@endsection
