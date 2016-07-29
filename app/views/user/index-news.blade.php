@extends('layouts.default')

@section('title')
    LRTSF - News & Updates
@stop

@section('content')
@include('layouts.navbar')

<div class="container bg-white">
<div class="starter-template">

    <div class="page-header">
        <h4 class="conHeader">
            <span class="char1st">N</span>EWS & <span class="char1st">U</span>PDATES
        </h4>
    </div>

    <div class="row">
        <div id="conNews" class="col-md-12" style="padding-top: 10px; padding-bottom: 10px;">
            @forelse($items as $item)
                <div class="panel panel-default">
                <div class="panel-body">
                    <blockquote>
                        <p>{{{$item->title}}}</p>
                        <footer>{{{$item->content}}}</footer>
                    </blockquote>
                    <span class="pull-right timate"><samp>{{{ date("h:i A | d M Y", strtotime($item->created_at)) }}}</samp></span>
                </div>
                </div>
            @empty
                <div class="alert alert-warning" role="alert">No content to display...</div>
            @endforelse
        </div>
    </div>
</div>
</div><!-- /.container -->

@include('layouts.footer')
@stop

@section('scripts')
<script>
window.setInterval(function(){
    // Node Manipulation
    var node = {
        'url' : "{{URL::route('js_refreshNews')}}",
        'con' : '#conNews'
    };
    refreshNode(node.url, node.con);
}, 2000);

function refreshNode(url, con){
    $.get(url).fail(function(res){console.log(res)}).done(function(res){
        $(con).empty().append(res);
    });
}
</script>
@stop