<div class="container mx-auto px-6 py-8">
    <div class="mb-5 flex justify-between">
        @if ($titulo !== null)
            <h3 class="text-gray-700 text-3xl font-medium">{{ $titulo ?? 'Sin Titulo' }}</h3>
            @yield('title-header')
        @endif
    </div>
    <div>
        @yield('content')
    </div>
</div>
