<x-mi-layout>
    <a class="btn btn-primary" href="{{ route('producto.create') }}">Nuevo Producto</a>
    <hr>
    <h1 class="h3 mb-4 text-gray-800" >Lista de productos</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Productos registrados</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Correo</th>
                            <th>Nombre_P</th>
                            <th>Marca</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Categoria</th>
                            <th>Deporte</th>
                            <th>Creado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Usuario</th>
                            <th>Correo</th>
                            <th>Nombre_P</th>
                            <th>Marca</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Categoria</th>
                            <th>Deporte</th>
                            <th>Creado</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($productos as $producto)
                            <tr>
                                <td>{{ $producto -> user -> name}}</td>
                                <td>{{ $producto -> user -> email}}</td>
                                <td>{{ $producto -> nombre_producto}}</td>
                                <td>{{ $producto -> marca}}</td>
                                <td>{{ $producto -> descripcion}}</td>
                                <td>{{ $producto -> precio}}</td>
                                <td>{{ $producto -> categoria}}</td>
                                <td>{{ $producto -> deporte}}</td>
                                <td>{{ $producto -> created_at}}</td>
                                <td>
                                    <a href="{{ route('producto.show', $producto) }}">Detalle</a>
                                    <a href="{{ route('producto.edit', $producto) }}">Editar</a>
                                    <form action="{{ route('producto.destroy', $producto)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input class="btn btn-danger" type="submit" value="Eliminar">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    
</x-mi-layout>