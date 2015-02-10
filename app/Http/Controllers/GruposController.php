<?php namespace Samira\Http\Controllers;

use Samira\Http\Requests\gruposRequest;
use Samira\Http\Controllers\Controller;
use Samira\grupos\Grupo;

class GruposController extends Controller {


	private $grupo;

	public function __construct (Grupo $grupo){

		$this->Grupo = $grupo;
		/** $this->middleware('sysadmin');  */
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$grupo = $this->Grupo->get();
		return view('grupos.index2')->withgrupos($grupo);
	/*	$this->middleware('sysadmin');  */
		
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('grupos.nueva');
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(gruposRequest $request)
	{
			$grupo = new Grupo($request->all());
			$grupo->save();
			return redirect()->route('grupo');;
			
	
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Grupo $grupo)
	{
       return view('grupos.show')->withGrupo($grupo);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Grupo $grupo)
	{
       return view('grupos.editar')->withGrupo($grupo);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Grupo $grupo, gruposRequest $request)
	{
		$grupo->fill(\Request::input())->save();
		return redirect ('grupo');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Grupo $grupo)
	{
		$grupo->delete();
		return redirect ('grupo');
		
	}

}
