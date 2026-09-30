<p><input name="Nombre" value="{{ old('Nombre', $autor->Nombre ?? '') }}" placeholder="Nombre" required></p>
<p><input name="Apellidos" value="{{ old('Apellidos', $autor->Apellidos ?? '') }}" placeholder="Apellidos"></p>
<div class="acciones">
  <button class="btn">Guardar</button>
  <a class="btn sec" href="{{ route('autores.index') }}">Cancelar</a>
</div>
