<style>
    .skin-blue-light .main-header .navbar, 
    .skin-blue-light .main-header .logo,
    .skin-blue-light .main-header li.user-header,
    .skin-blue-light .main-header .navbar .sidebar-toggle:hover, 
    .skin-blue-light .main-header .logo:hover
    {
        background-color: #8ed1cd;
    }
</style>

<header class="main-header">
    <a href="{{route('home')}}" class="logo">
        <span class="logo-mini mst"><b>ERV</b></span>
        <span class="logo-lg mst" style="letter-spacing: .5px;"><b>ESRIVA</b></span>
    </a>
    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" id="nav-ham">
            <span class="sr-only">Toggle Navigasi</span>
        </a>
        <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        
            <!-- <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bell-o"></i>
                    <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="header">You have 10 notifications</li>
                    <li>
                    <ul class="menu">
                        <li>
                        <a href="#">
                            <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                        </li>
                        <li>
                        <a href="#">
                            <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                            page and may cause design problems
                        </a>
                        </li>
                        <li>
                        <a href="#">
                            <i class="fa fa-users text-red"></i> 5 new members joined
                        </a>
                        </li>
                        <li>
                        <a href="#">
                            <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                        </a>
                        </li>
                        <li>
                        <a href="#">
                            <i class="fa fa-user text-red"></i> You changed your username
                        </a>
                        </li>
                    </ul>
                    </li>
                    <li class="footer"><a href="#">View all</a></li>
                </ul>
            </li> -->

            <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user-circle-o" style="margin-right: 2.5px; margin-left: 2.5px;"></i>
                <span class="hidden-xs">{{auth()->user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
                <li class="user-header">
                    <img @if(auth()->user()->avatar == NULL) src="{{asset('lte/dist/img/default.png')}}" @else src="{{asset(auth()->user()->avatar)}}" @endif 
                         height="90" width="auto" style="border-radius: 50%;">

                    <!-- <img src="{{asset('lte/dist/img/default.png')}}" class="img-circle" alt="User Image"> -->
                    <p>
                        {{auth()->user()->name}}
                        <small>Terdaftar Sejak: {{auth()->user()->created_at->format('d-m-Y')}}</small>
                    </p>
                </li>
                <!-- MENU FOOTER-->
                <li class="user-footer">
                    <div class="pull-left">
                        <a href="{{route('profile.edit', auth()->user()->id)}}" class="btn btn-default btn-flat">Profil</a>
                    </div>
                    <div class="pull-right">
                        <!-- <a href="#" class="btn btn-default btn-flat">Keluar</a> -->
                        <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Keluar') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
            </li>
        </ul>
        </div>
    </nav>
</header>