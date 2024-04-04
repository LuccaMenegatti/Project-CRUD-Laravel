@extends('master')

@section('content')

<h2>Criar</h2>

@if (session()->has('message'))
  {{ session()->get('message')}}
@endif

<form action="{{ route('users.store')}}" method="POST"> 
  @csrf
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nome">Nome</label>
      <input type="text" class="form-control" id="nome" name="firstName" placeholder="Nome">
    </div>
    <div class="form-group col-md-6">
      <label for="sobrenome">Sobrenome</label>
      <input type="text" class="form-control" id="sobrenome" name="lastName" placeholder="Sobrenome">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Email">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="senha">Senha</label>
      <input type="password" class="form-control" id="senha" name="password" placeholder="Senha">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Criar Usuario</button>
</form>

@endsection