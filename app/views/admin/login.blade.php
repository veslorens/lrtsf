@extends('layouts.default')

@section('title')
    LRTSF - Log In
@stop

@section('content')
@include('layouts.navbar')
<div class="container">
<div class="starter-template">

    <div class="page-header">
        <h4 class="conHeader">
            <span class="char1st">A</span>DMIN <span class="char1st">L</span>OGIN
        </h4>
    </div>

    <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6" style="padding-top: 10px; padding-bottom: 10px;">

        <div class="col-md-12 panel-one">
            <form id="frmLogin" action="{{URL::route('doLogin')}}" onsubmit="return false">
                {{Form::token()}}
                <div class="form-group">
                    <label for="username">USERNAME</label>
                    <div class="input-group">
                        <span class="input-group-addon" id="icoUsername"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" id="username" name="username" class="form-control" placeholder="Username" aria-describedby="icoUsername">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">PASSWORD</label>
                    <div class="input-group">
                        <span class="input-group-addon" id="icoPassword"><i class="glyphicon glyphicon-option-horizontal"></i></span>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password" aria-describedby="icoPassword">
                    </div>
                </div>

                <span class="label label-danger msgError hidden"></span>

                <div class="col-md-12 conButton">
                    <button class="btn btn-primary btn-one doLogin"><i class="glyphicon glyphicon-log-in"></i> LOG IN</button>
                </div>
            </form>
        </div>

    </div>
    <div class="col-md-3"></div>
    </div>
</div>
</div><!-- /.container -->

@include('layouts.footer')
@stop

@section('scripts')
<script>
$('.doLogin').click(function(){
    if(vd8Empty('#username', 'Enter your username...')){return false}
    if(vd8Empty('#password', 'Enter your password...')){return false}
    $('.msgError').addClass('hidden');

    var form   = $(this).closest('form');
    var formId = '#'+form.attr('id');
    var url    = form.attr('action');

    $.post(url, $(formId).serialize()).fail(function(res){alert(res)}).done(function(res){
        if(res.success) {
            location.replace(res.data.url);
        }

        flashMessage('.msgError', res.msg);
    });
});
</script>
@stop