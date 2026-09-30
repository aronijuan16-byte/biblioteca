<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Editor;
use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LibroController extends Controller
{
    public function index(Request $request)
    {
        $libros = Libro::with(['autor', 'editor'])
            ->when($request->q, fn ($q, $v) => $q->where('Titulo', 'like', "%{$v}%"))
            ->when($request->genero, fn ($q, $v) => $q->where('genero', $v))
            ->when($request->tipo, fn ($q, $v) => $q->where('Tipo', $v))
            ->paginate(10)
            ->withQueryString();

        $generos = Libro::select('genero')->whereNotNull('genero')->distinct()->orderBy('genero')->pluck('genero');
        $tipos   = Libro::select('Tipo')->whereNotNull('Tipo')->distinct()->orderBy('Tipo')->pluck('Tipo');

        return view('welcome', compact('libros', 'generos', 'tipos'));
    }

    public function create()
    {
        return view('libros.create', $this->listas());
    }

    public function store(Request $request)
    {
        $datos = $this->validar($request);

        if ($request->hasFile('imagen')) {
            $datos['imagen'] = $request->file('imagen')->store('portadas', 'public');
        }

        Libro::create($datos);

        return redirect()->route('libros.index')->with('ok', 'Libro agregado');
    }

    public function show(Libro $libro)
    {
        $libro->load(['autor', 'editor']);
        return view('libros.show', compact('libro'));
    }

    public function edit(Libro $libro)
    {
        return view('libros.edit', ['libro' => $libro] + $this->listas());
    }

    public function update(Request $request, Libro $libro)
    {
        $datos = $this->validar($request);

        if ($request->boolean('quitar_imagen') && $libro->imagen) {
            Storage::disk('public')->delete($libro->imagen);
            $datos['imagen'] = null;
        }

        if ($request->hasFile('imagen')) {
            if ($libro->imagen) {
                Storage::disk('public')->delete($libro->imagen);
            }
            $datos['imagen'] = $request->file('imagen')->store('portadas', 'public');
        }

        $libro->update($datos);

        return redirect()->route('libros.show', $libro)->with('ok', 'Libro actualizado');
    }

    public function destroy(Libro $libro)
    {
        if ($libro->imagen) {
            Storage::disk('public')->delete($libro->imagen);
        }
        $libro->delete();

        return redirect()->route('libros.index')->with('ok', 'Libro eliminado');
    }

    private function validar(Request $request): array
    {
        return $request->validate([
            'Titulo'    => 'required|string|max:255',
            'genero'    => 'nullable|string|max:100',
            'Tipo'      => 'nullable|string|max:100',
            'ID_autor'  => 'nullable|integer',
            'ID_editor' => 'nullable|integer',
            'imagen'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ], [
            'imagen.image' => 'El archivo debe ser una imagen (jpg, png o webp).',
            'imagen.max'   => 'La imagen no puede pesar más de 2 MB.',
        ]);
    }

    private function listas(): array
    {
        return [
            'autores'  => Autor::orderBy('Nombre')->get(),
            'editores' => Editor::orderBy('nombre_editorial')->get(),
        ];
    }
}
