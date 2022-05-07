<x-plantilla>



  <h1 class="font-bold text-2xl">Show movimientos</h1>
  
    <br>
    <p >
      <a  class="hover:underline text-blue-400 hover:text-blue-800" 
      href="{{route('clientes.index')}}">Index</a>
  
    </p>
    <br>
  
  <p>Titulares: <span class="text-blue-700">
  
    {{$cuenta->clientes}}
  </span></p>
    
  
  <br>
  <p>Saldo: <span class="text-blue-700">{{$cuenta->saldo}} €</span></p>
  
  
  <br>

  <p>Movimientos</p>
  

  <ul>
    @foreach ($cuenta->movimientos as $movimiento)
  
    <li class="text-blue-400 hover:text-green-500 ml-2">{{$movimiento}} </li>
  
    @endforeach
  
  </ul>
  
  
  
  </x-plantilla>