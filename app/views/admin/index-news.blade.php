@extends('layouts.default')

@section('title')
    LRTSF - Manage News & Updates
@stop

@section('content')
@include('layouts.navbar-admin')
<div class="container">
<div class="starter-template">

    <div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <h4 class="conHeader" style="text-align: left!important;">
                <span class="char1st">N</span>EWS & <span class="char1st">U</span>DATES
            </h4>
        </div>

        <div class="col-md-6 col-sm-6 col-xs-12">
            <button type="button" onclick="upsertNews(this)" class="btn btn-sm btn-success pull-right hidden-xs" data-id="" style="margin-top:10px;margin-bottom:10px;"><i class="glyphicon glyphicon-plus"></i> <strong>Create</strong></button>
            <button type="button" onclick="upsertNews(this)" class="btn btn-sm btn-success btn-block visible-xs" data-id="" style="margin-top:10px;margin-bottom:10px;"><i class="glyphicon glyphicon-plus"></i> <strong>Create</strong></button>
        </div>
    </div>
    </div>

    <div class="row"><div id="conNews" class="col-md-12" style="padding-top: 10px; padding-bottom: 10px;">{{$node_news}}</div></div>
</div>
</div><!-- /.container -->

@include('layouts.footer')
@stop

@section('scripts')
<script>
    function upsertNews(obj){
        var dataId = $(obj).attr('data-id');
        var id     = isEmpty(dataId)?0:dataId;
        var label  = isEmpty(dataId)?{'title':'Add','button':'Create','btnType':'success'}:{'title':'Edit','button':'Update','btnType':'primary'};
        var geturl = "{{URL::route('upsertNews', [':id'])}}".replace(':id',id);

        BootstrapDialog.show({
            title: '<b>'+label.title+' News & Update</b>',
            message: $('<div class="row"></div>').load(geturl),
            buttons: [{
                label: label.button,
                cssClass: 'btn-' + label.btnType,
                action: function(d) {
                    var formId  = '#frmUpsertNews';
                    var posturl = $(formId).attr('action');

                    if(vd8Empty(formId + ' #title', 'News Title is required...')){return false}
                    if(vd8Empty(formId + ' #content', 'News Content is required...')){return false}
                    $('.msgError').addClass('hidden');

                    $.post(posturl, $(formId).serialize()).fail(function(res){alert(res)}).done(function(res){
                        if(res.success){
                            renode("{{URL::route('js_news')}}", '#conNews', d);
                        }
                        flashMessage('.msgError', res.msg);
                    });
                }
            }]
        });
    }

    function remNews(obj){
        var dataId = $(obj).attr('data-id');

        var _form= '<form id="frmRemNews" action="{{URL::route('destroyNews')}}"> \
                        <input type="hidden" name="id" value="'+ dataId +'"> \
                        <b class="text-danger">Are you sure you want to delete this record?</b> \
                        <span class="label label-danger msgError hidden"></span> \
                        {{Form::token()}} \
                    </form>';

        BootstrapDialog.show({
            title: '<b>Delete News & Update</b>',
            message: _form,
            buttons: [{
                label: 'Delete',
                cssClass: 'btn-danger',
                action: function(d) {
                    var formId = '#frmRemNews';
                    var url    = $(formId).attr('action');

                    $.post(url, $(formId).serialize()).fail(function(res){alert(res)}).done(function(res){
                        if(res.success) {
                            renode("{{URL::route('js_news')}}", '#conNews', d);
                        }
                        flashMessage('.msgError', res.msg);
                    }).always(function(){d.close()});
                }
            }]
        });
    }


</script>
@stop