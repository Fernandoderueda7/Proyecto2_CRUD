<x-mi-layout titulo="Asignar Tienda">
    <h1>Asignar tienda para {{ $empleado->nombre }}</h1>

    <form action="{{ route('empleado.asignar-tienda-empleado', $empleado) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="tienda">Tienda</label>
            <select name="tienda_id[]" id="tienda" class="form-control" multiple>
                @foreach ($tiendas as $tienda)
                    <option value="{{ $tienda->id }}" @selected(false !== array_search($tienda->id, $empleado->tiendas->pluck('id')->toArray()))>{{ $tienda->nombre }}</option>
                @endforeach
            </select>
        </div>

        <!-- {{-- <input type="hidden" name="alumno_id" value="{{ $alumno->id }}"> --}} -->

        <input type="submit" value="Asignar" class="btn btn-primary">
    </form>


</x-mi-layout>