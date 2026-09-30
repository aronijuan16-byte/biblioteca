<p><input name="Titulo" value="{{ old('Titulo', $libro->Titulo ?? '') }}" placeholder="Título" required></p>
<p><input name="genero" value="{{ old('genero', $libro->genero ?? '') }}" placeholder="Género"></p>
<p><input name="Tipo" value="{{ old('Tipo', $libro->Tipo ?? '') }}" placeholder="Tipo"></p>
<p>
  <select name="ID_autor">
    <option value="">Autor</option>
    @foreach($autores as $a)
      <option value="{{ $a->ID_autores }}" @selected(old('ID_autor', $libro->ID_autor ?? '') == $a->ID_autores)>
        {{ $a->Nombre }} {{ $a->Apellidos }}
      </option>
    @endforeach
  </select>
  <a class="meta" href="{{ route('autores.create') }}">+ Nuevo autor</a>
</p>
<p>
  <select name="ID_editor">
    <option value="">Editorial</option>
    @foreach($editores as $e)
      <option value="{{ $e->ID_editores }}" @selected(old('ID_editor', $libro->ID_editor ?? '') == $e->ID_editores)>
        {{ $e->nombre_editorial }}
      </option>
    @endforeach
  </select>
  <a class="meta" href="{{ route('editores.create') }}">+ Nueva editorial</a>
</p>

<label for="imagen">Portada (jpg, png o webp, máx. 2 MB)</label>
@if(!empty($libro?->imagen))
  <div class="actual">
    <img src="{{ $libro->imagen_url }}" alt="Portada actual">
    <label class="check"><input type="checkbox" name="quitar_imagen" value="1"> Quitar portada actual</label>
  </div>
@endif
<p><input type="file" id="imagen" name="imagen" accept="image/png,image/jpeg,image/webp"></p>

<div class="acciones">
  <button class="btn">Guardar</button>
  <a class="btn sec" href="{{ route('libros.index') }}">Cancelar</a>
</div>
