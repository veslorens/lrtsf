@if($mode=='add')
<span class="stationId" id="{{{$station->id}}}" style="display:none"></span>
<div id="station{{{$station->id}}}" class="conStation panel panel-default" style="margin-bottom:15px;">
@endif


    <div class="panel-heading" role="tab" id="heading{{{$station->id}}}">
    <div class="row">
        <div class="col-md-9 col-sm-8 col-xs-12" style="padding: 5px 15px;">
            <h3 class="panel-title" style="font-weight: bold; text-transform: uppercase; letter-spacing: 2px;font-size: 13px;">
                <i class="glyphicon glyphicon-chevron-right"></i>
                <a role="button" data-toggle="collapse" data-parent="#stations" href="#bodyStation{{{$station->id}}}" aria-expanded="true" aria-controls="bodyStation{{{$station->id}}}">
                    {{$station->name}}
                </a>
            </h3>
        </div>
        <div class="col-md-3 col-sm-4 col-xs-12 toolbar">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <button type="button" onclick="upsertSchedule(this)" data-id="" class="btn btn-xs btn-default text-success" style="margin-right: 3px; font-weight: bold;"><i class="glyphicon glyphicon-plus"></i> Add Schedule</button>
                <button type="button" onclick="upsertStation(this)"  data-id="{{{$station->id}}}" class="btn btn-xs btn-primary" style="margin-right: 3px"><i class="glyphicon glyphicon-pencil"></i></button>
                <button type="button" onclick="remStation(this)"     data-id="{{{$station->id}}}" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
            </div>
        </div>
    </div>
    </div>

    <div id="bodyStation{{{$station->id}}}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading{{{$station->id}}}">
        <div id="conSchedule{{{$station->id}}}" class="panel-body" style="padding: 15px 0 0 0;">


            @forelse(Schedule::where('stationId', $station->id)->get() as $sched)
            <div id="schedule{{{$sched->id}}}" class="col-md-6" style="padding: 0 15px 15px 15px;">
                <div class="panel panel-default">
                <div class="panel-body">
                    <dl class="dl-horizontal" style="margin:0">
                        <dt>Departure :</dt> <dd class="text-gray"><samp>{{{ date("h:i A | d M Y", strtotime($sched->departure)) }}}</samp></dd>
                        <dt>Arrival :</dt> <dd class="text-gray"><samp>{{{ date("h:i A | d M Y", strtotime($sched->arrival)) }}}</samp></dd>
                    </dl>
                    <div class="btn-group" role="group" aria-label="..." style="position: absolute;top: 5px;right: 20px;">
                        <button type="button" onclick="upsertSchedule(this)" data-id="{{{$sched->id}}}" class="btn btn-xs btn-default text-primary" style="margin-right: 3px"><i class="glyphicon glyphicon-pencil"></i></button>
                        <button type="button" onclick="remSchedule(this)"    data-id="{{{$sched->id}}}" class="btn btn-xs btn-default text-danger"><i class="glyphicon glyphicon-remove"></i></button>
                    </div>
                </div>
                </div>
            </div>
            @empty
            <div class="alert alert-warning" role="alert" style="margin-right: 15px; margin-left: 15px;">No content to display...</div>
            @endforelse


        </div>
    </div>


@if($mode=='add')
</div>
@endif