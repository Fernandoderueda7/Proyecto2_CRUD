<x-mi-layout titulo="Tiendas Asignadas">

<a class="btn btn-info" href="{{ route('empleado.index') }}">Regresar</a>
<hr>

    <h1>Tiendas asignadas al empleado: {{ $empleado->nombre }}</h1>

    <ul>
        @foreach ($empleado->tiendas as $tienda)
            <li>{{ $tienda->nombre }}</li>
        @endforeach
    </ul>

</x-mi-layout>