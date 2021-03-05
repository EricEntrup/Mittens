@extends('layouts.master')

@section('content')
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="iq-card">
                    <div class="iq-card-header">
                        <h2>{{ isset($pageTitle) ? ucwords($pageTitle) : ''}}</h2>
                    </div>
                    <div class="iq-card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-pills mb-3 nav-fill" id="tabs-text" role="tablist">
                                <!-- <ul class="nav nav-pills nav-fill flex-column flex-sm-row" id="tabs-text" role="tablist"> -->
                                    @role('admin')
                                    <li class="nav-item">
                                        <a href="javascript:void(0)" data-href="{{ route('theme_page') }}?page=header" data-target=".paste_here" class="nav-link {{$page=='header'?'active':''}}"  data-toggle="tabajax" rel="tooltip"> Header</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:void(0)" data-href="{{ route('theme_page') }}?page=font" data-target=".paste_here" class="nav-link {{$page=='font'?'active':''}}"  data-toggle="tabajax" rel="tooltip"> Font</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:void(0)" data-href="{{ route('theme_page') }}?page=color" data-target=".paste_here" class="nav-link mb-sm-3 mb-md-0 {{$page=='color'?'active':''}}"  data-toggle="tabajax" rel="tooltip"> Color</a>
                                    </li>
                                    @endrole
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="tab-content">
                                    <div class="tab-pane active p-4" >
                                        <div class="paste_here"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('body_bottom')
    <script type="text/javascript">
        $(document).ready(function(event)
        {
            var $this = $('.nav-item').find('a.active'),
                loadurl = '{{route('theme_page')}}?page={{ $page}}',
                targ = $this.attr('data-target'),
                id = this.id || '';

            $.post(loadurl, function(data) {
                $(targ).html(data);
            });

            $this.tab('show');
            return false;

        });



    </script>

@endsection