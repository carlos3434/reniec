<?php

class EstadoTareaController extends Controller
{
    /**
     * Display a listing of the resource.
     * url     /estadotarea/lista
     * metohd  GET
     * @return Response
     */
    public function getLista()
    {
        
        return Response::json(
            EstadoTarea::all()
        );
    }
}