@extends('admin.components.base', ['titulo' => 'Editar Candidato'])

@section('content')
    <div class="p-6 bg-white rounded-md shadow-md">
        <div class="text-center flex flex-col items-center">
            <label class="text-gray-700" for="username">Foto</label>
            <img src="{{ asset('storage/' . $candidato->url_foto) }}" alt="" class="w-32 h-32">
        </div>
        <form id="form-edit" method="POST" action="{{ route('admin.candidato.update', ['id' => $candidato->id]) }}"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
                <div>
                    <label class="text-gray-700" for="username">Nombre</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 border-2 py-2 px-2"
                        type="text" name="nombre" value="{{ $candidato->nombre }}">
                </div>
                <div>
                    <label class="text-gray-700" for="username">Apellido</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 border-2 py-2 px-2"
                        type="text" name="apellido" value="{{ $candidato->apellido }}">
                </div>
                <div>
                    <label class="text-gray-700" for="emailAddress">Lista</label>
                    <select class="form-input w-full mt-2 rounded-md focus:border-indigo-600 border-2 py-2 px-2"
                        name="lista">
                        @foreach ($listas as $lista)
                            <option {{ $candidato->id_lista === $lista->id ? 'selected' : '' }} value="{{ $lista->id }}">
                                {{ $lista->descripcion }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="text-gray-700" for="username">Foto (Dejar vacio si no desea actualizar)</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 border-2 py-2 px-2"
                        type="file" name="foto">
                </div>
            </div>
        </form>
        <div class="flex mt-4 justify-between">
            <form id="delete-form" method="POST" action="{{ route('admin.candidato.destroy', ['id' => $candidato->id]) }}">
                @csrf
                @method('DELETE')
                <button
                    class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">Eliminar</button>
            </form>
            <button id="submit-form"
                class="px-4 py-2 bg-gray-800 text-gray-200 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">Editar</button>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const deleteForm = document.getElementById('delete-form');
        const submitForm = document.getElementById('submit-form');
        const formEdit = document.getElementById('form-edit');

        deleteForm.onsubmit = function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¡Atención!',
                text: "Está seguro que desea eliminar este registro",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteForm.submit()
                }
            })
        }

        submitForm.onclick = function() {
            formEdit.submit()
        }
    </script>
@endsection
