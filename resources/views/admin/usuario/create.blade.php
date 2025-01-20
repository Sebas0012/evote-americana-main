@extends('admin.components.base', ['titulo' => 'Crear Usuario'])

@section('content')
    <div class="p-6 bg-white rounded-md shadow-md">
        <form method="POST" action="{{ route('admin.votante.store') }}">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
                <div>
                    <label class="text-gray-700" for="username">Nombre</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 border-2 py-2 px-2" type="text"
                        name="nombre">
                </div>

                <div>
                    <label class="text-gray-700" for="emailAddress">Correo Electrónico</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 border-2 py-2 px-2"
                        type="email" name="email">
                </div>

                <div>
                    <label class="text-gray-700" for="password">Contraseña</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 border-2 py-2 px-2"
                        type="password" name="password">
                </div>

                <div>
                    <label class="text-gray-700" for="password">Rol</label>
                    <select class="form-input w-full mt-2 rounded-md focus:border-indigo-600 border-2 py-2 px-2"
                        name="rol" id="rol">
                        <option value="administrador">Administrador</option>
                        <option value="escrutador">Escrutador</option>
                    </select>
                </div>
            </div>

            <div class="flex justify-end mt-4">
                <button
                    class="px-4 py-2 bg-gray-800 text-gray-200 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">Crear</button>
            </div>
        </form>
    </div>
@endsection
