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