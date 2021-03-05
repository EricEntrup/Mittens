@extends('layouts.master')

@section('content')
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 offset-3">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title"> {{ $pageTitle ?? trans('messages.form') }} </h4>
                            </div>
                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                <a href="{{ route('board.index') }}" class="float-right mr-1 btn btn-sm btn-primary"><i class="ri-arrow-drop-left-line"></i>{{ trans('messages.back') }}</a> 
                            </div>
                        </div>
                        <div class="iq-card-body">
                        <form method="POST" action="{{ route('board.reorder.save') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <section class="">
                                <ul class="list-unstyled m-1" id="drag-list">
                                    @if( count($boarddata) > 0 )
                                        @foreach($boarddata as $data)
                                            <li class="iq-card m-2 p-3 cursor-move">
                                                <input type="hidden" name="id[]" value="{{ $data->id }}">
                                                <span class="title board_title">
                                                    <i class="fa fa-bars drag-area" aria-hidden="true"></i>
                                                    {{ $data->title }}
                                                </span>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </section>
                            <div class="modal-footer">
                                <button class="btn btn-md btn-primary" >{{ trans('messages.save') }}</button>
                            </div>
                        </form>
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
                var sequence = [];
                dragula([$("#drag-list").get(0)]).on("dragend", function(el, target, src) {
                    console.log(el)
                    sequence = [];
                    $(".board_title").each(function(idx, elem) {
                        sequence.push($(elem).text());
                    });
                });
            })
    })(jQuery);
    </script>
@endsection