<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ url('admin') }}">{{ config('admin.title') }}</a>
    </div>

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> {{ Auth::user()->name }} <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="{{ url('logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
        </li>
    </ul>

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                @foreach (config('admin.menu') as $key => $item)
                    <li>
                        <a href="{{ url("admin/$key") }}">
                            <i class="fa fa-{{ $item['icon'] }} fa-fw"></i>
                            <span>{{ $item['label'] }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>