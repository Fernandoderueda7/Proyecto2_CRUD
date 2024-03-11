<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Productos</title>
</head>
<body>
    <a href="{{ route('producto.create') }}">Nuevo Producto</a>
    <h1>Lista de productos</h1>
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
                        <input type="submit" value="Eliminar">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>