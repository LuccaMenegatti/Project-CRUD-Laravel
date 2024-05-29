@extends('master') 

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <div style="background-color: white; padding: 20px; border-radius: 10px; margin: 20px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <h2>Produtos</h2>
                    <a href="{{ 'products/create' }}" style="text-decoration: none; color: white; background-color: #F13B2F; padding: 10px 20px; border-radius: 5px; float: left; margin-left: 10px;">Criar Produtos</a>
                </div>
                <hr>

                @if (session()->has('message'))
                    @php
                        $message = session()->get('message');
                        $alertClass = strpos($message, 'Editado com Sucesso!') !== false || strpos($message, 'Criado com Sucesso!') !== false ? 'alert-success' : 'alert-danger';
                    @endphp
                    <div class="alert {{ $alertClass }}" role="alert">
                        {{ $message }}
                    </div>
                @endif

                <div class="row">
                    @foreach($products as $product)
                        <div class="col-md-4 mb-4">
                            <div class="card" style="width: 100%;">
                              @if($product->image)
                              <img class="card-img-top" src="{{ asset('storage/images/' . $product->image) }}" alt="Imagem de capa do card">
                              @else
                              <img class="card-img-top" src="https://via.placeholder.com/150" alt="Imagem de capa do card">
                              @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{$product->name}} - R${{$product->price}}</h5>
                                    <p class="card-text">{{$product->description}}</p>

                                    <div class="d-flex">
                                        <a href="{{ route('products.edit', ['product' => $product]) }}">
                                            <button class="btn btn-primary">Editar</button>
                                        </a>

                                        <button type="button" class="btn btn-danger ml-3" data-toggle="modal" data-target="#confirmDelete{{$product->id}}">
                                            Excluir
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal de confirmação de exclusão -->
                        <div class="modal fade" id="confirmDelete{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmDeleteLabel">Confirmar Exclusão</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Tem certeza de que deseja excluir este produto?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                                        <!-- Formulário para exclusão do usuário -->
                                        <form method="post" action="{{ route('products.destroy', $product->id) }}">
                                            @csrf
                                            @method("DELETE")  
                                            <button type="submit" class="btn btn-danger">Excluir</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection