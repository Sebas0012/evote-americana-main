@extends('admin.components.base', ['titulo' => 'Crear Lista'])

@section('content')
    <div class="p-6 bg-white rounded-md shadow-md">
        <form method="POST" action="{{ route('admin.lista.store') }}">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
                <div>
                    <label class="text-gray-700" for="username">Descripción</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 border-2 py-2 px-2" type="text"
                        name="descripcion">
                </div>

                <div>
                    <label class="text-gray-700" for="emailAddress">Elección</label>
                    <select class="form-input w-full mt-2 rounded-md focus:border-indigo-600 border-2 py-2 px-2"
                        name="eleccion">
                        @foreach ($elecciones as $eleccion)
                            <option value="{{ $eleccion->id }}">{{ $eleccion->descripcion }}</option>
                        @endforeach
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
