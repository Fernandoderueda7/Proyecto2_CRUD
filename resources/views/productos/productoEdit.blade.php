
<x-mi-layout>
<!-- Fromulario de edicion de comentario -->
    <a class="btn btn-info" href="{{ route('producto.index') }}">Lista de Producto</a>
    <hr>
    <h1 class="h3 mb-4 text-gray-800" >Editar Producto</h1>

    @include('parciales.form-error')

    <form action="{{ route('producto.update', $producto) }}" method ="POST" >
        @csrf
        @method('PATCH')
        <div class="container">
          <hr>
          <hr>
          <label for="nombre_producto"><b>Nombre</b></label>
          <input type="text" placeholder="Ingrese el nombre del producto" name="nombre_producto" value=" {{ old('nombre_producto') ?? $producto -> nombre_producto}}">
          @error('nombre_producto')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          <br>
          <br>

          
          <label for="marca"><b>Marca</b></label>
          <select name="marca">
            <option value="nike" @selected($producto -> marca == 'nike') >Nike</option>
            <option value="adidas" @selected($producto -> marca == 'adidas') >Adidas</option>
            <option value="puma" @selected($producto -> marca == 'puma') >Puma</option>  
            <option value="newbalance" @selected($producto -> marca == 'newbalance') >NewBalance</option>  
            <option value="umbro" @selected($producto -> marca == 'umbro') >Umbro</option>  
            <option value="charly" @selected($producto -> marca == 'charly') >Charly</option>  
            <option value="otra" @selected($producto -> marca == 'otra') >Otra</option>  
        </select>
          <br>
          <br>
      
          <label><b>Descripción</b></label>
          <br>
          <textarea placeholder="Descripción del producto"  name="descripcion" cols="40" rows="5">{{ old('descripcion') ?? $producto -> descripcion}}</textarea>
          @error('descripcion')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          <br>
          <br>

          <label for="precio"><b>Precio</b></label>
          <input type="number"  step="any" placeholder="Ingrese el precio" name="precio" min ="0" value=" {{ old('precio') ?? $producto -> precio}}" >
          @error('precio')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          <br>
          <br>

          <label for="categoria"><b>Categoria</b></label>
          <select name="categoria">
            <option value="ropa" @selected($producto -> categoria == 'ropa') >Ropa</option>
            <option value="calzado" @selected($producto -> categoria == 'calzado') > Calzado</option>
            <option value="accesorio" @selected($producto -> categoria == 'accesorio')> Accesorio</option>  
          </select>
          <br>
          <br>

          <label for="deporte"><b>Deporte</b></label>
          <select name="deporte">
            <option value="futbol" @selected($producto -> deporte == 'futbol') >Futbol</option>
            <option value="baloncesto" @selected($producto -> deporte == 'baloncesto') >Basketball</option>
            <option value="voleibol" @selected($producto -> deporte == 'voleibol') > Volleyball</option>
            <option value="beisbol" @selected($producto -> deporte == 'beisbol') > Baseball</option>
            <option value="box" @selected($producto -> deporte == 'box') > Box</option>
            <option value="otro" @selected($producto -> deporte == 'otro') > Otro</option>  
          </select>
          <br>
          <br>

      
          <button type="submit" class="btn btn-success">Actualizar</button>
        </div>
    </form>
    <br><br>


</x-mi-layout>