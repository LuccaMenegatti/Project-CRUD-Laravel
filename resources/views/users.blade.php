@extends('master')

@section('content')

<h2>Users</h2>

<hr>

<a href="{{ 'users/create' }}">Criar Usuario</a>

@if (session()->has('message'))
  {{ session()->get('message')}}
@endif

<table class="table table-borderless">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Nome</th>
      <th scope="col">Sobrenome</th>
      <th scope="col">Email</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
      <tr>
        <th scope="row">{{$user->id}}</th>
        <td>{{$user->firstName}}</td>
        <td>{{$user->lastName}}</td>
        <td>{{$user->email}}</td>
        <td> 
          <a href="{{ route('users.edit', ['user' => $user]) }}">
            Editar
          </a>
          teste
          <a href="{{ route('users.show', ['user' => $user]) }}">
            Show
          </a>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>

@endsection