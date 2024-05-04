<x-mail::message>

# Hola {{ $empleado->nombre }}

<x-mail::panel>
Estas son las sucursales a las que perteneces:
@foreach($tiendas as $tienda)
    <br>
    - {{ $tienda->nombre }}
@endforeach
</x-mail::panel>

</x-mail::message>