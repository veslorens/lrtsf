@extends('layouts.default')

@section('title')
    LRTSF - Manage Stations & Schedules
@stop

@section('content')
@include('layouts.navbar-admin')
<div class="container">
<div class="starter-template">

    <div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <h4 class="conHeader" style="text-align: left!important;">
                <span class="char1st">S</span>TATIONS & <span class="char1st">S</span>CHEDULES
            </h4>
        </div>

        <div class="col-md-6 col-sm-6 col-xs-12">
            <button type="button" onclick="upsertStation(this)" data-id="" class="btn btn-sm btn-success pull-right hidden-xs" style="margin-top:10px;margin-bottom:10px;"><i class="glyphicon glyphicon-plus"></i> <strong>Create</strong></button>
            <button type="button" onclick="upsertStation(this)" data-id="" class="btn btn-sm btn-success btn-block visible-xs" style="margin-top:10px;margin-bottom:10px;"><i class="glyphicon glyphicon-plus"></i> <strong>Create</strong></button>
        </div>
    </div>
    </div>

    <div class="row">
    <div class="col-md-12" style="padding-top: 10px; padding-bottom: 10px;">
        <div class="panel-group" id="conStations" role="tablist" aria-multiselectable="true">{{$node_stations}}</div>
    </div>
    </div>
</div>
</div><!-- /.container -->

@include('layouts.footer')
@stop

@section('scripts')
<script>
    function upsertStation(obj){
        var dataId = $(obj).attr('data-id');
        var id     = isEmpty(dataId)?0:dataId;
        var label  = isEmpty(dataId)?{'title':'Add','button':'Create','btnType':'success'}:{'title':'Edit','button':'Update','btnType':'primary'};
        var geturl = "{{URL::route('upsertStation', [':id'])}}".replace(':id',id);

        BootstrapDialog.show({
            title: '<b>'+label.title+' Station</b>',
            message: $('<div class="row"></div>').load(geturl),
            buttons: [{
                label: label.button,
                cssClass: 'btn-' + label.btnType,
                action: function(d) {
                    var formId  = '#frmUpsertStation';
                    var posturl = $(formId).attr('action');

                    if(vd8Empty(formId + ' #name', 'Station Name is required...')){return false}
                    $('.msgError').addClass('hidden');

                    $.post(posturl, $(formId).serialize()).fail(function(res){alert(res)}).done(function(res){
                        var stationId = res.data;
                        if(res.success) {
                            renode("{{URL::route('js_schedules')}}", '#conStations', d);
                        }
                        flashMessage('.msgError', res.msg);
                    });
                }
            }]
        });
    }
    function remStation(obj){
        var dataId = $(obj).attr('data-id');

        var _form= '<form id="frmRemStation" action="{{URL::route('destroyStation')}}"> \
                        <input type="hidden" name="id" value="'+ dataId +'"> \
                        <b class="text-danger">Are you sure you want to delete this record?</b> \
                        <span class="label label-danger msgError hidden"></span> \
                        {{Form::token()}} \
                    </form>';

        BootstrapDialog.show({
            title: '<b>Delete Station</b>',
            message: _form,
            buttons: [{
                label: 'Delete',
                cssClass: 'btn-danger',
                action: function(d) {
                    var formId = '#frmRemStation';
                    var url    = $(formId).attr('action');

                    $.post(url, $(formId).serialize()).fail(function(res){console.log(res)}).done(function(res){
                        if(res.success) {
                            renode("{{URL::route('js_schedules')}}", '#conStations', d);
                        }
                    });
                }
            }]
        });
    }



    function upsertSchedule(obj){
        var stationId = $(obj).attr('data-stationId');
        var dataId    = $(obj).attr('data-id');
        var id        = isEmpty(dataId)?0:dataId;
        var label     = isEmpty(dataId)?{'title':'Add','button':'Create','btnType':'success'}:{'title':'Edit','button':'Update','btnType':'primary'};
        var geturl    = "{{URL::route('upsertSchedule', [':id',':stationId'])}}".replace(':id',id).replace(':stationId',stationId);

        BootstrapDialog.show({
            title: '<b>'+label.title+' Schedule</b>',
            message: $('<div class="row"></div>').load(geturl),
            buttons: [{
                label: label.button,
                cssClass: 'btn-' + label.btnType,
                action: function(d) {
                    var formId  = '#frmUpsertSchedule';
                    var posturl = $(formId).attr('action');

                    if(hasError_Schedule(formId)){return false}
                    $('.msgError').addClass('hidden');

                    $.post(posturl, $(formId).serialize()).fail(function(res){console.log(res)}).done(function(res){
                        if(res.success) {
                            renode("{{URL::route('js_schedules')}}", '#conStations', d);
                        }
                        flashMessage('.msgError', res.msg);
                    });
                }
            }]
        });
    }
    function remSchedule(obj){
        var stationId = $(obj).attr('data-stationId');
        var dataId    = $(obj).attr('data-id');

        var _form= '<form id="frmRemSchedule" action="{{URL::route('destroySchedule')}}"> \
                        <input type="hidden" name="id" value="'+ dataId +'"> \
                        <b class="text-danger">Are you sure you want to delete this record?</b> \
                        <span class="label label-danger msgError hidden"></span> \
                        {{Form::token()}} \
                    </form>';

        BootstrapDialog.show({
            title: '<b>Delete Schedule</b>',
            message: _form,
            buttons: [{
                label: 'Delete',
                cssClass: 'btn-danger',
                action: function(d) {
                    var formId = '#frmRemSchedule';
                    var url    = $(formId).attr('action');

                    $.post(url, $(formId).serialize()).fail(function(res){console.log(res)}).done(function(res){
                        if(res.success) {
                            renode("{{URL::route('js_schedules')}}", '#conStations', d);
                        }
                        flashMessage('.msgError', res.msg);
                    });
                }
            }]
        });
    }

    function hasError_Schedule(formId){
        if(vd8Empty(formId + ' #arrivalDate', 'Arrival Date is required...')){return true}
        if(vd8Empty(formId + ' #arrivalTime', 'Arrival Time is required...')){return true}
        if(vd8Empty(formId + ' #departureDate', 'Departure Date is required...')){return true}
        if(vd8Empty(formId + ' #departureTime', 'Departure Time is required...')){return true}
    }

    function upsertNode(id, url, con4add, con4mod, dialog){
        url            = url.replace(':id',id);
        con4mod        = $(con4add).find(con4mod+id);
        var hasCon4mod = con4mod.length!=0;
        var mode       = hasCon4mod?{'mode':'mod'}:{'mode':'add'};

        $.get(url, mode).fail(function(res){console.log(res)}).done(function(res){
            if(hasCon4mod){$(con4mod).empty().append(res)}
            else{$(con4add).prepend(res)}
        }).always(function(){dialog.close()});
    }

    function insertNode(id, url, con, dialog){
        url = url.replace(':id',id);

        $.get(url).fail(function(res){console.log(res)}).done(function(res){
            $(con).empty().append(res);
        }).always(function(){dialog.close()});
    }

    function deleteNode(id, con4add, con4mod, dialog){
        $($(con4add).find(con4mod+id)).remove(); dialog.close();
    }
</script>
@stop