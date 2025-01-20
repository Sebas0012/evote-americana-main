@extends('papeleta.components.base')

@section('content')
    <div
        class="h-screen bg-[url('/img/fondo_ua.jpg')] bg-cover bg-center bg-gray-400 bg-blend-soft-light flex justify-center items-center">
        <div class="p-8 bg-white rounded-md shadow-md">
            <h1 class="text-center text-3xl font-semibold mt-2 mb-4 font-sans">Su voto ha sido registrado</h1>
            <p class="text-center font-semibold text-xl mb-2">¡Gracias!</p>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        setTimeout(function() {
            location.reload();
        }, 2000);
    </script>
@endsection
