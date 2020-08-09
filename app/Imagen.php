<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    // Indicar nombre de la tabla
    protected $table = 'imagenes';
    // Indicar clave primaria
    protected $primaryKey = 'id';
    // Indicar campos gestionados por el usuario
    protected $fillable = ['nombre', 'pelicula_id'];
    // Indicar que las fechas para guardar y actualizar
    // las gestione el framework
    public $timestamps = true;

    // Mapear relacion de 1 a 1
    // Una imagen pertenece a una pelicula
    public function pelicula(){
    	return $this->belongsTo('App\Pelicula');
    }
}
