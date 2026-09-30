<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    protected $table = 'autores';
    protected $primaryKey = 'ID_autores';
    public $timestamps = false;

    protected $fillable = ['Nombre', 'Apellidos'];

    public function libros()
    {
        return $this->hasMany(Libro::class, 'ID_autor', 'ID_autores');
    }

    public function getNombreCompletoAttribute(): string
    {
        return trim($this->Nombre . ' ' . $this->Apellidos);
    }
}
