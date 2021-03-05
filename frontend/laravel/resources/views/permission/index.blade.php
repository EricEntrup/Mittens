@extends('layouts.master')

@section('content')
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between border-0">
                        <div class="iq-header-title">
                            <h4 class="card-title">{{ isset($pageTitle) ? $pageTitle : trans('messages.list') }}</h4>
                        </div>
                        <div class="iq-card-header-toolbar d-flex align-items-center">
                            @if($auth_user->can('permission add'))
                                <a href="{{ route('permission.add',['type'=>'permission']) }}" class="float-right btn btn-sm btn-primary loadRemoteModel"><i class="fa fa-plus-circle"></i> {{ trans('messages.add_form_title',['form' => trans('messages.permission')  ]) }}</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                {{ Form::open(['route' => 'permission.store','method' => 'post']) }}
                    <div class="accordion cursor" id="permissionList">
                        @foreach($permission as  $key => $data)
                            <?php
                                $a = str_replace("_"," ",$key);
                                $k = ucwords($a);
                            ?>
                            <div class="iq-card mb-2">
                                <div class="iq-card-header d-flex justify-content-between collapsed btn" id="heading_{{$key}}" data-toggle="collapse" data-target="#pr_{{$key}}" aria-expanded="false" aria-controls="pr_{{$key}}">
                                    <div class="iq-header-title">
                                        <h5 class="mb-0 text-capitalize"> <i class="fa fa-plus mr-10"></i>{{ $data->name }}<span class="badge badge-secondary"></span></h4>
                                    </div>
                                </div>
                                <div id="pr_{{$key}}" class="collapse bg_light_gray" aria-labelledby="heading_{{$key}}" data-parent="#permissionList">
                                    <div class="iq-card-body table-responsive">
                                        <table class="table text-center table-bordered bg_white">
                                            <tr>
                                                <th>{{ trans('messages.name') }}</th>
                                                @foreach($roles as $role)
                                                    <th>{{ ucwords(str_replace('_',' ',$role->name)) }}</th>
                                                @endforeach
                                            </tr>
                                            @foreach($data->subpermission as $p)
                                                <tr>
                                                    <td class="text-capitalize">{{ $p->name }}</td>
                                                    @foreach($roles as $role)
                                                        <td>
                                                            <input class="checkbox no-wh permission_check" id="permission-{{$role->id}}-{{$p->id}}" type="checkbox" name="permission[{{$p->name}}][]" value='{{$role->name}}' {{ (checkRolePermission($role,$p->name)) ? 'checked' : '' }} @if($role->is_hidden) disabled @endif >
                                                        </td>
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                        </table>
                                        <input type="submit" name="Save" value="Save" class="btn btn-md btn-primary float-right mall-10">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('body_bottom')
    <script>
        (function($) {
            "use strict";
            $(document).ready(function(){
                $(document).on('click','#permissionList .iq-card-header',function(){
                    if($(this).find('i').hasClass('fa-minus')){
                        $('#permissionList .iq-card-header i').removeClass('fa-plus').removeClass('fa-minus').addClass('fa-plus');
                        $(this).find('i').addClass('fa-plus').removeClass('fa-minus');
                    }else{
                        $('#permissionList .iq-card-header i').removeClass('fa-plus').removeClass('fa-minus').addClass('fa-plus');
                        $(this).find('i').removeClass('fa-plus').addClass('fa-minus');
                    }
                });
            });
        })(jQuery);
    </script>
@endsection
