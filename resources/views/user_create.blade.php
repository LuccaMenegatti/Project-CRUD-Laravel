@extends('master')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div style="background-color: white; padding: 20px; border-radius: 10px; margin: 20px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
        <h2 class="text-center">Criar Usuários</h2>
        <hr>

        @if (session()->has('message'))
          {{ session()->get('message')}}
        @endif

        <form action="{{ route('users.store')}}" method="POST" onsubmit="return validateForm()"> 
          @csrf
          <div class="text-left">
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="firstName" placeholder="Nome">
                <span id="errorFirstName" class="text-danger"></span>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="sobrenome">Sobrenome</label>
                <input type="text" class="form-control" id="sobrenome" name="lastName" placeholder="Sobrenome">
                <span id="errorLastName" class="text-danger"></span>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                <span id="errorEmail" class="text-danger"></span>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" id="senha" name="password" placeholder="Senha">
                <span id="errorPassword" class="text-danger"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-2">
              <button type="submit" class="btn btn-block" style="color: white; background-color: #F13B2F; margin-top: 20px;">Criar</button>
            </div>
            <div class="col-md-2">
              <a href="{{ route('users.index') }}" class="btn btn-block btn-secondary" style="margin-top: 20px;">Cancelar</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  function validateForm() {
    var firstName = document.getElementById("nome").value.trim();
    var lastName = document.getElementById("sobrenome").value.trim();
    var email = document.getElementById("email").value.trim();
    var password = document.getElementById("senha").value.trim();
    var isValid = true;

    if (firstName === "") {
      document.getElementById("errorFirstName").innerText = "Por favor, insira o primeiro nome.";
      isValid = false;
    } else {
      document.getElementById("errorFirstName").innerText = "";
    }

    if (lastName === "") {
      document.getElementById("errorLastName").innerText = "Por favor, insira o sobrenome.";
      isValid = false;
    } else {
      document.getElementById("errorLastName").innerText = "";
    }

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

