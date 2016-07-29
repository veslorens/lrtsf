<?php

$departureDate = $item->departure == "" ? "" : date("Y-m-d", strtotime($item->departure));
$departureTime = $item->departure == "" ? "" : date("H:i",   strtotime($item->departure));
$arrivalDate   = $item->arrival   == "" ? "" : date("Y-m-d", strtotime($item->arrival));
$arrivalTime   = $item->arrival   == "" ? "" : date("H:i",   strtotime($item->arrival));

?>

<div class="col-md-12">
<form id="frmUpsertSchedule" action="{{URL::route('storeSchedule')}}" class="form-horizontal">


    <div class="form-group">
        <label class="control-label col-sm-3" for="arrivalDate">Arrival Date</label>
        <div class="col-sm-9"><input type="date" class="form-control" max="9999-12-31" id="arrivalDate" name="arrivalDate" value="{{{$arrivalDate}}}"></div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-3" for="arrivalTime">Arrival Time</label>
        <div class="col-sm-9"><input type="time" class="form-control" id="arrivalTime" name="arrivalTime" value="{{{$arrivalTime}}}"></div>
    </div>


    <hr>


    <div class="form-group">
        <label class="control-label col-sm-3" for="departureDate">Departure Date</label>
        <div class="col-sm-9"><input type="date" class="form-control" max="9999-12-31" id="departureDate" name="departureDate" value="{{{$departureDate}}}"></div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-3" for="departureTime">Departure Time</label>
        <div class="col-sm-9"><input type="time" class="form-control" id="departureTime" name="departureTime" value="{{{$departureTime}}}"></div>
    </div>

    <input type="hidden" id="schedId" name="id" value="{{{$item->id}}}">
    <input type="hidden" id="stationId" name="stationId" value="{{{$item->stationId}}}">
    <span class="label label-danger msgError hidden"></span>
    {{Form::token()}}
</form>
</div>