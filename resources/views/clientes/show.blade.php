<x-plantilla>


{{-- {{$cliente}}
 --}}

<h1 class="font-bold text-2xl">Show</h1>

  <br>

<p>Cliente: <span class="text-blue-700">{{$cliente->nombre}}</span></p>
  

<br>
<p>Numeros de cuenta</p>

<ul>
  @foreach ($cliente->cuentas as $cuenta)

  <li>{{$cuenta->numero}} -<span><a class="text-blue-400 hover:text-green-500 ml-2" href="">Mostar moviminetos</a></span></li>

  @endforeach

</ul>



</x-plantilla>