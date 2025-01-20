@extends('papeleta.components.base')

@section('content')
    <div
        class="h-screen bg-[url('/img/fondo_ua.jpg')] bg-cover bg-center bg-gray-400 bg-blend-soft-light flex justify-center items-center">
        <div class="p-6 bg-white rounded-md shadow-md">
            <h1 class="text-center text-3xl font-semibold mt-4 font-sans">Verificación</h1>
            <form class="mt-4" method="POST" action="{{ route('papeleta.makeVerificacion') }}">
                @csrf
                <div>
                    <div>
                        <label class="text-gray-700" for="code">Código de Verificación:</label>
                        <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 border-2 py-2 px-2"
                            type="text" name="code" id="code">
                        @error('code')
                            <p class="text-sm text-red-600 my-4">El código de verificación es inválido</p>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-end mt-6">
                    <button type="submit"
                        class="px-4 py-2 bg-gray-800 text-gray-200 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700 mr-2">Reenviar
                        Código</button>
                    <button type="disabled"
                        class="px-4 py-2 bg-gray-800 text-gray-200 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">Ingresar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
