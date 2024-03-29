<?php namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSalasRequest;
use App\Models\Tipodesala;
use App\Models\Campus;
use Illuminate\Http\Request;

class SalasController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view("salas.index")->with('salas', \App\Models\Sala::paginate(5)->setPath('sala'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$campus = Campus::lists('nombre','id');
		$tiposdesalas = Tipodesala::lists('nombre','id');
		return view('salas.create')->with('tiposdesala',$tiposdesalas)->with('campus',$campus);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateSalasRequest $request)
	{
		$salas = new \App\Models\Sala;
		$salas->campus_id = \Request::input('campus_id');
		$salas->tipo_sala_id = \Request::input('tipo_sala_id');
		$salas->nombre = \Request::input('nombre');
		$salas->descripcion = \Request::input('descripcion');
		$salas->save();
		return redirect()->route('salas.index')->with('message', 'Sala Agregada');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$salas = \App\Models\Sala::find($id);
		$campus = Campus::find($salas->campus_id);
		$tiposdesalas = Tipodesala::find($salas->tipo_sala_id);
		return view('salas.show')->with('sala',$salas)->with('tiposala',$tiposdesalas)->with('campus',$campus);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$campus = Campus::lists('nombre','id');
		$tiposdesalas = Tipodesala::lists('nombre','id');
		return view('salas.edit')->with('sala', \App\Models\Sala::find($id))->with('tiposdesala',$tiposdesalas)->with('campus',$campus);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, CreateSalasRequest $request)
	{
		$salas = \App\Models\Sala::find($id);
		$salas->campus_id = \Request::input('campus_id');
		$salas->tipo_sala_id = \Request::input('tipo_sala_id');
		$salas->nombre = \Request::input('nombre');
		$salas->descripcion = \Request::input('descripcion');
		$salas->save();
		return redirect()->route('salas.index', ['sala' => $id])->with('message', 'Cambios guardados');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$salas = \App\Models\Sala::find($id);
		$salas->delete();
		return redirect()->route('salas.index')->with('message', 'Sala Eliminada con éxito');
	}

}
