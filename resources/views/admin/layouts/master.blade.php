<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('admin.layouts.meta')
    @yield('title')
    @include('admin.layouts.css')
    @yield('css')
</head>

<body role="document">

    <input type="checkbox" checked id="sidebar-toggler">

    <div class="page-wrap">

        <nav id="navbar">
            

                <div class="toggler">
                    <label id="toggle" for="sidebar-toggler"><i class="fa fa-bars"></i></label>
                </div>

                <div class="menu">
                    <ul class="list-unstyled">
                        <li class="btn-group">
                            <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <a href="">{{ Auth::user()->getName() }}</a>
                            </span>
                            <ul class="dropdown-menu" style="left: auto; right: 0">
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        
                    </ul>
                </div>

            
        </nav>

        <div id="page-content">
            @yield('content')
        </div>

        @include('admin.layouts.scripts')

        @include('sweet::alert')

        @yield('scripts') 

        <div id="sidebar">
            <ul class="list-unstyled">
                <li><a href="{{ url('/admin') }}">Home</a></li>
                <li><a href="{{ url('/admin/produtos') }}">Produtos</a></li>
                <li><a href="{{ url('/admin/usuarios') }}">Usuários</a></li>
                <li><a href="{{ url('/admin') }}">Menu item 4</a></li>
                <li><a href="{{ url('/admin') }}">Menu item 5</a></li>
            </ul>
        </div>

    </div>
    
</body>

</html>