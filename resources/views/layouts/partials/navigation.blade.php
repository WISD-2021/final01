<!-- Navigation -->
<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{ route('recipes.index') }}">Recipes</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        @if(\Illuminate\Support\Facades\Auth::check())
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="{{ route('recipes.index') }}">首頁</a>
                    </li>
                    <li>
                        <a href="{{ route('favorites.index') }}">我的最愛</a>
                    </li>
                    <li>
                        <a href="{{ route('manage.recipes.index') }}">管理後台</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('登出') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        @else
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="{{ route('recipes.index') }}">首頁</a>
                    </li>
                    <li>
                        <a href="{{ route('login') }}">我的最愛</a>
                    </li>
                    <li>
                        <a href="{{ route('login') }}">登入</a>
                    </li>
                </ul>
            </div>
        @endif
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
