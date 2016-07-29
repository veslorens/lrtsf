<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top bg-navy">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand text-cerulean" href="{{URL::route('main')}}">
                <i class="glyphicon glyphicon-road"></i>
                <strong>LRT <span class="text-white">San Fernando</span></strong>
            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="menu-item"><a href="{{URL::route('main')}}"><i class="glyphicon glyphicon-option-vertical text-cerulean"></i>Home</a></li>
                <li class="menu-item"><a href="{{URL::route('schedules')}}"><i class="glyphicon glyphicon-option-vertical text-cerulean"></i>Train Schedules</a></li>
                <li class="menu-item"><a href="{{URL::route('news')}}"><i class="glyphicon glyphicon-option-vertical text-cerulean"></i>News & Updates</a></li>
                <li class="menu-item"><a href="{{URL::route('login')}}"><i class="glyphicon glyphicon-option-vertical text-cerulean"></i>Log In</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>