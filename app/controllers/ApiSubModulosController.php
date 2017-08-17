<?php

class ApiSubModulosController extends Controller
{
    /**
     * Display a listing of the resource.
     * url     /api/submodulos
     * metohd  GET
     * @return Response
     */
    public function index()
    {
        $modulos = Modulo::from('modulos as s')
        ->select(
            's.id',
            's.nombre',
            's.icon',
            's.url',
            'm.nombre as modulo',
            'm.id as parent_id'
        )
        ->Child()
        ->joinParent()
        ->searchPaginateAndOrder();
        
        return Response::json(
            $modulos
        );
    }
    /**
     * Show the form for creating a new resource.
     * url     /api/submodulos/create
     * metohd  GET
     * @return Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     * url     /api/submodulos
     * metohd  POST
     * @return Response
     */
    public function store()
    {
        //
        $modulo = Modulo::create(Input::all());
        if ($modulo) {
            # crear permisos
            Permission::create([
                'nombre' => 'create-'.$modulo->nombre,
                'nombre_mostrar' => 'create '.$modulo->nombre,
                'descripcion' => '',
                'orden' => 1,
                'submodulo_id' => $modulo->id,
            ]);

            Permission::create([
                'nombre' => 'read-'.$modulo->nombre,
                'nombre_mostrar' => 'read '.$modulo->nombre,
                'descripcion' => '',
                'orden' => 2,
                'submodulo_id' => $modulo->id,
            ]);

            Permission::create([
                'nombre' => 'update-'.$modulo->nombre,
                'nombre_mostrar' => 'update '.$modulo->nombre,
                'descripcion' => '',
                'orden' => 3,
                'submodulo_id' => $modulo->id,
            ]);

            Permission::create([
                'nombre' => 'delete-'.$modulo->nombre,
                'nombre_mostrar' => 'delete '.$modulo->nombre,
                'descripcion' => '',
                'orden' => 4,
                'submodulo_id' => $modulo->id,
            ]);
            return $modulo;
        }
        return $modulo;
    }
    /**
     * Display the specified resource.
     * url     /api/submodulos/{id}
     * metohd  GET
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $modulo = Modulo::where('id', $id)->with('permisos')->first();
        return Response::json($modulo);
    }
    /**
     * Show the form for editing the specified resource.
     * url     /api/submodulos/{id}/edit
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
     * url     /api/submodulos/{id}
     * metohd  PUT/PATCH
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //buscar si se estan actualizando los permisos
        
        $modulo = Modulo::findOrFail($id);
        $response = $modulo->update(Input::all());

        return Response::json($response);
    }


    /**
     * Remove the specified resource from storage.
     * url     /api/submodulos/{id}
     * metohd  DELETE
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Modulo::findOrFail($id)->delete();
    }
}