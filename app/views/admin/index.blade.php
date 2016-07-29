@extends('layouts.default')

@section('title')
    LRTSF - Dashboard
@stop

@section('body')
{{ 'class="bg-white"' }}
@stop

@section('content')
@include('layouts.navbar-admin')
<div class="container">
<div class="starter-template">

    <div class="page-header">
        <h4 class="conHeader" style="text-align: left!important;">
            <span class="char1st">D</span>ASHBOARD
        </h4>
    </div>

    <div class="row text-center">
        <div class="col-md-12" style="padding-top: 10px; padding-bottom: 10px;">
            <div class="col-md-1"></div>
            <div class="col-md-10 panelton-primary" data-text="{{ 'STATIONS & SCHEDULES' }}" onclick="window.location='{{URL::route("manageSchedules")}}'">
                {{ 'STATIONS & SCHEDULES' }}
            </div>
            <div class="col-md-1"></div>
        </div>

        <div class="col-md-12" style="padding-top: 10px; padding-bottom: 10px;">
            <div class="col-md-1"></div>
            <div class="col-md-10 panelton-primary" data-text="{{ 'NEWS & UPDATES' }}" onclick="window.location='{{URL::route("manageNews")}}'">
                {{ 'NEWS & UPDATES' }}
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
</div>
</div><!-- /.container -->

@include('layouts.footer')
@stop

@section('scripts')
<script>
    $( ".panelton-primary" ).hover(function() {
        $(this).empty().append('<i class="glyphicon glyphicon-edit"></i> MANAGE');
    }, function() {
        $(this).text($(this).attr('data-text'));
    });
</script>
@stop