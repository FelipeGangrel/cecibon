@extends('admin.layouts.master')

@section('title')
<title>Admin Produtos</title>
@endsection

@section('content')

<div class="container-fluid">

  <div class="panel panel-default">
    <div class="panel-heading"><h4>Produtos</h4></div>
    <div class="panel-body">
      <product-grid></product-grid>
    </div>
  </div>


</div>

@endsection