@extends('master')

@section('content')

<h2>teste</h2>

<form method="post" action="{{ route('users.destroy', $user->id) }}">
  @csrf
  @method("DELETE")
  
  <button type="submit">Excluir</button>
   
</form>


@endsection