<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    // Indicar nombre de la tabla
    protected $table = 'directores';
    // Indicar clave primaria
    protected $primaryKey = 'id';
    // Indicar campos gestionados por el usuario
    protected $fillable = ['nombre'];
    // Indicar que las fechas para guardar y actualizar
    // las gestione el framework
    public $timestamps = true;

    // Mapear relacion N a M
    // Un director tiene muchas peliculas
    public function peliculas() {
    	return $this->belongsToMany('App\Pelicula', 'pelicula_director');
    }
}
