<?php
    $auth_user= authSession();
?>
<div class="flex align-items-center list-user-action">
    @if($auth_user->can('user view'))
        <a href="{{ route('users.view',['id' => $user->id]) }}" title="{{ trans('messages.view_form_title',['form' => trans('messages.user') ]) }}"><i class="ri-eye-line"></i></a>
    @endif
    @if($auth_user->can('user edit'))
        <a href="{{ route('users.edit',['id' => $user->id]) }}" title="{{ trans('messages.update_form_title',['form' => trans('messages.user') ]) }}"><i class="ri-pencil-line"></i></a>
    @endif
    @if($auth_user->can('user delete'))
        <a href="{{ route('users.delete',['id' => $user->id]) }}" title="{{ trans('messages.delete_form_title',['form'=>  trans('messages.user') ]) }}"  onclick="return confirm('{{ trans('messages.delete_form_message',['form' => trans('messages.user')]) }}')"><i class="ri-delete-bin-line"></i></a>
    @endif
</div>