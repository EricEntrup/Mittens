<?php
    $auth_user= authSession();
?>
<div class="flex align-items-center list-user-action">
    <!-- <a href="{{ route('category.view',['id' => $category->id]) }}" title="{{ trans('messages.view_form_title',['form' => trans('messages.category') ]) }}"><i class="ri-eye-line"></i></a> -->
    <a href="{{ route('category.edit',['id' => $category->id]) }}" title="{{ trans('messages.update_form_title',['form' => trans('messages.category') ]) }}"><i class="ri-pencil-line"></i></a>
    <a href="{{ route('category.delete',['id' => $category->id]) }}" title="{{ trans('messages.delete_form_title',['form'=>  trans('messages.category') ]) }}"  onclick="return confirm('{{ trans('messages.delete_form_message',['form' => trans('messages.category')]) }}')"><i class="ri-delete-bin-line"></i></a>
    @if($auth_user->can('category view'))
    @endif
    @if($auth_user->can('category edit'))
    @endif
    @if($auth_user->can('category delete'))
    @endif
</div>