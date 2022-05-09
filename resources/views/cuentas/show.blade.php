<x-plantilla>



  <h1 class="font-bold text-2xl">Show Cuenta</h1>
  
    <br>
    <p >
      <a  class="hover:underline text-blue-400 hover:text-blue-800" 
      href="{{route('clientes.index')}}">Index</a>
  
    </p>
    <br>
  
  <p>Titulares: <span class="text-blue-700">
  
    @foreach ($cuenta->clientes as $cliente)

      <a href="{{route("clientes.show",$cliente->id)}}">{{$cliente->nombre}}</a> /

    @endforeach
  </span></p>
    
  
  <br>
  <p>Saldo: <span class="text-blue-700"> {{$saldo}}€</span></p>
  
  
  <br>

  <p>Movimientos</p>

  <br>
  <table class="table text-gray-400 border-separate space-y-6 text-sm">
    <thead class="bg-blue-500 text-white">
      <tr>
        <th class="p-3">Concepto</th>
        <th class="p-3 text-left">fecha</th>
        <th class="p-3 text-left">Importe</th>
      </tr>
    </thead>
    <tbody>

      @foreach ($cuenta->movimientos as $movimiento)
        <tr class="bg-blue-100 lg:text-black">
          <td class="p-3 font-medium capitalize">{{ $movimiento->concepto}}</td>
          <td class="p-3">{{ $movimiento->fecha }}</td>
          <td class="p-3 uppercase">{{ $movimiento->importe }} €</td>
          
          
        </tr>
        @endforeach
        </tbody>
      </table>

  
  <br>

  <h2>Añadir movimiento</h2>

  <form action="{{route('movimientos.store',[],false)}}" method="post">

@method('post')
    @csrf
    <input type="hidden" name="cuenta_id" value="{{$cuenta->id}}">

      <label for="concepto">Concepto</label>

      <input type="text" name="concepto" required autofocus value="{{old('concepto')}}">

      @error('concepto')
    <p class="text-red-500 text-sm mt-1">
        {{ $message }}
    </p>
  @enderror
<br>

      <label for="importe">Importe</label>

      <input type="number" step="0.01" name="importe" required  value="{{old('importe')}}"">

      @error('importe')
    <p class="text-red-500 text-sm mt-1">
        {{ $message }}
    </p>
  @enderror

<br>

    <button type="submit">Enviar</button>

  </form>
  
  
  </x-plantilla>