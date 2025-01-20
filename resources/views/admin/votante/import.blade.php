@extends('admin.components.base', ['titulo' => 'Importar Votantes'])

@section('content')
    <div class="p-6 bg-white rounded-md shadow-md">
        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.votante.importStore') }}">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-1 gap-6 mt-4">
                <div>
                    <label class="text-gray-700" for="username">Archivo Excel (Tamaño máximo: 1MB)</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 border-2 py-2 px-2" type="file"
                        name="excel">
                </div>
            </div>
            <div class="flex justify-end mt-4">
                <button
                    class="px-4 py-2 bg-gray-800 text-gray-200 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">Importar</button>
            </div>
        </form>
    </div>
@endsection
