@extends('master')

@section('content')

<h2>Edit</h2>

@if (session()->has('message'))
  {{ session()->get('message')}}
@endif

<form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST"> 
  @csrf
  @method('PUT')
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nome">Nome</label>
      <input type="text" class="form-control" id="nome" name="firstName" value="{{ $user->firstName }}">
    </div>
    <div class="form-group col-md-6">
      <label for="sobrenome">Sobrenome</label>
      <input type="text" class="form-control" id="sobrenome" name="lastName" value="{{ $user->lastName }}">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Editar</button>
</form>

@endsection