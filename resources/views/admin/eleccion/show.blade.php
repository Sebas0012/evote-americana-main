@extends('admin.components.base', ['titulo' => 'Ver Elección'])

@section('content')
    <div class="p-6 bg-white rounded-md shadow-md">
        <form>
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
                <div>
                    <label class="text-gray-700" for="username">Descripción</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 border-2 py-2 px-2" type="text"
                        disabled name="descripcion" value="{{ $eleccion->descripcion }}">
                </div>

                <div>
                    <label class="text-gray-700" for="emailAddress">Fecha</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 border-2 py-2 px-2"
                        type="date" disabled name="fecha" value="{{ $eleccion->fecha }}">
                </div>

                <div>
                    <label class="text-gray-700" for="password">Hora Inicio</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 border-2 py-2 px-2"
                        type="time" disabled name="hora_inicio" value="{{ $eleccion->hora_inicio }}">
                </div>

                <div>
                    <label class="text-gray-700" for="passwordConfirmation">Hora Cierre</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 border-2 py-2 px-2"
                        type="time" disabled name="hora_cierre" value="{{ $eleccion->hora_cierre }}">
                </div>
            </div>
        </form>
    </div>
@endsection
