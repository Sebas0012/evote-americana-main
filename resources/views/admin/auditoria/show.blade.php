@extends('admin.components.base', ['titulo' => 'Ver Registro'])

@section('content')
    <div class="p-6 bg-white rounded-md shadow-md">
        <form>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
                <div>
                    <label class="text-gray-700" for="username">Evento</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 border-2 py-2 px-2" type="text"
                        value="{{ $registro->event }}" disabled>
                </div>
                <div>
                    <label class="text-gray-700" for="username">Modelo</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 border-2 py-2 px-2"
                        type="text" value="{{ $registro->auditable_type }}" disabled>
                </div>
                <div>
                    <label class="text-gray-700" for="username">Usuario</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 border-2 py-2 px-2"
                        type="text" value="{{ $registro->user->name }}" disabled>
                </div>
                <div>
                    <label class="text-gray-700" for="username">Valores Antiguos</label>
                    <textarea class="form-input w-full mt-2 rounded-md focus:border-indigo-600 border-2 py-2 px-2 flex flex-wrap">{{ $registro->old_values }}</textarea>
                </div>
                <div>
                    <label class="text-gray-700" for="username">Valores Nuevos</label>
                    <textarea class="form-input w-full mt-2 rounded-md focus:border-indigo-600 border-2 py-2 px-2 flex flex-wrap">{{ $registro->new_values }}</textarea>
                </div>
                <div>
                    <label class="text-gray-700" for="username">Fecha de Modificación</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 border-2 py-2 px-2"
                        type="text" value="{{ $registro->updated_at->format('d-m-Y h:i') }}" disabled>
                </div>
            </div>
        </form>
    </div>
@endsection
