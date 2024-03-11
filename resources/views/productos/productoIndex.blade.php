<x-mi-layout>
    <a href="{{ route('producto.create') }}">Nuevo Producto</a>
    <h1 class="h3 mb-4 text-gray-800" >Lista de productos</h1>
    <table border=1>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Marca</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Categoria</th>
                <th>Deporte</th>
                <th>Creado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
            <tr>
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
                        <input class="btn-danger" type="submit" value="Eliminar">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-mi-layout>