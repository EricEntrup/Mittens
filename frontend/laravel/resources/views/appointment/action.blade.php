<?php
    $auth_user= authSession();
?>
<div class="flex align-items-center list-user-action">
    <!-- <a href="{{ route('appointment.view',['id' => $appointment->id]) }}" title="{{ trans('messages.view_form_title',['form' => trans('messages.category') ]) }}"><i class="ri-eye-line"></i></a> -->
    <a href="{{ route('appointment.edit',['id' => $appointment->id]) }}" title="{{ trans('messages.update_form_title',['form' => trans('messages.appointment') ]) }}"><i class="ri-pencil-line"></i></a>
    <a href="{{ route('appointment.delete',['id' => $appointment->id]) }}" title="{{ trans('messages.delete_form_title',['form'=>  trans('messages.appointment') ]) }}"  onclick="return confirm('{{ trans('messages.delete_form_message',['form' => trans('messages.appointment')]) }}')"><i class="ri-delete-bin-line"></i></a>
    @if($auth_user->can('appointment view'))
    @endif
    @if($auth_user->can('appointment edit'))
    @endif
    @if($auth_user->can('appointment delete'))
    @endif
</div>