<?php
    $auth_user= authSession();
?>
<div class="flex align-items-center list-user-action">
    <!-- <a href="{{ route('board.view',['id' => $board->id]) }}" title="{{ trans('messages.view_form_title',['form' => trans('messages.board') ]) }}"><i class="ri-eye-line"></i></a> -->
    <a href="{{ route('board.edit',['id' => $board->id]) }}" title="{{ trans('messages.update_form_title',['form' => trans('messages.board') ]) }}"><i class="ri-pencil-line"></i></a>
    <a href="{{ route('board.delete',['id' => $board->id]) }}" title="{{ trans('messages.delete_form_title',['form'=>  trans('messages.board') ]) }}"  onclick="return confirm('{{ trans('messages.delete_form_message',['form' => trans('messages.board')]) }}')"><i class="ri-delete-bin-line"></i></a>
    @if($auth_user->can('board view'))
    @endif
    @if($auth_user->can('board edit'))
    @endif
    @if($auth_user->can('board delete'))
    @endif
</div>