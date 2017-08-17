<?php

class PedidoController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function postListar()
    {
        if ( Request::ajax() ) {
        	/*$listar = DB::table('mesas')
        			->select('id','name as nombre')
                    ->where('estado',1)
                    ->get();*/
            $mesas = Mesa::where('estado',1)->get();

            return Response::json(
                array(
                    'rst'   => 1,
                    'datos' => $mesas
                )
            );
        }
    }

	public function index()
	{
		return Pedido::all();
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$sql = "
			SELECT p.id, ep.nombre, pl.nombre, epp.nombre
			FROM pedidos  p 
			JOIN estado_pedidos  ep  ON p.estado_pedidos_id = ep.id
			JOIN (SELECT MAX(id) AS id FROM pedidos WHERE mesa_id=? ) p2 ON p.id=p2.id
			LEFT JOIN pedido_plato  pp  ON  p.id=pp.pedido_id
			LEFT JOIN platos pl ON  pp.plato_id = pl.id
			LEFT JOIN  estado_pedido_plato  epp  ON  pp.estado_pedido_plato_id = epp.id
			WHERE mesa_id = ?";
		return DB::select($sql, [$id,$id]);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
