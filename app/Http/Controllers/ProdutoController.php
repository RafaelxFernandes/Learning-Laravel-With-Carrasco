<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Http\Resources\Produto as ProdutoResource;

class produtoController extends Controller
{

    public function showResource($id){

        return new produtoResource(produto::find($id));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produto = produto::all();

        return $produto;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produto = new produto;

        $produto->nome = $request->nome;
        $produto->quantidade = $request->quantidade;
        $produto->preco = $request->preco;
        $produto->tipo = $request->tipo;

        $produto->save();
        return $produto;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto =  produto::find($id);

        return $produto;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produto = produto::findorfail($id);

        $produto->nome = $request->nome;
        $produto->quantidade = $request->quantidade;
        $produto->preco = $request->preco;
        $produto->tipo = $request->tipo;

        $produto->save();
        return $produto;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = produto::find($id);
        $produto->delete();

        return 'Produto deletado com sucesso!';
    }
}
