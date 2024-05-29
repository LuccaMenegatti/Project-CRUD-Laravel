@extends('master')

@section('content')

@if (session()->has('message'))
  {{ session()->get('message')}}
@endif

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div style="background-color: white; padding: 20px; border-radius: 10px; margin: 20px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
        <h2>Editar Produto</h2>
        <hr>
        <form action="{{ route('products.update', ['product' => $product->id]) }}" method="POST" onsubmit="return validateForm()"> 
          @csrf
          @method('PUT')
          <div class="text-left">
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
                <span id="errorName" class="text-danger"></span>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="description">Descrição</label>
                <textarea class="form-control" id="description" name="description">{{ old('description', $product->description ?? '') }}</textarea>
                <span id="errorDescription" class="text-danger"></span>
              </div>
            </div>
            <div class="form-row d-flex">
              <div class="form-group flex-grow-1 mr-3">
                <label for="price">Preço</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ $product->price }}">
                <span id="errorPrice" class="text-danger"></span>
              </div>
              <div class="form-group flex-grow-1">
                <label for="quantity">Quantidade</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $product->quantity }}">
                <span id="errorQuantity" class="text-danger"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-2">
              <button type="submit" class="btn btn-block" style="color: white; background-color: #F13B2F; margin-top: 20px;">Editar</button>
            </div>
            <div class="col-md-2">
              <a href="{{ route('products.index') }}" class="btn btn-block btn-secondary" style="margin-top: 20px;">Cancelar</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  function validateForm() {
    var name = document.getElementById("name").value.trim();
    var description = document.getElementById("description").value.trim();
    var price = document.getElementById("price").value.trim();
    var quantity = document.getElementById("quantity").value.trim();
    var isValid = true;

    if (name === "") {
      document.getElementById("errorName").innerText = "Por favor, insira o nome.";
      isValid = false;
    } else {
      document.getElementById("errorName").innerText = "";
    }

    if (description === "") {
      document.getElementById("errorDescription").innerText = "Por favor, insira a Descrição.";
      isValid = false;
    } else {
      document.getElementById("errorDescription").innerText = "";
    }

    if (price === "") {
      document.getElementById("errorPrice").innerText = "Por favor, insira o preço.";
      isValid = false;
    } else {
      document.getElementById("errorPrice").innerText = "";
    }

    if (quantity === "") {
      document.getElementById("errorQuantity").innerText = "Por favor, insira a quantidade.";
      isValid = false;
    } else {
      document.getElementById("errorQuantity").innerText = "";
    }

    return isValid;
  }
</script>

@endsection
