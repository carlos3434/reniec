<?php

class ModulosController extends Controller
{
    /**
     * Display a listing of the resource.
     * url     /modulos/lista
     * metohd  GET
     * @return Response
     */
    public function getLista()
    {
        $sumodulos = Modulo::raiz()->with('children');
        return Response::json(
            $sumodulos->get()
        );
    }
}