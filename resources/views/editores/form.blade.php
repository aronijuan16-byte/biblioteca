<p><input name="nombre_editorial" value="{{ old('nombre_editorial', $editor->nombre_editorial ?? '') }}" placeholder="Nombre de la editorial" required></p>
<div class="acciones">
  <button class="btn">Guardar</button>
  <a class="btn sec" href="{{ route('editores.index') }}">Cancelar</a>
</div>
