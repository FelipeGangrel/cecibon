@extends('admin.layouts.master')

@section('title')
<title>Admin Usuários</title>
@endsection

@section('content')

<div class="container-fluid">

  <div class="panel panel-default">
    <div class="panel-heading"><h4>Usuários</h4></div>
    <div class="panel-body">
      <user-grid></user-grid>
    </div>
  </div>

</div>

@endsection