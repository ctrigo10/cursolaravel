<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    // Indicar nombre de la tabla
    protected $table = 'generos';
    // Indicar clave primaria
    protected $primaryKey = 'id';
    // Indicar campos gestionados por el usuario
    protected $fillable = ['genero'];
    // Indicar que las fechas para guardar y actualizar
    // las gestione el framework
    public $timestamps = true;

    // Mapear relacion 1 a N
    // Un genero tiene varias peliculas
    public function peliculas(){
        // Retornar tipo de relacion
        return $this->hasMany('App\Pelicula');
    }
}
