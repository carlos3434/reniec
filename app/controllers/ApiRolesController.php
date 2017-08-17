<?php

class ApiRolesController extends Controller
{
    /**
     * Display a listing of the resource.
     * url     /roles
     * metohd  GET
     * @return Response
     */
    public function index()
    {
        return Response::json(Role::searchPaginateAndOrder());
    }
    /**
     * Show the form for creating a new resource.
     * url     /roles/create
     * metohd  GET
     * @return Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     * url     /roles
     * metohd  POST
     * @return Response
     */
    public function store()
    {
        $role = new Role(Input::except('submodulos'));
        if ($role->save()){

        } else {
            return Response::json( $role->validationErrors );
        }
        if (Input::has('submodulos')) {
            foreach (Input::get('submodulos') as $submodulo) {
                foreach ($submodulo['permisos'] as $permisos) {
                    if ($permisos['estado']=='true') {
                        $role->attachPermission($permisos);
                    }
                }
            }
        }
        return Response::json($role);
    }
    /**
     * Display the specified resource.
     * url     /roles/{id}
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
     * url     /roles/{id}/edit
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
     * url     /roles/{id}
     * metohd  PUT/PATCH
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $role = Role::findOrFail($id);
        $respuestaUpdate = $role->update(Input::all());

        $permisos=[];
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
        
        if (Input::has('submodulos')) {
            $submodulos = Input::get('submodulos');
            $ids= array_column($submodulos, 'id');
            //dd($submodulos,$rst);
            foreach ($submodulos as $submodulo) {
                if (isset($submodulo['permisos'])) {
                    # code...
                    foreach ($submodulo['permisos'] as $permiso) {
                        if ($permiso['estado']=='true') {
                            array_push($permisos,$permiso['id']);
                        }
                    }
                }
            }
           //dd($permisos);
            $role->permissions()->sync($permisos);
            //$role->attachPermissions($permisos);
        }
        return Response::json($respuestaUpdate);
    }


    /**
     * Remove the specified resource from storage.
     * url     /roles/{id}
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