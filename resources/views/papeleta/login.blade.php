<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link href="https://tailwindcomponents.com/css/component.dashboard-template.css" rel="stylesheet"> --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[url('/img/fondo_ua.jpg')] bg-cover bg-center bg-gray-400 bg-blend-soft-light">
    <div class="h-screen overflow-hidden flex justify-center flex-col items-center">
        <div class="p-6 bg-white rounded-md shadow-md">
            <h1 class="text-center text-3xl font-semibold mt-4 font-sans">Voto Universidad Americana</h1>
            <form class="mt-4" method="POST" action="{{ route('papeleta.makeLogin') }}">
                @csrf
                @error('votante')
                    <p class="text-white text-center bg-red-500 py-4 rounded-md">
                        Ya ha participado de la votación del día
                    </p>
                @enderror
                @error('nouser')
                    <p class="text-white text-center bg-red-500 py-4 rounded-md">
                        Credenciales Incorrectas
                    </p>
                @enderror
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
                    <div>
                        <label class="text-gray-700" for="identificacion">Identificación</label>
                        <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 border-2 py-2 px-2"
                            type="text" name="identificacion" id="identificacion">
                        @error('identificacion')
                            <span class="text-red-600 text-sm">El campo es requerido</span>
                        @enderror
                    </div>

                    <div>
                        <label class="text-gray-700" for="email">Correo Electrónico</label>
                        <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600 border-2 py-2 px-2"
                            type="email" name="email">
                        @error('identificacion')
                            <span class="text-red-600 text-sm">El campo es requerido</span>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-end mt-6">
                    <button type="submit"
                        class="px-4 py-2 bg-gray-800 text-gray-200 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">Ingresar</button>
                </div>
            </form>
        </div>
        <div class="flex flex-row mt-8">
            <a class="flex items-center justify-center flex-col text-white rounded-full bg-blue-600 p-4"
                href="{{ route('admin.inicio') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                Admin
            </a>
        </div>
    </div>
</body>

</html>
