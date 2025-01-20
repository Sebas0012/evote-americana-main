<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link href="https://tailwindcomponents.com/css/component.dashboard-template.css" rel="stylesheet"> --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-screen overflow-hidden" style="background: #edf2f7;">
    <div>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

        <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200">
            <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false"
                class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden"></div>

            @include('admin.components.sidebar')
            <div class="flex-1 flex flex-col overflow-hidden">
                @include('admin.components.header')
                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                    @include('admin.components.contents')
                </main>
            </div>
        </div>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('scripts')
</body>

</html>
