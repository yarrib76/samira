<?php namespace Samira\Tags;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model

{
    protected $fillable = ['nombre', 'descripcion', 'id'];

    public function Articulos()
    {
        return $this->belongsToMany('Articulos', 'articulos_tagas');
    }
}

