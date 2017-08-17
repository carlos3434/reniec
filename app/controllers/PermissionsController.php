<?php

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     * url     /permissions/lista
     * metohd  GET
     * @return Response
     */
    public function getLista()
    {
        //return Response::json(Permission::searchPaginateAndOrder());
        $permissions = Permission::all();
        return Response::json(
            $permissions
        );
    }
}