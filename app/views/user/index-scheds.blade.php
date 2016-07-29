@extends('layouts.default')

@section('title')
    LRTSF - Train Schedules
@stop

@section('content')
@include('layouts.navbar')

<div class="container bg-white">
<div class="starter-template">

    <div class="page-header">
        <h4 class="conHeader">
            <span class="char1st">T</span>RAIN <span class="char1st">S</span>CHEDULES
        </h4>
    </div>

    <div class="row">


        @forelse($stations as $station)
        <div class="col-md-12" style="padding-top: 10px; padding-bottom: 10px;">
            <div class="col-md-12" style="padding-left: 0;padding-right: 0;">
                <div class="panel panel-default panel-sched">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{{$station->name}}}</h3>
                    </div>
                    <div class="panel-body" style="padding:0;padding-top:15px;">

                        @forelse(Schedule::where('stationId', $station->id)->get() as $sched)
                        <div class="col-md-6">
                            <div class="panel panel-default">
                            <div class="panel-body">
                                <dl class="dl-horizontal schedule" style="margin:0">
                                    <dt>Arrival :</dt> <dd class="arrival text-gray" data-date="{{{$sched->arrival}}}"><samp>{{{ date("h:i A | d M Y", strtotime($sched->arrival)) }}}</samp></dd>
                                    <dt></dt> <dd class="text-success" style="margin-bottom:15px"><strong><span id="statusArrival{{{$sched->id}}}" class="statusArrival"></span></strong></dd>
                                    <dt>Departure :</dt> <dd class="departure text-gray" data-date="{{{$sched->departure}}}"><samp>{{{ date("h:i A | d M Y", strtotime($sched->departure)) }}}</samp></dd>
                                    <dt></dt> <dd class="text-danger"><strong><span id="statusDeparture{{{$sched->id}}}" class="statusDeparture"></span></strong></dd>
                                </dl>
                            </div>
                            </div>
                        </div>
                        @empty
                        <div class="alert alert-warning" role="alert" style="margin-right: 15px; margin-left: 15px;">No content to display...</div>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="alert alert-warning" role="alert" style="margin-right: 15px; margin-left: 15px;">No content to display...</div>
        @endforelse


    </div>
</div>
</div><!-- /.container -->

@include('layouts.footer')
@stop

@section('scripts')
<script>
    $('.schedule').each(function(i, obj) {
        var arrival = $(obj).find('.arrival').attr('data-date');
        var statusArrival = $(obj).find('.statusArrival').attr('id');
        CountDownTimer(arrival, statusArrival, 'Arriving in ', 'Arrived');

        var departure = $(obj).find('.departure').attr('data-date');
        var statusDeparture = $(obj).find('.statusDeparture').attr('id');
        CountDownTimer(departure, statusDeparture, 'Departing in ', 'Departed');
    });
</script>
@stop