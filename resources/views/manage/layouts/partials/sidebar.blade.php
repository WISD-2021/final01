<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ route('manage.recipes.index') }}">管理後台</a>
    </div>

    <div>
        <ul class="nav navbar-nav side-nav">
            <li class="nav-item">
                <a href="{{ route('manage.dashboard.index') }}"><i></i>主控台</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('manage.recipes.index') }}"><i></i>食譜管理</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('recipes.index') }}"><i></i>回主頁</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('登出') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" ">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <!--<div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li class="active">
                <a href=""><i class="fa fa-fw fa-dashboard"></i>主控台</a>
            </li>

        </ul>
    </div>-->
    <!-- /.navbar-collapse -->
</nav>

