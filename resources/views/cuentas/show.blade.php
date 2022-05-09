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
  <p>Saldo: <span class="text-blue-700">{{$cuenta->saldo}} €</span></p>
  
  
  <br>

  <p>Movimientos</p>

  
  <ul>
    @foreach ($cuenta->movimientos as $movimiento)
  

    <li class="text-blue-400 hover:text-green-500 ml-2">{{$movimiento->concepto.'->('.$movimiento->importe}}) € ->{{$movimiento->fecha}} </li>
  
    @endforeach
  
  </ul>
  
  
  
  </x-plantilla>