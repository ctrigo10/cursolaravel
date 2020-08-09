<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    // Indicar nombre de la tabla
    protected $table = 'peliculas';
    // Indicar clave primaria
    protected $primaryKey = 'id';
    // Indicar campos gestionados por el usuario
    protected $fillable = ['titulo', 'costo', 'resumen', 'estreno', 'genero_id', 'user_id'];
    // Indicar que las fechas para guardar y actualizar
    // las gestione el framework
    public $timestamps = true;

    // Mapear relacion de 1 a 1
    // Una pelicula pertenece a un usuario
    public function user(){
    	return $this->belongsTo('App\User');
    }

	// Mapear relacion de 1 a 1
    // Una pelicula pertenece a un genero
    public function genero(){
    	return $this->belongsTo('App\Genero');
    }

    // Mapear relacion 1 a N
    // Una pelicula tiene varias imagenes
    public function imagenes(){
        // Retornar tipo de relacion
        return $this->hasMany('App\Imagen');
    }

    // Mapear relacion N a M
    // Una pelicula pertenece a muchos directores
    public function directores() {
    	return $this->belongsToMany('App\Director', 'pelicula_director')->withTimestamps();
    }
}
