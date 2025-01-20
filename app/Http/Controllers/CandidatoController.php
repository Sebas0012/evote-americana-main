<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\Lista;
use Illuminate\Http\Request;

class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidatos = Candidato::all();

        return view('admin.candidato.index', compact('candidatos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listas = Lista::all();

        return view('admin.candidato.create', compact('listas'));
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
            'nombre' => 'required',
            'apellido' => 'required',
            'lista' => 'required',
            'foto' => 'required',
        ]);

        $foto = $request->file('foto');

        $path = $foto->store('images', 'public');

        $candidato = Candidato::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'id_lista' => $request->lista,
            'url_foto' => $path,
        ]);

        return redirect(route('admin.candidato.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $candidato = Candidato::findOrFail($id);
        $listas = Lista::all();

        return view('admin.candidato.show', compact('candidato', 'listas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listas = Lista::all();
        $candidato = Candidato::findOrFail($id);

        return view('admin.candidato.edit', compact('listas', 'candidato'));
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
            'nombre' => 'required',
            'apellido' => 'required',
            'lista' => 'required',
        ]);

        $candidato = Candidato::findOrFail($id);

        if ($request->has('foto')) {
            $path = $request->foto->store('storage', 'public');
        } else {
            $path = $candidato->url_foto;
        }

        $candidato->update([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'id_lista' => $request->lista,
            'url_foto' => $path,
        ]);

        return redirect(route('admin.candidato.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $candidato = Candidato::find($id);

        $candidato->delete();

        return redirect(route('admin.candidato.index'));
    }
}
