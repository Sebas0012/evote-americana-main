@extends('admin.components.base', ['titulo' => 'Editar Elección'])

@section('content')
    <div class="p-6 bg-white rounded-md shadow-md">
        <form id="form-edit" method="POST" action="{{ route('admin.eleccion.update', ['id' => $eleccion->id]) }}">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
                <div>
                    <label class="text-gray-700" for="username">Descripción</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 border-2 py-2 px-2" type="text"
                        name="descripcion" value="{{ $eleccion->descripcion }}">
                </div>

                <div>
                    <label class="text-gray-700" for="emailAddress">Fecha</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 border-2 py-2 px-2"
                        type="date" name="fecha" value="{{ $eleccion->fecha }}">
                </div>

                <div>
                    <label class="text-gray-700" for="password">Hora Inicio</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 border-2 py-2 px-2"
                        type="time" name="hora_inicio" value="{{ $eleccion->hora_inicio }}">
                </div>

                <div>
                    <label class="text-gray-700" for="passwordConfirmation">Hora Cierre</label>
                    <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 border-2 py-2 px-2"
                        type="time" name="hora_cierre" value="{{ $eleccion->hora_cierre }}">
                </div>
            </div>

        </form>
        <div class="flex mt-4 justify-between">
            <form id="delete-form" method="POST" action="{{ route('admin.eleccion.destroy', ['id' => $eleccion->id]) }}">
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
