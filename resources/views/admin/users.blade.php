@extends('admin.layouts.master')

@section('title')
<title>Admin Usuários</title>
@endsection

@section('content')

<div class="container-fluid">

  <div class="panel panel-default">
    <div class="panel-heading"><h4>Usuários</h4></div>
    <div class="panel-body">
      <table class="table">
        @foreach($users as $user)
          <tr>
            <td>{{$user->getName()}}</td>
          </tr>
        @endforeach
      </table>
    </div>
  </div>


</div>

@endsection