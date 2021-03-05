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
                            @if($auth_user->can('category add'))
                            @endif
                            <a href="{{ route('category.create') }}" class="float-right mr-1 btn btn-sm btn-primary"><i class="fa fa-plus-circle"></i> {{ trans('messages.add_form_title',['form' => trans('messages.category')  ]) }}</a>
                        </div>
                    </div>
                    <div class="iq-card-body p-0">
                        {{ $dataTable->table(['class' => 'table text-center w-100 border'],false) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('body_bottom')
    {{ $dataTable->scripts() }}
    <script>
        (function($) {

            "use strict";

            $(document).ready(function () {

                $(document).on('change','.role_status', function() {
                    var status = $(this).prop('checked') == true ? 1 : 0;
                    var id = $(this).attr('data-id');

                    $.ajax({
                        type: "GET",
                        dataType: "json",
                        url: "{{ route('changeStatus') }}",
                        data: {'status': status, 'id': id},
                        success: function(data){
                            showMessage(data.message);
                        }
                    });
                })
                function showMessage(message) {
                    Snackbar.show({
                        text: message,
                        pos: 'bottom-right'
                    });
                }
            })
        })(jQuery);
    </script>

@endsection
