@extends('papeleta.components.base')

@section('content')
    <div
        class="h-screen bg-[url('/img/fondo_ua.jpg')] bg-cover bg-center bg-gray-400 bg-blend-soft-light overflow-y-scroll py-4">
        <div class="p-8 bg-white rounded-md shadow-md w-1/2 mx-auto">
            <h1 class="text-center text-3xl font-semibold mt-2 mb-4 font-sans">Confirmar Elección</h1>
            <p class="text-center font-semibold text-xl mb-2">Desea votar por esta lista?</p>
            <form class="mt-4" method="POST" action="{{ route('papeleta.makeConfirmarEleccion') }}">
                @csrf
                <div class="">
                    <div class="border p-4 mx-4">
                        <div class="text-center mb-2">
                            <h1 class="text-lg font-semibold">{{ $listaElecta->descripcion }}</h1>
                        </div>
                        <div class="grid grid-cols-3 gap-6">
                            @foreach ($listaElecta->candidatos as $candidato)
                                <div class="mx-6 text-center">
                                    <img src="{{ asset('storage/' . $candidato->url_foto) }}" alt=""
                                        class="rounded-full">
                                    <p class="text-lg mt-2">{{ $candidato->nombre }} {{ $candidato->apellido }}</p>
                                </div>
                            @endforeach
                        </div>
                        <div class="flex justify-center mt-4">
                            <input type="hidden" class="form-radio h-5 w-5 text-blue-600" value="{{ $listaElecta->id }}"
                                name="lista" id="lista">
                        </div>
                    </div>
                </div>
                <div class="flex justify-center mt-6">
                    <a href="{{ route('papeleta.eleccion') }}"
                        class="px-6 py-3 bg-blue-600 rounded-md text-white font-medium tracking-wide hover:bg-blue-500 ml-3">Volver
                        atrás</a>
                    <button
                        class="px-6 py-3 bg-blue-600 rounded-md text-white font-medium tracking-wide hover:bg-blue-500 ml-3">Confirmar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
