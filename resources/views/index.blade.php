<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-screen overflow-hidden flex justify-center items-center" style="background: #edf2f7;">
    <div class="bg-white p-8 flex flex-col text-center">

        <h1 class="text-2xl font-bold mb-4">Sistema Electoral Universidad Americana</h1>

        <a href="{{ route('papeleta.login') }}">Ir a Voto</a>
        <a href="{{ route('login') }}">Ir a Panel de Administación</a>
    </div>
</body>

</html>
