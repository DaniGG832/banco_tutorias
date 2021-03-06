<x-plantilla>
{{$cliente}}

<h1>
  clientes edit
</h1>


<form action="{{route('clientes.update',$cliente,true)}}" method="post">

  @csrf
  @method('PUT')

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
  <br>
  <p class="">Asignar cuenta</p>
 <br>
  <select name="nCuenta" id="" value="">
    <option value=""></option>
    @foreach ($cuentas as $cuenta)
        
    <option value="{{$cuenta->id}}">{{$cuenta->numero}}</option>
    @endforeach
  </select>
<br>
<br>
  <p class="">Dar baja como titular</p>
 <br>
  <select name="bajaTitular" id="" value="">
    <option value=""></option>
    @foreach ($cuentas as $cuenta)
        
    <option value="{{$cuenta->id}}">{{$cuenta->numero}}</option>
    @endforeach
  </select>
<br>
<br>
  <button type="submit">Enviar</button>

</form>
</x-plantilla>