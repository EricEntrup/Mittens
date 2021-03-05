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
                            @if($auth_user->can('user add'))
                                <a href="{{ route('users.create') }}" class="float-right mr-1 btn btn-sm btn-primary"><i class="fa fa-plus-circle"></i> {{ trans('messages.add_form_title',['form' => trans('messages.user')  ]) }}</a>
                            @endif
                        </div>
                    </div>
                    <div class="iq-card-body p-0">
                        {{ $dataTable->table(['class' => 'table text-center w-100'],false) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('body_bottom')
    {{ $dataTable->scripts() }}
@endsection
