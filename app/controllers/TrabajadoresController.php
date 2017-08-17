<?php

class TrabajadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     * url     /trabajadores/lista
     * metohd  GET
     * @return Response
     */
    public function getLista()
    {
        
        return Response::json(
            Trabajador::all()
        );
    }
}