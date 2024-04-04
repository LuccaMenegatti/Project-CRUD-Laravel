<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public readonly User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function index()
    {
        $users = $this->user->all();
        return view('users', ['users' => $users]);
    }

    public function create()
    {
        return view(view: 'user_create');
    }

    public function store(Request $request)
    {
        $created = $this->user->create([
            'firstName' => $request->input(key: 'firstName'),
            'lastName' => $request->input(key: 'lastName'),
            'email' => $request->input(key: 'email'),
            'password' => password_hash($request->input(key: 'password'), algo: PASSWORD_DEFAULT),
        ]);

        if($created){
            return redirect()->route("users.index")->with('message', value: 'Criado com Sucesso!');
        }

        return redirect()->back()->with('message', value: 'Erro ao Criar!');

    }

    public function show(user $user)
    {
        return view(view: 'user_show', data: ['user' => $user]);
    }


    public function edit(User $user)
    {
        return view('user_edit', ['user' => $user]);
    }


    public function update(Request $request, string $id)
    {
        $updated = $this->user->where('id', $id)->update($request->except(keys: ['_token', '_method']));
        if($updated){
            return redirect()->route("users.index")->with('message', value: 'Editado com Sucesso!');
        }

        return redirect()->back()->with('message', value: 'Erro ao Editar!');
    }

    public function destroy(string $id)
    {
        $this->user->where('id', $id)->delete();
        return redirect()->route("users.index")->with('message', value: 'Excluido com Sucesso!');
    }
}
