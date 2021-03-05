@extends('layouts.master')

@section('content')

<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-12">
                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between border-0">
                                <div class="iq-header-title">
                                    <h4 class="card-title">{{ $pageTitle ?? trans('messages.list') }}</h4>
                                </div>
                                <div class="iq-card-header-toolbar d-flex align-items-center">
                                    @if($auth_user->can('board add'))
                                    @endif
                                    @if(isset($boarddata) && count($boarddata) > 0 )
                                        <a href="{{ route('board.reorder.get') }}" class="float-right mr-1 btn btn-sm btn-primary">{{ trans('messages.sequence_form_title',['form' => trans('messages.board')  ]) }}</a>
                                    @endif
                                    <a href="{{ route('board.create') }}" class="float-right mr-1 btn btn-sm btn-primary loadRemoteModel"><i class="fa fa-plus-circle"></i> {{ trans('messages.add_form_title',['form' => trans('messages.board')  ]) }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 track">
                        @if(isset($boarddata) && count($boarddata) > 0 )
                            @foreach($boarddata as $k => $item)
                                <div class="bg-transparent shadow-none mr-3 w-25 iq-card">
                                    <div class="iq-card-header d-flex justify-content-between" style="background-color:{{ $item->color }}" >
                                        <div class="iq-header-title">
                                            <h5 class="text-white">{{ $item->title }}</h5>
                                        </div>
                                        <div class="iq-card-header-toolbar d-flex align-items-center">
                                            <a href="{{ route('board.edit', [ 'id' => $item->id ]) }}" class="text-white loadRemoteModel" ><i class="ri-ball-pen-line mr-0 font-size-18" role="button" tabindex="0"></i></a>
                                            <a href="{{ route('board.delete',['id' => $item->id]) }}" title="{{ trans('messages.delete_form_title',['form'=>  trans('messages.board') ]) }}"  onclick="return confirm('{{ trans('messages.delete_form_message',['form' => trans('messages.board')]) }}')"><i class="ri-delete-bin-line font-size-18 ml-2 text-white"></i></a>
                                        </div>
                                    </div>
                                    <div class="card-body iq-card-body pro-bg-card">
                                        <div class="mt-n3" id="board{{ $k++ }}" data-board_id ="{{ $item->id }}">
                                            &nbsp;
                                            @if(isset($item->boardTask) && count($item->boardTask) > 0)
                                                @foreach( $item->boardTask as $task )
                                                    <div class="iq-card" data-boardtask_id ="{{ $task->id }}">
                                                        <div class="iq-card-header d-flex justify-content-between pro-task-bg-card">
                                                            <div class="iq-header-title">
                                                                <h5 class="card-title text-muted">{{ $task->name }}</h5>
                                                                <h6 class="text-muted">{{ $task->date }}</h6>
                                                            </div>
                                                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                                                @if(isset($task->priority))
                                                                    @foreach($taskpriority as $key => $priority)
                                                                        <span class="badge {{ $priority['color'] }} mr-2 p-2 text-capitalize">{{ ($task->priority == $priority['value']) ? $key : '' }}</span>
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="card-body iq-card-body pro-task-bg-card">
                                                            <p class="font-size-12"> {{ $task->description }}</p>
                                                            <div class="d-flex justify-content-between">
                                                                <div>
                                                                    <a href="{{ route('boardtask.edit' ,[ 'id' => $task->id ]) }}" title="{{ trans('messages.update_form_title',['form' => trans('messages.boardtask') ]) }}" class="loadRemoteModel" ><i class="ri-ball-pen-line font-size-18" role="button" tabindex="0"></i></a>
                                                                    <a href="{{ route('boardtask.delete',['id' => $task->id]) }}" title="{{ trans('messages.delete_form_title',['form'=>  trans('messages.boardtask') ]) }}"  onclick="return confirm('{{ trans('messages.delete_form_message',['form' => trans('messages.boardtask')]) }}')"><i class="ri-delete-bin-line font-size-18 iq-bg-danger"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                        <a href="{{ route('boardtask.create' ,[ 'board_id' => $item->id ]) }}" class="btn iq-bg-primary btn-lg btn-block loadRemoteModel">{{ trans('messages.add_form_title' , [ 'form' => trans('messages.item') ]) }}</a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
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
            var board =  <?php echo json_encode($boarddata); ?>;

            var selector = [];
            if(board.length > 0 )
            {
                for(var i = 0 ; i < board.length ; i++) {
                    selector.push(document.querySelector('#board'+i));
                }
            }
            dragula( selector ).on('drop', function(el) {

                var board_id = $(el).parent().attr('data-board_id')
                var boardtask_id = el.dataset.boardtask_id

                $.ajax({
                    url: "{{ route('boardtask.update')}}",
                    type: 'post',
                    data: { 'board_id' : board_id , 'boardtask_id' : boardtask_id , '_token': $('input[name=_token]').val() }
                })
            });
        })
        })(jQuery);
    </script>
@endsection
