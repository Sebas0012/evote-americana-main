@extends('admin.components.base', ['titulo' => 'Editar Votante'])

@section('content')
    <div class="p-6 bg-white rounded-md shadow-md">
        <form id="form-edit" action="{{ route('admin.votante.update', ['id' => $votante->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
                <div>
                    <label class="text-gray-700" for="username">Nombre</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 border-2 py-2 px-2" type="text"
                        name="nombre" value="{{ $votante->nombre }}">
                </div>
                <div>
                    <label class="text-gray-700" for="username">Apellido</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 border-2 py-2 px-2"
                        type="text" name="apellido" value="{{ $votante->apellido }}">
                </div>
                <div>
                    <label class="text-gray-700" for="username">Identificación</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 border-2 py-2 px-2"
                        type="text" name="identificacion" value="{{ $votante->identificacion }}">
                </div>
                <div>
                    <label class="text-gray-700" for="emailAddress">Correo Electrónico</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 border-2 py-2 px-2"
                        type="email" name="email" value="{{ $votante->email }}">
                </div>
                <div>
                    <label class="text-gray-700" for="password">Teléfono</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 border-2 py-2 px-2"
                        type="tel" name="telefono" value="{{ $votante->telefono }}">
                </div>
            </div>
        </form>
        <div class="flex justify-between mt-4">
            <form id="delete-form" method="POST" action="{{ route('admin.votante.destroy', ['id' => $votante->id]) }}">
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
