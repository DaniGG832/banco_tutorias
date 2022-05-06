<x-plantilla>

{{--   {{ $clientes }} --}}

  <h1 class="font-bold text-2xl">Clientes</h1>

  <br>
  <a href="{{ route('clientes.create', [], false) }}" class="text-blue-400 hover:text-blue-800 mx-2">
    <i class="material-icons-outlined text-base">Dar alta nuevo cliente</i>
  </a>

  <br>
  <a href="{{ route('cuentas.create', [], false) }}" class="text-blue-400 hover:text-blue-800 mx-2">
    <i class="material-icons-outlined text-base">Crear cuenta nueva</i>
  </a>

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
          <td class="p-3 font-medium capitalize">{{ $cliente->id }}</td>
          <td class="p-3">{{ $cliente->nombre }}</td>
          <td class="p-3 uppercase">{{ $cliente->dni }}</td>
          <td class="p-3 uppercase">
            @forelse ($cliente->cuentas as $cuenta)
              <p>
                {{ $cuenta->numero }}
              </p>
            @empty
              No tiene cuenta asociada
            @endforelse
          </td>
          <td class="p-3 bg-blue-700 ">
            <a href="{{ route('clientes.show', $cliente, false) }}" class="text-gray-100 hover:text-green-400 mr-2">
              <i class="material-icons-outlined text-base">Mostrar</i>
            </a>


          <td>
            <a href="{{ route('clientes.edit', $cliente, false) }}" class="text-green-800 hover:text-gray-800 mx-2">
              <i class="material-icons-outlined text-base">edit</i>
            </a>
            <form action="{{route('clientes.destroy',$cliente,true)}}" method="post">
  
              @csrf
              @method('delete')

              <button  class="text-red-400 hover:text-red-800 mx-2 material-icons-outlined text-base" type="submit">Borrar</button>
              </form>
          
          </td>

          
      @endforeach

      
    </tbody>
  </table>
</x-plantilla>
