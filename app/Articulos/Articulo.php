<?php namespace Samira\Articulos;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model

{
    protected $fillable = ['nombre', 'descripcion', 'grupos_id', 'id'];

    public function grupo()
    {
        return $this->belongsTo('Samira\Grupos\Grupo', 'grupos_id');
    }

    public function buscar($fecha)
    {
        return Articulo::where('created_at', '>', $fecha)->paginate(2);
    }

    public function tags()
    {
        return $this->belongsToMany('Samira\Tags\Tag', 'articulos_tagas','articulo_id','tags_id');
    }

}

