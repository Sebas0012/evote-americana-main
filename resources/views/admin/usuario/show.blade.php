@extends('admin.components.base', ['titulo' => 'Ver Usuario'])

@section('content')
    <div class="p-6 bg-white rounded-md shadow-md">
        <form>
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
                <div>
                    <label class="text-gray-700" for="username">Nombre</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 border-2 py-2 px-2" type="text"
                        name="nombre" value="{{ $usuario->name }}" disabled>
                </div>

                <div>
                    <label class="text-gray-700" for="emailAddress">Correo Electrónico</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 border-2 py-2 px-2"
                        type="email" name="email" value="{{ $usuario->email }}" disabled>
                </div>
            </div>
        </form>
    </div>
@endsection
