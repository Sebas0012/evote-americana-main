@extends('admin.components.base', ['titulo' => 'Crear Elección'])

@section('content')
    <div class="p-6 bg-white rounded-md shadow-md">
        <form method="POST" action="{{ route('admin.eleccion.store') }}">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
                <div>
                    <label class="text-gray-700" for="username">Descripción</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 border-2 py-2 px-2" type="text"
                        name="descripcion">
                </div>

                <div>
                    <label class="text-gray-700" for="emailAddress">Fecha</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 border-2 py-2 px-2"
                        type="date" name="fecha">
                </div>

                <div>
                    <label class="text-gray-700" for="password">Hora Inicio</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 border-2 py-2 px-2"
                        type="time" name="hora_inicio">
                </div>

                <div>
                    <label class="text-gray-700" for="passwordConfirmation">Hora Cierre</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 border-2 py-2 px-2"
                        type="time" name="hora_cierre">
                </div>
            </div>

            <div class="flex justify-end mt-4">
                <button
                    class="px-4 py-2 bg-gray-800 text-gray-200 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">Crear</button>
            </div>
        </form>
    </div>
@endsection
