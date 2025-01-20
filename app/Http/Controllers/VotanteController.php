<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Votante;
use App\Imports\VotantesImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Eleccion;
use Carbon\Carbon;
use Carbon\CarbonTimeZone;

class VotanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $votantes = Votante::all();
        $time = Carbon::now(new CarbonTimeZone('America/Asuncion'));
        $eleccionActiva = Eleccion::where([
            ['fecha', '=', $time->format('Y-m-d')],
            ['hora_inicio', '>=', $time->format('h:i:s')],
            ['hora_cierre', '<', $time->format('h:i:s')]
        ])->get()->count() > 0 ? true : false;

        return view('admin.votante.index', compact('votantes', 'eleccionActiva'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $time = Carbon::now(new CarbonTimeZone('America/Asuncion'));
        $eleccionActiva = Eleccion::where([
            ['fecha', '=', $time->format('Y-m-d')],
            ['hora_inicio', '>=', $time->format('h:i:s')],
            ['hora_cierre', '<', $time->format('h:i:s')]
        ])->get()->count() > 0 ? true : false;

        if ($eleccionActiva) {
            return redirect()->route('admin.votante.index');
        }

        return view('admin.votante.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $time = Carbon::now(new CarbonTimeZone('America/Asuncion'));
        $eleccionActiva = Eleccion::where([
            ['fecha', '=', $time->format('Y-m-d')],
            ['hora_inicio', '>=', $time->format('h:i:s')],
            ['hora_cierre', '<', $time->format('h:i:s')]
        ])->get()->count() > 0 ? true : false;

        if ($eleccionActiva) {
            return redirect()->route('admin.votante.index');
        }

        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'identificacion' => 'required',
            'email' => 'required',
            'telefono' => 'required',
        ]);

        $votante = Votante::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'identificacion' => $request->identificacion,
            'email' => $request->email,
            'telefono' => $request->telefono,
        ]);

        return redirect(route('admin.votante.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $time = Carbon::now(new CarbonTimeZone('America/Asuncion'));
        $eleccionActiva = Eleccion::where([
            ['fecha', '=', $time->format('Y-m-d')],
            ['hora_inicio', '>=', $time->format('h:i:s')],
            ['hora_cierre', '<', $time->format('h:i:s')]
        ])->get()->count() > 0 ? true : false;

        if ($eleccionActiva) {
            return redirect()->route('admin.votante.index');
        }

        $votante = Votante::findOrFail($id);

        return view('admin.votante.show', compact('votante'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $time = Carbon::now(new CarbonTimeZone('America/Asuncion'));
        $eleccionActiva = Eleccion::where([
            ['fecha', '=', $time->format('Y-m-d')],
            ['hora_inicio', '>=', $time->format('h:i:s')],
            ['hora_cierre', '<', $time->format('h:i:s')]
        ])->get()->count() > 0 ? true : false;

        if ($eleccionActiva) {
            return redirect()->route('admin.votante.index');
        }

        $votante = Votante::findOrFail($id);

        return view('admin.votante.edit', ['votante' => $votante]);
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
        $time = Carbon::now(new CarbonTimeZone('America/Asuncion'));
        $eleccionActiva = Eleccion::where([
            ['fecha', '=', $time->format('Y-m-d')],
            ['hora_inicio', '>=', $time->format('h:i:s')],
            ['hora_cierre', '<', $time->format('h:i:s')]
        ])->get()->count() > 0 ? true : false;

        if ($eleccionActiva) {
            return redirect()->route('admin.votante.index');
        }

        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'identificacion' => 'required',
            'email' => 'required',
            'telefono' => 'required',
        ]);

        $votante = Votante::findOrFail($id)->update([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'identificacion' => $request->identificacion,
            'email' => $request->email,
            'telefono' => $request->telefono,
        ]);

        return redirect(route('admin.votante.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $time = Carbon::now(new CarbonTimeZone('America/Asuncion'));
        $eleccionActiva = Eleccion::where([
            ['fecha', '=', $time->format('Y-m-d')],
            ['hora_inicio', '>=', $time->format('h:i:s')],
            ['hora_cierre', '<', $time->format('h:i:s')]
        ])->get()->count() > 0 ? true : false;

        if ($eleccionActiva) {
            return redirect()->route('admin.votante.index');
        }

        $votante = Votante::find($id);

        $votante->delete();

        return redirect(route('admin.votante.index'));
    }

    public function import()
    {
        $time = Carbon::now(new CarbonTimeZone('America/Asuncion'));
        $eleccionActiva = Eleccion::where([
            ['fecha', '=', $time->format('Y-m-d')],
            ['hora_inicio', '>=', $time->format('h:i:s')],
            ['hora_cierre', '<', $time->format('h:i:s')]
        ])->get()->count() > 0 ? true : false;

        if ($eleccionActiva) {
            return redirect()->route('admin.votante.index');
        }

        return view('admin.votante.import');
    }

    public function importStore(Request $request)
    {
        $time = Carbon::now(new CarbonTimeZone('America/Asuncion'));
        $eleccionActiva = Eleccion::where([
            ['fecha', '=', $time->format('Y-m-d')],
            ['hora_inicio', '>=', $time->format('h:i:s')],
            ['hora_cierre', '<', $time->format('h:i:s')]
        ])->get()->count() > 0 ? true : false;

        if ($eleccionActiva) {
            return redirect()->route('admin.votante.index');
        }

        $importer = Excel::import(new VotantesImport, $request->file('excel'), null, \Maatwebsite\Excel\Excel::XLSX);

        return redirect()->route('admin.votante.index');
    }
}
