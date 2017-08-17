<?php

class ApiInventariosController extends Controller
{
    /**
     * Display a listing of the resource.
     * url     /api/inventarios
     * metohd  GET
     * @return Response
     */
    public function index()
    {
        $inventarios = Inventario::with('elementos')
        ->categoria()
        ->searchPaginateAndOrder();

        return Response::json(
            $inventarios
        );
    }
    /**
     * Show the form for creating a new resource.
     * url     /api/inventarios/create
     * metohd  GET
     * @return Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     * url     /api/inventarios
     * metohd  POST
     * @return Response
     */
    public function store()
    {
        //
        $inventario = Inventario::create(Input::all());
        
        return $inventario;
    }
    /**
     * Display the specified resource.
     * url     /api/inventarios/{id}
     * metohd  GET
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $inventario = Inventario::where('inventarios.id', $id)
        ->with('elementos')
        ->categoria()
        ->first();
        return Response::json($inventario);
    }
    /**
     * Show the form for editing the specified resource.
     * url     /api/inventarios/{id}/edit
     * metohd  GET
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
     * url     /api/inventarios/{id}
     * metohd  PUT/PATCH
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $inventario = Inventario::findOrFail($id);
        $response = $inventario->update(Input::all());

        return Response::json($response);
    }

    /**
     * Remove the specified resource from storage.
     * url     /api/inventarios/{id}
     * metohd  DELETE
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Inventario::findOrFail($id)->delete();
    }
}