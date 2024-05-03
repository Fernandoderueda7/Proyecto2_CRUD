<x-mi-layout titulo="Lista De Empleados">
    <table class="table">
        <tr>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
        @foreach ($empleados as $empleado)
            <tr>
                <td>{{ $empleado->nombre }}</td>
                <td>{{ $empleado->correo }}</td>
                <td>
                    @can('asignarTienda', $empleado)
                        <a href="{{ route('empleado.asignar-tienda', $empleado) }}">Asignar Tienda &nbsp;</a>
                    @endcan
                   <a href="{{ route('empleado.show', $empleado) }}">&nbsp Detalle</a>
                </td>
            </tr>
        @endforeach
    </table>
</x-mi-layout>