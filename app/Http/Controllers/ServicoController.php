<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servico;
use App\Http\Resources\Servico as ServicoResource;

class servicoController extends Controller
{

    public function showResource($id){

        return new servicoResource(servico::find($id));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servico = servico::all();

        return $servico;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $servico = new servico;

        $servico->nome = $request->nome;
        $servico->duracao = $request->duracao;
        $servico->preco = $request->preco;
        $servico->desconto = $request->desconto;

        $servico->save();
        return $servico;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $servico =  servico::find($id);

        return $servico;
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
        $servico = servico::findorfail($id);

        $servico->nome = $request->nome;
        $servico->duracao = $request->duracao;
        $servico->preco = $request->preco;
        $servico->desconto = $request->desconto;

        $servico->save();
        return $servico;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $servico = servico::find($id);
        $servico->delete();

        return 'Servico deletado com sucesso!';
    }
}
