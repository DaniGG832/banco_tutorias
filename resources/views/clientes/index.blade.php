<x-plantilla>

  {{ $clientes }}

  <h1 class="font-bold text-2xl">Clientes</h1>

  <br>

  <table class="table text-gray-400 border-separate space-y-6 text-sm">
    <thead class="bg-blue-500 text-white">
      <tr>
        <th class="p-3">Id</th>
        <th class="p-3 text-left">Nombre</th>
        <th class="p-3 text-left">DNI</th>
        <th class="p-3 text-left">Numeros Cuentas Asociadas</th>

        <th class="p-3 text-left">Mostrar</th>
        <th class="p-3 text-left">Acciones</th>
      </tr>
    </thead>
    <tbody>

      @foreach ($clientes as $cliente)
      <tr class="bg-blue-200 lg:text-black">
        <td class="p-3 font-medium capitalize">{{$cliente->id}}</td>
        <td class="p-3">{{$cliente->nombre}}</td>
        <td class="p-3 uppercase">{{$cliente->dni}}</td>
        <td class="p-3 uppercase">
          @forelse ($cliente->cuentas as $cuenta)
          <p>
            {{$cuenta->numero}}
          </p>
          @empty
              No tiene cuenta asociada
          @endforelse
          </td>
          <td class="p-3 bg-blue-700 ">
            <a href="{{route('clientes.show',$cliente,false)}}" class="text-gray-100 hover:text-gray-100 mr-2">
              <i class="material-icons-outlined text-base">mostrar</i>
            </a>


      @endforeach
      <tr class="bg-blue-200 lg:text-black">
        <td class="p-3 font-medium capitalize">Gazi Rahad</td>
        <td class="p-3">gazi.rahad871@gmail.com</td>
        <td class="p-3">01648349009</td>
        <td class="p-3 uppercase">admin</td>

        <td class="p-3">
          <span class="bg-green-400 text-gray-50 rounded-md px-2">ACTIVE</span>
        </td>
        <td class="p-3">
          <a href="#" class="text-gray-500 hover:text-gray-100 mr-2">
            <i class="material-icons-outlined text-base">visibility</i>
          </a>
          <a href="#" class="text-yellow-400 hover:text-gray-100 mx-2">
            <i class="material-icons-outlined text-base">edit</i>
          </a>
          <a href="#" class="text-red-400 hover:text-gray-100 ml-2">
            <i class="material-icons-round text-base">delete_outline</i>
          </a>
        </td>
      </tr>
    </tbody>
  </table>
</x-plantilla>
