<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function index()
    {
        $autores = Autor::withCount('libros')->orderBy('Nombre')->get();
        return view('autores.index', compact('autores'));
    }

    public function create()
    {
        return view('autores.create');
    }

    public function store(Request $request)
    {
        Autor::create($this->validar($request));
        return redirect()->route('autores.index')->with('ok', 'Autor agregado');
    }

    public function edit(Autor $autor)
    {
        return view('autores.edit', compact('autor'));
    }

    public function update(Request $request, Autor $autor)
    {
        $autor->update($this->validar($request));
        return redirect()->route('autores.index')->with('ok', 'Autor actualizado');
    }

    public function destroy(Autor $autor)
    {
        // Los libros del autor quedan como "Autor desconocido".
        $autor->libros()->update(['ID_autor' => null]);
        $autor->delete();

        return redirect()->route('autores.index')->with('ok', 'Autor eliminado');
    }

    private function validar(Request $request): array
    {
        return $request->validate([
            'Nombre'    => 'required|string|max:100',
            'Apellidos' => 'nullable|string|max:150',
        ]);
    }
}
