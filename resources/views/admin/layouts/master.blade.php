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
                            <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Item</span>
                            <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
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
                <li><a href="{{ url('/admin') }}">Menu item 1</a></li>
                <li><a href="{{ url('/admin') }}">Menu item 2</a></li>
                <li><a href="{{ url('/admin') }}">Menu item 3</a></li>
                <li><a href="{{ url('/admin') }}">Menu item 4</a></li>
                <li><a href="{{ url('/admin') }}">Menu item 5</a></li>
            </ul>
        </div>

    </div>
    
</body>

</html>