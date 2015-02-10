<?php namespace Samira\Http\Controllers;

use Illuminate\Support\Facades\View;
use Samira\Http\Requests\ArticulosRequest;
use Samira\Http\Controllers\Controller;
use Samira\Articulos\Articulo;
use Samira\Grupos\Grupo;
use Samira\Http\Requests\Request;

class ArticulosController extends Controller {

    private $users;
	private $articulo;

	public function __construct (Articulo $articulo){

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
         $articulo = $this->articulo->with('grupo')->paginate(4);
        /*$articulo=Articulo::paginate(2);*/
         $grupo= new \Samira\Grupos\Grupo();
         return view('articulos.index2')->withArticulos($articulo);
        /*	$this->middleware('sysadmin');  */

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $articulos = Articulo::lists('nombre', 'id');
        $grupos = Grupo::lists('nombre', 'id');
        return view('articulos.nueva', compact('articulos', 'grupos'))->with(['articulos' => $this->articulo]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ArticulosRequest $request)
	{
            $articulo = new Articulo($request->all());
			$articulo->save();
			return redirect()->route('articulo');;
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

}
