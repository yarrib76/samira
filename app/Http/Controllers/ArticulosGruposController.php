<?php namespace Tala\Http\Controllers;

use Tala\Http\Requests\CrearArticulosGruposRequest;
use Tala\Http\Controllers\Controller;
use Tala\Flotas\ArticulosGrupos;
use Tala\Flotas\Flota;
use Tala\Usuarios\Usuario;
use Tala\Usuarios\Rol;


class ArticulosGruposController extends Controller {


	private $ArticulosGrupos;

	public function __construct ( ArticulosGrupos $ArticulosGrupos){

		$this->ArticulosGrupos = $ArticulosGrupos;
		$this->middleware('sysadmin');  

	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$articulo_grupo = $this->ArticulosGrupos->with('articulo')->with('grupo')->get();
		return view('ArticulosGruposs.index')->withArticulosGruposs($articulo_grupo);
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$usuarios = Usuario::lists('nombre', 'id');
		$roles = Rol::lists('nombre', 'id');
		$flotas = Flota::lists('nombre', 'id');
		return view('ArticulosGruposs.nuevo', compact('usuarios', 'roles', 'flotas'))->with(['ArticulosGrupos' => $this->ArticulosGrupos]);
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CrearArticulosGruposRequest $request)
	{
		$ArticulosGrupos = $this->ArticulosGrupos->create($request->all());
		return redirect()->route('ArticulosGrupos.index');
		
	}



	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function edit(ArticulosGrupos $ArticulosGrupos)
	{
		$usuarios = Usuario::lists('nombre', 'id');
		$roles = Rol::lists('nombre', 'id');
		$flotas = Flota::lists('nombre', 'id');
			 
       return view('ArticulosGruposs.editar', compact('usuarios', 'roles', 'flotas', 'ArticulosGrupos'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(ArticulosGrupos $ArticulosGrupos, CrearArticulosGruposRequest $request)
	{
		$ArticulosGrupos->fill(\Request::input())->save();
		return redirect ('ArticulosGrupos');
	}


		/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(ArticulosGrupos $ArticulosGrupos)
	{
		$ArticulosGrupos->delete();
		return redirect()->route('ArticulosGrupos.index');
		
	}
	

}
