<x-plantilla>
  {{$cliente}}
  
  <h1>
    edit
  </h1>
  
  
  <form action="{{route('clientes.store',$cliente,true)}}" method="post">
  
    @csrf
    @method('post')
  
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre" autofocus value="{{old('nombre',$cliente->nombre)}}">
    @error('nombre')
    <p class="text-red-500 text-sm mt-1">
        {{ $message }}
    </p>
  @enderror
  <br>
    <label for="dni">DNI</label>
    <input type="text" name="dni" id="dni" value="{{old('dni',$cliente->dni)}}">
    @error('dni')
    <p class="text-red-500 text-sm mt-1">
        {{ $message }}
    </p>
  @enderror
    <br>
  
    <button type="submit">Enviar</button>
  
  </form>
  </x-plantilla>