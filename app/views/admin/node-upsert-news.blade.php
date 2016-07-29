@if($mode=='add')
<div id="news{{{$item->id}}}" class="panel panel-default">
@endif


    <div class="panel-heading">
    <div class="row">
        <div class="col-md-11 col-sm-10 col-xs-12" style="padding: 5px 15px">
            <h3 class="panel-title"><strong>{{{$item->title}}}</strong></h3>
        </div>
        <div class="col-md-1 col-sm-2 col-xs-12 toolbar">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <button type="button" onclick="upsertNews(this)" data-id="{{{$item->id}}}" title="Edit"   class="btn btn-xs btn-primary" style="margin-right: 3px"><i class="glyphicon glyphicon-pencil"></i></button>
                <button type="button" onclick="remNews(this)"    data-id="{{{$item->id}}}" title="Delete" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
            </div>
        </div>
    </div>
    </div>
    <div class="panel-body">
        <blockquote><footer>{{{$item->content}}}</footer></blockquote>
        <span class="pull-right timate"><samp>{{{ date("h:i A | d M Y", strtotime($item->created_at)) }}}</samp></span>
    </div>


@if($mode=='add')
</div>
@endif