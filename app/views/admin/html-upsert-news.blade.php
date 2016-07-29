<div class="col-md-12">
<form id="frmUpsertNews" action="{{URL::route('storeNews')}}">

    <div class="form-group">
        <label class="control-label" for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Enter news title here..." value="{{{$item->title}}}">
    </div>

    <div class="form-group">
        <label class="control-label" for="content">Content</label>
        <textarea class="form-control" rows="4" id="content" name="content" placeholder="Enter news content here...">{{{$item->content}}}</textarea>
    </div>

    <input type="hidden" id="newsId" name="id" value="{{{$item->id}}}">
    <span class="label label-danger msgError hidden"></span>
    {{Form::token()}}
</form>
</div>