<x-mi-layout>
<!-- Fromulario de registro de productos -->
    <h1 class="h3 mb-4 text-gray-800" >Registrar productos</h1>

    @include('parciales.form-error')

    <form action="{{ route('producto.store') }}" method ="POST" >
        @csrf
        <div class="container">
          <hr>
          <hr>
          <label for="nombre_producto"><b>Nombre</b></label>
          <input type="text" placeholder="Ingrese el nombre del producto" name="nombre_producto" value=" {{ old('nombre_producto')}}">
          @error('nombre_producto')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          <br>
          <br>

          
          <label for="marca"><b>Marca</b></label>
          <select name="marca">
            <option value="nike" @selected(old('marca') == 'nike') >Nike</option>
            <option value="adidas" @selected(old('marca') == 'adidas')>Adidas</option>
            <option value="puma" @selected(old('marca') == 'puma')>Puma</option>  
            <option value="newbalance" @selected(old('marca') == 'newbalance')>NewBalance</option>  
            <option value="umbro" @selected(old('marca') == 'umbro')>Umbro</option>  
            <option value="charly" @selected(old('marca') == 'charly')>Charly</option>  
            <option value="otra" @selected(old('marca') == 'otra')>Otra</option>  
        </select>
          <br>
          <br>
      
          <label><b>Descripción</b></label>
          <br>
          <textarea placeholder="Descripción del producto"  name="descripcion" cols="40" rows="5" value=" {{ old('descripcion')}}" ></textarea>
          @error('descripcion')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          <br>
          <br>

          <label for="precio"><b>Precio</b></label>
          <input type="number"  step="any" placeholder="Ingrese el precio" name="precio" min ="0" value=" {{ old('precio')}}" >
          @error('precio')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          <br>
          <br>

          <label for="categoria"><b>Categoria</b></label>
          <select name="categoria">
            <option value="ropa" @selected(old('categoria') == 'ropa') >Ropa</option>
            <option value="calzado" @selected(old('categoria') == 'calzado')> Calzado</option>
            <option value="accesorio" @selected(old('categoria') == 'accesorio')> Accesorio</option>  
          </select>
          <br>
          <br>

          <label for="deporte"><b>Deporte</b></label>
          <select name="deporte">
            <option value="futbol" @selected(old('deporte') == 'futbol') >Futbol</option>
            <option value="baloncesto" @selected(old('deporte') == 'baloncesto')> Basketball</option>
            <option value="voleibol" @selected(old('deporte') == 'voleibol')> Volleyball</option>
            <option value="beisbol" @selected(old('deporte') == 'beisbol')> Baseball</option>  
            <option value="box" @selected(old('deporte') == 'box')> Box</option>  
            <option value="otro" @selected(old('deporte') == 'otro')> otro</option>  
          </select>
          <br>
          <br>

      
          <button type="submit" class="btn btn-primary">Registrar</button>
        </div>
    </form>
</x-mi-layout>