@extends('master')

@section('content')

<h2>Home</h2>

<a href="{{ route('users.index') }}">
  Usuarios
</a>

@endsection