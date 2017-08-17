<?php

class FormularioController extends Controller
{
    /**
     * Display a listing of the resource.
     * url     /formularios/lista
     * metohd  GET
     * @return Response
     */
    public function getLista()
    {
        
        return Response::json(
            Formulario::where('movimiento_id',Input::get('movimiento_id'))->with('imagenes')->get()
        );
    }
}