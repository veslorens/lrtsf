<div class="col-md-12">
<form id="frmUpsertStation" action="{{URL::route('storeStation')}}">

    <div class="form-group">
        <label class="control-label" for="name">Station Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter station name here..." value="{{{$item->name}}}">
    </div>

    <input type="hidden" id="newsId" name="id" value="{{{$item->id}}}">
    <span class="label label-danger msgError hidden"></span>
    {{Form::token()}}
</form>
</div>