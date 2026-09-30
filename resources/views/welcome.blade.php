@extends('layouts.app')
@section('content')
<h1>Catálogo</h1>
<p class="subtitulo">Explora los libros disponibles, busca por título o filtra por género y tipo.</p>
<form class="filtros" method="GET">
  <input type="search" name="q" value="{{ request('q') }}" placeholder="Buscar por título">
  <select name="genero">
    <option value="">Todos los géneros</option>
    @foreach($generos as $g)<option value="{{ $g }}" @selected(request('genero')==$g)>{{ $g }}</option>@endforeach
  </select>
  <select name="tipo">
    <option value="">Todos los tipos</option>
    @foreach($tipos as $t)<option value="{{ $t }}" @selected(request('tipo')==$t)>{{ $t }}</option>@endforeach
  </select>
  <button class="btn">Buscar</button>
</form>

<ul class="lista">
@forelse($libros as $l)
  <li>
    <div class="portada">
      @if($l->imagen_url)<img src="{{ $l->imagen_url }}" alt="Portada de {{ $l->Titulo }}" loading="lazy">@else{{ mb_strtoupper(mb_substr($l->Titulo, 0, 1)) }}@endif
    </div>
    <div>
      <h3><a href="{{ route('libros.show', $l) }}">{{ $l->Titulo }}</a></h3>
      <div class="meta">
        @if($l->autor){{ $l->autor->Nombre }} {{ $l->autor->Apellidos }}@else Autor desconocido @endif
        @if($l->editor), editorial {{ $l->editor->nombre_editorial }}@endif
      </div>
      @if($l->genero)<span class="etiqueta">{{ $l->genero }}</span>@endif

      <div class="acciones">
        <a class="btn sec chico" href="{{ route('libros.edit', $l) }}">Editar</a>
        <form class="inline" method="POST" action="{{ route('libros.destroy', $l) }}"
              onsubmit="return confirm('¿Eliminar «{{ addslashes($l->Titulo) }}»?')">
          @csrf
          @method('DELETE')
          <button class="btn peligro chico">Eliminar</button>
        </form>
      </div>
    </div>
  </li>
@empty
  <li>No hay libros con esos filtros. Prueba con otro título o agrega uno nuevo.</li>
@endforelse
</ul>
<nav>{{ $libros->links() }}</nav>
@endsection
