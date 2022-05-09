<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use App\Models\Cliente;
use App\Models\Cuenta;

use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Redirect;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $clientes = Cliente::all();
        $cuentas = Cuenta::all();

        //dd($cuentas[0]->clientes);

        //dd($clientes[0]->cuentas[0]->numero);

        return view('clientes.index',['clientes'=>$clientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cliente = new Cliente();

        return view('clientes.create',['cliente'=>$cliente]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClienteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClienteRequest $request)
    {
        $validado= $request->validated();
        $cliente = new Cliente($validado);

        $cliente->save();

        return redirect()->route('clientes.index')->with('success', 'cliente creado correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        return view('clientes.show',['cliente'=>$cliente]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        
        return view('clientes.edit',['cliente'=>$cliente,
                                        'cuentas'=>Cuenta::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClienteRequest  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClienteRequest $request, Cliente $cliente)
    {
        //dd($request->nCuenta);

        $validado = $request->validated();
        $cliente->fill($validado);

        $cliente->save();
        
        $cliente->cuentas()->syncWithoutDetaching($request->nCuenta);


        //dd($request->bajaTitular);
        if($request->bajaTitular){

            $cliente->cuentas()->detach($request->bajaTitular);
        }


        return Redirect()->route('clientes.index')->with('success', 'cliente modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->cuentas()->detach();
        $cliente->delete();

        return Redirect()->route('clientes.index')->with('success', 'cliente borrado correctamente');

    }
}
