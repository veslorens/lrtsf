@extends('layouts.default')

@section('title')
    LRT San Fernando
@stop

@section('body')
{{ 'class="bg-white"' }}
@stop

@section('content')
@include('layouts.navbar')

<div class="container bg-white">
<div class="starter-template">

    <div class="page-header">
        <h4 class="conHeader">
            <span class="char1st">T</span>RAIN <span class="char1st">S</span>TATIONS
        </h4>
    </div>

    <div class="row">
        @forelse($items as $item)
            <div class="col-md-6 text-center" style="padding-top: 10px; padding-bottom: 10px;">
                <div class="col-md-12 panelton-success popSchedule" data-text="{{{$item->name}}}" data-id="{{{$item->id}}}">
                    {{{$item->name}}}
                </div>
            </div>
        @empty
            <div class="alert alert-warning" role="alert">No content to display...</div>
        @endforelse
    </div>
</div>
</div><!-- /.container -->

@include('layouts.footer')
@stop

@section('scripts')
<script>
    $( ".panelton-success" ).hover(function() {
        $(this).empty().append('<i class="glyphicon glyphicon-eye-open"></i> Show Train Schedule')
            .css('text-transform', 'none');
    }, function() {
        $(this).text($(this).attr('data-text'))
            .css('text-transform', 'uppercase');
    });

    $( ".popSchedule" ).click(function(){
        var title = '<b>Train Schedule - '+$(this).attr('data-text')+'</b>';
        var url = "{{URL::route('js_schedule', [':id'])}}".replace(':id', $(this).attr('data-id'));

        BootstrapDialog.show({
            title: title,
            message: $('<div class="row"></div>').load(url)
        });
    });
</script>
@stop