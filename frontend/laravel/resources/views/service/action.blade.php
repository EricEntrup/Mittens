<?php
    $auth_user= authSession();
?>
<div class="flex align-items-center list-user-action">
    <!-- <a href="{{ route('service.view',['id' => $service->id]) }}" title="{{ trans('messages.view_form_title',['form' => trans('messages.service') ]) }}"><i class="ri-eye-line"></i></a> -->
    <a href="{{ route('service.edit',['id' => $service->id]) }}" title="{{ trans('messages.update_form_title',['form' => trans('messages.service') ]) }}"><i class="ri-pencil-line"></i></a>
    <a href="{{ route('service.delete',['id' => $service->id]) }}" title="{{ trans('messages.delete_form_title',['form'=>  trans('messages.service') ]) }}"  onclick="return confirm('{{ trans('messages.delete_form_message',['form' => trans('messages.service')]) }}')"><i class="ri-delete-bin-line"></i></a>
    @if($auth_user->can('service view'))
    @endif
    @if($auth_user->can('service edit'))
    @endif
    @if($auth_user->can('service delete'))
    @endif
</div>