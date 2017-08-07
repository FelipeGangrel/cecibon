<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  
  @include('loja.layouts.meta')

  @yield('title')

  @include('loja.layouts.css')

  @yield('css')

</head>

<body role="document">

  @include('loja.layouts.nav')

  @yield('content')

  @include('loja.layouts.bottom')

  @include('loja.layouts.scripts')

  {{-- SweetAlerts --}}
  @include('sweet::alert')

  @yield('scripts') 

</body>
</html>