@extends('admin.components.base', ['titulo' => 'Ver Votante'])

@section('content')
    <div class="p-6 bg-white rounded-md shadow-md">
        <form>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
                <div>
                    <label class="text-gray-700" for="username">Nombre</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 border-2 py-2 px-2" type="text"
                        name="nombre" value="{{ $votante->nombre }}" disabled>
                </div>
                <div>
                    <label class="text-gray-700" for="username">Apellido</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 border-2 py-2 px-2"
                        type="text" name="apellido" value="{{ $votante->apellido }}" disabled>
                </div>
                <div>
                    <label class="text-gray-700" for="username">Identificación</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 border-2 py-2 px-2"
                        type="text" name="identificacion" value="{{ $votante->identificacion }}" disabled>
                </div>
                <div>
                    <label class="text-gray-700" for="emailAddress">Correo Electrónico</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 border-2 py-2 px-2"
                        type="email" name="email" value="{{ $votante->email }}" disabled>
                </div>
                <div>
                    <label class="text-gray-700" for="password">Teléfono</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 border-2 py-2 px-2"
                        type="tel" name="telefono" value="{{ $votante->telefono }}" disabled>
                </div>
            </div>
        </form>
    </div>
@endsection
