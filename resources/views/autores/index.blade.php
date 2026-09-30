@extends('layouts.app')
@section('content')
<div class="barra">
  <h1>Autores</h1>
  <a class="btn" href="{{ route('autores.create') }}">+ Agregar autor</a>
</div>
<ul class="tabla">
@forelse($autores as $a)
  <li>
    <div>
      <strong>{{ $a->Nombre }} {{ $a->Apellidos }}</strong>
      <div class="meta">{{ $a->libros_count }} {{ $a->libros_count === 1 ? 'libro' : 'libros' }}</div>
    </div>
    <div class="fila-acciones">
      <a class="btn sec chico" href="{{ route('autores.edit', $a) }}">Editar</a>
      <form class="inline" method="POST" action="{{ route('autores.destroy', $a) }}"
            onsubmit="return confirm('¿Eliminar a este autor? Sus libros quedarán como «Autor desconocido».')">
        @csrf
        @method('DELETE')
        <button class="btn peligro chico">Eliminar</button>
      </form>
    </div>
  </li>
@empty
  <li>Aún no hay autores registrados.</li>
@endforelse
</ul>
@endsection
