@extends('layouts.app')
@section('content')
<div class="barra">
  <h1>Editoriales</h1>
  <a class="btn" href="{{ route('editores.create') }}">+ Agregar editorial</a>
</div>
<ul class="tabla">
@forelse($editores as $e)
  <li>
    <div>
      <strong>{{ $e->nombre_editorial }}</strong>
      <div class="meta">{{ $e->libros_count }} {{ $e->libros_count === 1 ? 'libro' : 'libros' }}</div>
    </div>
    <div class="fila-acciones">
      <a class="btn sec chico" href="{{ route('editores.edit', $e) }}">Editar</a>
      <form class="inline" method="POST" action="{{ route('editores.destroy', $e) }}"
            onsubmit="return confirm('¿Eliminar esta editorial? Sus libros quedarán sin editorial.')">
        @csrf
        @method('DELETE')
        <button class="btn peligro chico">Eliminar</button>
      </form>
    </div>
  </li>
@empty
  <li>Aún no hay editoriales registradas.</li>
@endforelse
</ul>
@endsection
