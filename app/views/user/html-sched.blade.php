

<div class="col-md-12">
    @forelse($items as $sched)
    <div class="col-md-12">
        <div class="panel panel-default">
        <div class="panel-body">
            <dl class="dl-horizontal schedule" style="margin:0">
                <dt>Arrival :</dt> <dd class="arrival text-gray" data-date="{{{$sched->arrival}}}"><samp>{{{ date("h:i A | d M Y", strtotime($sched->arrival)) }}}</samp></dd>
                <dt></dt> <dd class="text-success" style="margin-bottom: 15px"><strong><span id="statusArrival{{{$sched->id}}}" class="statusArrival"></span></strong></dd>
                <dt>Departure :</dt> <dd class="departure text-gray" data-date="{{{$sched->departure}}}"><samp>{{{ date("h:i A | d M Y", strtotime($sched->departure)) }}}</samp></dd>
                <dt></dt> <dd class="text-danger"><strong><span id="statusDeparture{{{$sched->id}}}" class="statusDeparture"></span></strong></dd>
            </dl>
        </div>
        </div>
    </div>
    @empty
        <div class="alert alert-warning" role="alert">No content to display...</div>
    @endforelse
</div>



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