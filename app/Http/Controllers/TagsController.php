<?php namespace Samira\Http\Controllers;

use Illuminate\Support\Facades\View;
use Samira\Http\Requests\ArticulosRequest;
use Samira\Http\Controllers\Controller;
use Samira\Http\Requests\TagsRequest;
use Samira\Tags\Tag;
use Samira\Articulos\Articulo;
use Samira\ArticuloTag\ArticuloTag;
use Samira\Http\Requests\Request;

class TagsController extends Controller {

    private $users;
	private $tag;
    private $articulo;
	public function __construct (Tag $tag, Articulo $articulo){

		$this->tag = $tag;
        $this->articulo = $articulo;
		/** $this->middleware('sysadmin');  */
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $tag = $this->tag->get();
        /*$articulo=Articulo::paginate(2);*/
         $grupo= new \Samira\Grupos\Grupo();
        /*dd($tag);*/
         return view('tags.index')->withTags($tag);
        /*	$this->middleware('sysadmin');  */

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $tags =Tag::lists('nombre', 'id');
        return view('tags.nueva', compact('nombre', 'descripcion'))->with(['tags' => $this->tag]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ArticulosRequest $request)
	{
            $tag = new Tag($request->all());
			$tag->save();
			return redirect()->route('tag');;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Articulo $articulo)
	{

       return view('articulos.show')->withArticulo($articulo);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Articulo $articulo)
	{
       $articulos = Articulo::lists('nombre', 'id');
       $grupos = Grupo::lists('nombre', 'id');
       return view('articulos.editar', compact('articulos', 'grupos','articulo'));

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Articulo $articulo, ArticulosRequest $request)
	{
		$articulo->fill(\Request::input())->save();
		return redirect ('articulo');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Articulo $articulo)
	{
		$articulo->delete();
		return redirect ('articulo');
		
	}

    public function buscar()
    {
        $fecha=\Request::input('fecha');
        $articulo = $this->articulo->buscar($fecha);
        return view('articulos.index')->withArticulos($articulo);
    }

    public function asignarTag()
    {
        $tags = $this->tag->get();
        $articulos = $this->articulo->get();
        return view('tags.asignartags',compact('tags','articulos'));
    }

    public function guardaTag(TagsRequest $request)
    {
        $tag=\Request::input('tag');
        $articulo=\Request::input('articulo');
        $item=Articulo::find($articulo);
        $item->tags()->attach($tag);
        return redirect()->route('tag');
    }
}
