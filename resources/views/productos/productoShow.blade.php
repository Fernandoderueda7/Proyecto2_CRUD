<x-mi-layout>
    <a href="{{ route('producto.index') }}">Regresar</a>
    <h1 class="h3 mb-4 text-gray-800" >Detalle del producto</h1>
    
    <ul>
        <li>Nombre del producto: {{ $producto -> nombre_producto }}</li>
        <li>Marca: {{ $producto -> marca }}</li>
        <li>Descripción: {{ $producto -> descripcion }}</li>
        <li>Precio: {{ $producto -> precio }}</li>
        <li>Categoria: {{ $producto -> categoria }}</li>
        <li>Deporte: {{ $producto -> deporte }}</li>
    </ul>

</x-mi-layout>