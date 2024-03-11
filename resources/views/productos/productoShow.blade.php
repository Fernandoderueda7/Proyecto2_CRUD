<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle producto</title>
</head>
<body>
    <a href="{{ route('producto.index') }}">Regresar</a>
    <h1>Detalle del producto</h1>
    
    <ul>
        <li>Nombre del producto: {{ $producto -> nombre_producto }}</li>
        <li>Marca: {{ $producto -> marca }}</li>
        <li>Descripción: {{ $producto -> descripcion }}</li>
        <li>Precio: {{ $producto -> precio }}</li>
        <li>Categoria: {{ $producto -> categoria }}</li>
        <li>Deporte: {{ $producto -> deporte }}</li>
    </ul>
</body>
</html>