<?php

namespace App\Http\Controllers;

use App\Models\Eleccion;
use Illuminate\Http\Request;
use App\Models\Lista;

class ListaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listas = Lista::all();

        return view('admin.lista.index', compact('listas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $elecciones = Eleccion::all();

        return view('admin.lista.create', compact('elecciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required',
            'eleccion' => 'required',
        ]);

        $lista = Lista::create([
            'descripcion' => $request->descripcion,
            'id_eleccion' => $request->eleccion,
        ]);

        return redirect(route('admin.lista.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $elecciones = Eleccion::all();
        $lista = Lista::findOrFail($id);

        return view('admin.lista.show', compact('elecciones', 'lista'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $elecciones = Eleccion::all();
        $lista = Lista::findOrFail($id);

        return view('admin.lista.edit', compact('elecciones', 'lista'));
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
        $request->validate([
            'descripcion' => 'required',
            'eleccion' => 'required',
        ]);

        $lista = Lista::findOrFail($id)->update([
            'descripcion' => $request->descripcion,
            'id_eleccion' => $request->eleccion,
        ]);

        return redirect(route('admin.lista.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lista = Lista::find($id);

        $lista->delete();

        return redirect(route('admin.lista.index'));
    }
}
