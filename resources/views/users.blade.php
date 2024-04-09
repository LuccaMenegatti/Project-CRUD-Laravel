@extends('master')

@section('content')
  <div style="background-color: white; padding: 20px; border-radius: 10px; margin: 20px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">     
    <div style="display: flex; justify-content: space-between; align-items: center;">
      <h2>Usuários</h2>
      <a href="{{ 'users/create' }}" style="text-decoration: none; color: white; background-color: #F13B2F; padding: 10px 20px; border-radius: 5px; float: left; margin-left: 10px;">Criar Usuário</a>
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
                      <div style="display: flex;">

                        <a href="{{ route('users.edit', ['user' => $user]) }}">
                          <button style="background-color: #007bff; border: none; color: white; padding: 5px 10px; border-radius: 5px; margin-right: 5px;">Editar</button>
                        </a>

                        <button type="button" style="background-color: #F13B2F; border: none; color: white; padding: 5px 10px; border-radius: 5px; margin-right: 5px;" data-toggle="modal" data-target="#confirmDelete{{$user->id}}">
                          Excluir
                        </button>

                         <!-- Modal de confirmação de exclusão -->
                        <div class="modal fade" id="confirmDelete{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="confirmDeleteLabel">Confirmar Exclusão</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                Tem certeza de que deseja excluir este usuário?
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <!-- Formulário para exclusão do usuário -->
                                <form method="post" action="{{ route('users.destroy', $user->id) }}">
                                  @csrf
                                  @method("DELETE")  
                                  <button type="submit" class="btn" style="color: white; background-color:  #F13B2F">Excluir</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>


                      </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
  </div>
@endsection