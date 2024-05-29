<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    public readonly Product $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function index()
    {
        $products = $this->product->all();
        return view('products', ['products' => $products]);
    }

    public function create()
    {
        return view(view: 'product_create');
    }

    public function store(Request $request)
    {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/images', $imageName);

        $created = $this->product->create([
            'name' => $request->input(key: 'name'),
            'description' => $request->input(key: 'description'),
            'price' => $request->input(key: 'price'),
            'quantity' => $request->input(key: 'quantity'),
            'image' => $imageName
        ]);

        if($created){
            return redirect()->route("products.index")->with('message', value: 'Criado com Sucesso!');
        }

        return redirect()->back()->with('message', value: 'Erro ao Criar!');
    }

    public function edit(Product $product)
    {
        return view('product_edit', ['product' => $product]);
    }


    public function update(Request $request, string $id)
    {
        $updated = $this->product->where('id', $id)->update($request->except(keys: ['_token', '_method']));
        if($updated){
            return redirect()->route("products.index")->with('message', value: 'Editado com Sucesso!');
        }

        return redirect()->back()->with('message', value: 'Erro ao Editar!');
    }

    public function destroy(string $id)
    {
        $this->product->where('id', $id)->delete();
        return redirect()->route("products.index")->with('message', value: 'Excluido com Sucesso!');
    }
}
