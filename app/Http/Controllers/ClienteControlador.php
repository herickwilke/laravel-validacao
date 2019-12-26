<?php

namespace App\Http\Controllers;

use App\Cliente;

use Illuminate\Http\Request;

class ClienteControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('novocliente');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|min:3|max:30|unique:clientes',
            'idade' => 'required',
            'endereco' => 'required|min:5',
            'email' => 'required'
        ];
        $mensagens = [
            'required' => 'O campo :attribute não pode estar em branco.', //Para fazer dinamico.
            'nome.required' => 'O campo nome é obrigatório.', //Para especificar/personalizar mais a fundo.
            'nome.min' => 'É necessário um nome com pelo menos 3 caracteres.',
            'nome.max' => 'O nome deve conter no máximo 30 caracteres.',
            'nome.unique' => 'O nome inserido já existe. Por favor, digite outro.',
            'endereco.required' => 'É necessário informar o endereço',
            'endereco.min' => 'É necessário informar um endereço com no mínimo 5 caracteres.',
            'email.required' => 'O campo e-mail é obrigatório.'
        ];
        $request->validate($regras, $mensagens);

        // $request->validate([
        //     'nome' => 'required|min:3|max:30|unique:clientes',
        //     'idade' => 'required',
        //     'endereco' => 'required|min:5',
        //     'email' => 'required'
        // ]);

        $cliente = New Cliente();
        $cliente->nome = $request->input('nome');
        $cliente->idade = $request->input('idade');
        $cliente->endereco = $request->input('endereco');
        $cliente->email = $request->input('email');
        $cliente->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
