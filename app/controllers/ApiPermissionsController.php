<?php

class ApiPermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     * url     /permissions
     * metohd  GET
     * @return Response
     */
    public function index()
    {
        //return Response::json(Permission::searchPaginateAndOrder());
        $permissions = Permission::all();
        return Response::json(
            $permissions
        );
    }
    /**
     * Show the form for creating a new resource.
     * url     /permissions/create
     * metohd  GET
     * @return Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     * url     /permissions
     * metohd  POST
     * @return Response
     */
    public function store()
    {
        //
        return Role::create(Input::all());
    }
    /**
     * Display the specified resource.
     * url     /permissions/{id}
     * metohd  GET
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return Role::with('permissions')->findOrFail($id);
    }
    /**
     * Show the form for editing the specified resource.
     * url     /permissions/{id}/edit
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
     * url     /permissions/{id}
     * metohd  PUT/PATCH
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $role = Role::findOrFail($id);
        $respuestaUpdate = $role->update(Input::all());

        
        if (Input::has('permissions')) {
            $permissions = Input::get('permissions');
        //if ($request->has('roles_user')) {
           $rst= $role->permissions()->getRelatedIds();
//dd($permissions);
           //$role->perms()->sync([1,2,3,4,5]);
//           $role->perms()->sync($permissions);
           //$role->attachPermission($permissions);
            //$role->permissions()->sync($permissions);
            //$user->roles()->getRelatedIds();
        }
        

        return Response::json($respuestaUpdate);
    }


    /**
     * Remove the specified resource from storage.
     * url     /permissions/{id}
     * metohd  DELETE
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Role::findOrFail($id)->delete();
    }
}