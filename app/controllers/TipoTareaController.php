<?php

class TipoTareaController extends Controller
{
    /**
     * Display a listing of the resource.
     * url     /tipotarea/lista
     * metohd  GET
     * @return Response
     */
    public function getLista()
    {
        
        return Response::json(
            TipoTarea::all()
        );
    }
}