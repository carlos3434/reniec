<?php

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     * url     /roles/lista
     * metohd  GET
     * @return Response
     */
    public function getLista()
    {
        
        return Response::json(
            Role::all()
        );
    }
}