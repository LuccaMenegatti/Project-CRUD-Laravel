@extends('master')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Login</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Senha</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        @if (session()->has('message'))
                        @php
                            $message = session()->get('message');
                        @endphp
                        <div class="alert alert-danger mt-3" role="alert">
                            {{ $message }}
                        </div>
                        @endif

                        <button type="submit" class="btn btn-block mt-3" style="color: white; background-color: #F13B2F;">
                            Entrar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function validateForm() {
      var email = document.getElementById("email").value.trim();
      var password = document.getElementById("senha").value.trim();
      var isValid = true;
  
      if (email === "") {
        document.getElementById("errorEmail").innerText = "Por favor, insira o email.";
        isValid = false;
      } else {
        document.getElementById("errorEmail").innerText = "";
      }
  
      if (password === "") {
        document.getElementById("errorPassword").innerText = "Por favor, insira a senha.";
        isValid = false;
      } else {
        document.getElementById("errorPassword").innerText = "";
      }
  
      return isValid;
    }
</script>

@endsection
