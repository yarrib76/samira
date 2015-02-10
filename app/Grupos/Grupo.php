<?php namespace Samira\Grupos;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model

{
	protected $fillable = ['nombre', 'ganancia', 'id'];

    public function articulos()
    {
        return $this->hasMany('Samira\Articulos\Articulo','grupos_id');

    }
}

