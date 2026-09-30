<?php

namespace App\Http\Controllers;

use App\Models\Editor;
use Illuminate\Http\Request;

class EditorController extends Controller
{
    public function index()
    {
        $editores = Editor::withCount('libros')->orderBy('nombre_editorial')->get();
        return view('editores.index', compact('editores'));
    }

    public function create()
    {
        return view('editores.create');
    }

    public function store(Request $request)
    {
        Editor::create($this->validar($request));
        return redirect()->route('editores.index')->with('ok', 'Editorial agregada');
    }

    public function edit(Editor $editor)
    {
        return view('editores.edit', compact('editor'));
    }

    public function update(Request $request, Editor $editor)
    {
        $editor->update($this->validar($request));
        return redirect()->route('editores.index')->with('ok', 'Editorial actualizada');
    }

    public function destroy(Editor $editor)
    {
        // Los libros de la editorial quedan sin editorial.
        $editor->libros()->update(['ID_editor' => null]);
        $editor->delete();

        return redirect()->route('editores.index')->with('ok', 'Editorial eliminada');
    }

    private function validar(Request $request): array
    {
        return $request->validate([
            'nombre_editorial' => 'required|string|max:150',
        ]);
    }
}
