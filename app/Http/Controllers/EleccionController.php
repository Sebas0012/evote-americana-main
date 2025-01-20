<?php

namespace App\Http\Controllers;

use App\Models\Eleccion;
use Illuminate\Http\Request;

class EleccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elecciones = Eleccion::all();

        return view('admin.eleccion.index', ['elecciones' => $elecciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.eleccion.create');
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
            'fecha' => 'required',
            'hora_inicio' => 'required',
            'hora_cierre' => 'required',
        ]);

        $elecciones = Eleccion::create([
            'descripcion' => $request->descripcion,
            'fecha' => $request->fecha,
            'hora_inicio' => $request->hora_inicio,
            'hora_cierre' => $request->hora_cierre,
            'id_creador' => $request->user()->id ?? 1,
            'id_ultimo_modificador' => $request->user()->id ?? 1,
        ]);

        return redirect(route('admin.eleccion.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eleccion = Eleccion::findOrFail($id);

        return view('admin.eleccion.show', ['eleccion' => $eleccion]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $eleccion = Eleccion::findOrFail($id);

        return view('admin.eleccion.edit', ['eleccion' => $eleccion]);
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
            'fecha' => 'required',
            'hora_inicio' => 'required',
            'hora_cierre' => 'required',
        ]);

        $eleccion = Eleccion::find($id);

        $eleccion->update([
            'descripcion' => $request->descripcion,
            'fecha' => $request->fecha,
            'hora_inicio' => $request->hora_inicio,
            'hora_cierre' => $request->hora_cierre,
            'id_ultimo_modificador' => $request->user()->id ?? 1
        ]);

        return redirect(route('admin.eleccion.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eleccion = Eleccion::find($id);

        $eleccion->delete();

        return redirect(route('admin.eleccion.index'));
    }
}
