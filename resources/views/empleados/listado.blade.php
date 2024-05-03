<x-mi-layout titulo="Lista De Empleados">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Empleados Activos</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-mi-layout>