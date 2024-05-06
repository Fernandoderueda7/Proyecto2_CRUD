<x-mi-layout>
    <a class="btn btn-info" href="{{ route('producto.index') }}">Regresar</a>
    <hr>
    <h1 class="h3 mb-4 text-gray-800" >Detalle del producto</h1>
    
    <ul>
        <li>Nombre del producto: {{ $producto -> nombre_producto }}</li>
        <li>Marca: {{ $producto -> marca }}</li>
        <li>Descripción: {{ $producto -> descripcion }}</li>
        <li>Precio: {{ $producto -> precio }}</li>
        <li>Categoria: {{ $producto -> categoria }}</li>
        <li>Deporte: {{ $producto -> deporte }}</li>
        <li>Estado: {{ $producto -> estado }}</li>
        <li>Tienda: {{ $producto -> tienda }}</li>
    </ul>

    <h2>Fotos de producto</h2>
    <ul>
        @foreach ($producto->archivos as $archivo)
            <li>
                Imagen:
                <a href="{{ route('producto.download', $archivo) }}">
                    <!-- {{ $archivo->nombre_original }} -->
                    <img src="{{ \Storage::url($archivo->ubicacion) }}" width="150px" height="150px">

                </a>
            </li>
        @endforeach
    </ul>

</x-mi-layout>