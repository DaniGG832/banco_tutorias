<x-plantilla>
  
  
  <h1>
    create cuenta
  </h1>
  
  <br>
  
  <form action="{{route('cuentas.store',[],false)}}" method="post">
  
    @csrf
    @method('post')
  
    <label for="numero">Numero de cuenta</label>
    <input type="number" name="numero" id="numero" value="{{old('numero')}}">
    @error('numero')
    <p class="text-red-500 text-sm mt-1">
        {{ $message }}
    </p>
  @enderror
  
  
    <br>
  
    <button type="submit">Enviar</button>
  
  </form>
  </x-plantilla>