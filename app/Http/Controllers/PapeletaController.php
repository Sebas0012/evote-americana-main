<?php

namespace App\Http\Controllers;

use App\Models\Votante;
use Illuminate\Http\Request;
use Tzsk\Otp\Facades\Otp;
use Illuminate\Support\Facades\Mail;
use App\Mail\CodigoVerificacionEnviado;
use App\Models\Eleccion;
use App\Models\Lista;
use App\Models\RegistroVoto;
use App\Models\Voto;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cookie;

class PapeletaController extends Controller
{
    public function login()
    {
        return view('papeleta.login');
    }

    public function makeLogin(Request $request)
    {
        // Validar Request
        $request->validate([
            'email' => 'required',
            'identificacion' => 'required',
        ]);

        // Traer Votante
        $votante = Votante::where([
            'email' => $request->email,
            'identificacion' => $request->identificacion
        ])->first();

        if (!$votante) {
            return back()->withErrors([
                'nouser' => 'Credenciales Incorrectas'
            ]);
        }

        // Verificación Voto Doble
        $registroVoto = RegistroVoto::where('votante_id', $votante->id)->first();

        if ($registroVoto) {
            return back()->withErrors([
                'votante' => 'Ya ha participado de la votación del día'
            ]);
        }

        // Enviar Código de Verificación
        $codigoVerificacion = Otp::generate($votante->identificacion);
        Mail::to($votante->email)->send(new CodigoVerificacionEnviado($codigoVerificacion));

        // Respuesta con uid de Identificación
        return redirect()
            ->route('papeleta.verificacion')
            ->cookie('uid', $votante->identificacion);
    }

    public function verificacion(Request $request)
    {
        // Check si tiene uid de Identificación
        if (!$request->hasCookie('uid')) {
            return redirect()->route('papeleta.login');
        }

        return view('papeleta.verificacion');
    }

    public function makeVerificacion(Request $request)
    {
        // Check si tiene uid de Identificación
        if (!$request->hasCookie('uid')) {
            return redirect()->route('papeleta.login');
        }

        // Datos para verificación
        $userId = $request->cookie('uid');
        $verificacionValida = Otp::match($request->code, $userId);

        // Si verificación falla, retornar con error
        if (!$verificacionValida) {
            return back()->withErrors([
                'code' => 'Código de Verificación Inválido'
            ]);
        }

        // Traer elección activa
        $eleccion = Eleccion::first();

        // Generar token de voto
        $token = Str::random(32);

        // Guardar token de voto en DB
        Voto::create([
            'token' => $token
        ]);

        // Respuesta con token de votación y id de elección
        return redirect()
            ->route('papeleta.eleccion')
            ->cookie('votoToken', $token)
            ->cookie('eleccion', $eleccion->id);
    }

    public function eleccion(Request $request)
    {
        // Verificar que tenga un token valido
        if (!$request->hasCookie('votoToken')) {
            return redirect()->route('papeleta.login');
        }

        // Traer Elección con Candidatos
        $eleccionId = $request->cookie('eleccion');
        $listas = Lista::with('candidatos')->where('id_eleccion', $eleccionId)->get();

        return view('papeleta.eleccion', compact('listas'));
    }

    public function preEleccion(Request $request)
    {
        // Verificar que tenga un token valido
        if (!$request->hasCookie('votoToken')) {
            return redirect()->route('papeleta.login');
        }

        // Respuesta a página de confirmación de voto
        return redirect()->route('papeleta.confirmarEleccion', $request->lista);
    }

    public function confirmarEleccion(Request $request, $id)
    {
        // Verificar que tenga un token valido
        if (!$request->hasCookie('votoToken')) {
            return redirect()->route('papeleta.login');
        }

        // Retornar respuesta con datos de confirmar voto
        $listaElecta = Lista::with('candidatos')->where('id', $id)->first();
        return view('papeleta.confirm-eleccion', compact('listaElecta'));
    }

    public function makeConfirmarEleccion(Request $request)
    {
        // Verificar que tenga un token valido
        if (!$request->hasCookie('votoToken')) {
            return redirect()->route('papeleta.login');
        }

        // Datos para guardado de voto
        $token = $request->cookie('votoToken');
        $votanteId = $request->cookie('uid');
        $eleccion = $request->cookie('eleccion');
        $elegido = $request->lista;

        $voto = Voto::where('token', $token);

        // Traer Votante
        $votante = Votante::where([
            'identificacion' => $votanteId
        ])->first();

        $voto->update([
            'lista_id' => $elegido
        ]);

        RegistroVoto::create([
            'eleccion_id' => $eleccion,
            'votante_id' => $votante->id
        ]);

        Cookie::expire('uid');
        Cookie::expire('votoToken');
        Cookie::expire('eleccion');

        return view('papeleta.fin-eleccion');
    }
}
