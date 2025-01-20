@extends('admin.components.base', ['titulo' => 'Ver Lista'])

@section('content')
    <div class="p-6 bg-white rounded-md shadow-md">
        <form>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
                <div>
                    <label class="text-gray-700" for="username">Descripción</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 border-2 py-2 px-2" type="text"
                        name="descripcion" value="{{ $lista->descripcion }}" disabled>
                </div>

                <div>
                    <label class="text-gray-700" for="emailAddress">Elección</label>
                    <select class="form-input w-full mt-2 rounded-md focus:border-indigo-600 border-2 py-2 px-2"
                        name="eleccion" disabled>
                        @foreach ($elecciones as $eleccion)
                            <option
                                value="{{ $eleccion->id }} {{ $eleccion->id === $lista->id_eleccion ? 'selected' : '' }}">
                                {{ $eleccion->descripcion }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>
    </div>
@endsection
