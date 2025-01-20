@extends('papeleta.components.base')

@section('content')
    <div
        class="h-screen bg-[url('/img/fondo_ua.jpg')] bg-cover bg-center bg-gray-400 bg-blend-soft-light overflow-y-scroll py-4">
        <div class="p-8 bg-white rounded-md shadow-md w-1/2 mx-auto">
            <h1 class="text-center text-3xl font-semibold mt-2 mb-8 font-sans">Elección de Centro de Estudiantes</h1>
            <div>
                <form class="mt-4" method="POST" action="{{ route('papeleta.preEleccion') }}">
                    @csrf
                    <div class="grid grid-cols-2 gap-5">
                        @foreach ($listas as $lista)
                            <div class="border p-4">
                                <div class="text-center mb-2">
                                    <h1 class="text-lg font-semibold">{{ $lista->descripcion }}</h1>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    @foreach ($lista->candidatos as $candidato)
                                        <div class="flex flex-col items-center text-center">
                                            <img class="h-24 w-24 rounded-full"
                                                src="{{ asset('storage/' . $candidato->url_foto) }}" alt=""
                                                class="rounded-full">
                                            <p class="text-lg mt-2">{{ $candidato->nombre }} {{ $candidato->apellido }}</p>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="flex justify-center mt-4">
                                    <input type="radio" class="form-radio h-5 w-5 text-blue-600"
                                        value="{{ $lista->id }}" name="lista" id="lista">
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="flex justify-center mt-6">
                        <button
                            class="px-6 py-3 bg-blue-600 rounded-md text-white font-medium tracking-wide hover:bg-blue-500 ml-3">Votar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
