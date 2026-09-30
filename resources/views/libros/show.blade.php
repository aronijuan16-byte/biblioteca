@extends('layouts.app')
@section('content')
<div class="ficha">
  @if($libro->imagen_url)
    <div class="portada-grande"><img src="{{ $libro->imagen_url }}" alt="Portada de {{ $libro->Titulo }}"></div>
  @endif
  <h1>{{ $libro->Titulo }}</h1>
  <dl>
    <dt>Autor</dt>
    <dd>{{ $libro->autor ? $libro->autor->Nombre.' '.$libro->autor->Apellidos : 'Autor desconocido' }}</dd>
    <dt>Editorial</dt>
    <dd>{{ $libro->editor->nombre_editorial ?? 'Sin editorial' }}</dd>
    <dt>Género</dt>
    <dd>{{ $libro->genero }}</dd>
    <dt>Tipo</dt>
    <dd>{{ $libro->Tipo }}</dd>
  </dl>
  <div class="acciones">
    <a class="btn sec" href="{{ route('libros.index') }}">&larr; Volver al catálogo</a>
    <a class="btn" href="{{ route('libros.edit', $libro) }}">Editar</a>
    <form class="inline" method="POST" action="{{ route('libros.destroy', $libro) }}"
          onsubmit="return confirm('¿Eliminar «{{ addslashes($libro->Titulo) }}»? Esta acción no se puede deshacer.')">
      @csrf
      @method('DELETE')
      <button class="btn peligro">Eliminar</button>
    </form>
  </div>
</div>
@endsection
