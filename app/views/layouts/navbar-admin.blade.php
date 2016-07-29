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
            <a class="navbar-brand text-cerulean" href="{{URL::route('dashboard')}}">
                <i class="glyphicon glyphicon-road"></i>
                <strong>LRT <span class="text-white">San Fernando</span></strong>
            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="menu-item"><a href="{{URL::route('dashboard')}}"><i class="glyphicon glyphicon-option-vertical text-cerulean"></i>Dashboard</a></li>
                <li class="dropdown menu-item">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="glyphicon glyphicon-option-vertical text-cerulean"></i>Administrator
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" style="font-size: 13px;">
                    <li><a href="{{URL::route('logout')}}"><i class="glyphicon glyphicon-log-out"></i> Log Out</a></li>

                    <li role="separator" class="divider"></li>
                    <li class="dropdown-header" style="letter-spacing: 3px;font-size: 10px;text-align: center;">MANAGE</li>
                    <li role="separator" class="divider"></li>

                    <li><a href="{{URL::route('manageSchedules')}}"><i class="glyphicon glyphicon-option-vertical"></i> Stations & Schedules</a></li>
                    <li><a href="{{URL::route('manageNews')}}"><i class="glyphicon glyphicon-option-vertical"></i> News & Updates</a></li>
                </ul>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>