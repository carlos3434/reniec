<?php

class ApiUserController extends Controller
{
    /**
     * Display a listing of the resource.
     * url     /user
     * metohd  GET
     * @return Response
     */
    public function index()
    {
        return Response::json(User::searchPaginateAndOrder());
    }
    /**
     * Show the form for creating a new resource.
     * url     /user/create
     * metohd  GET
     * @return Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     * url     /user
     * metohd  POST
     * @return Response
     */
    public function store()
    {
        $user = User::create(Input::except(['roles','estado']));
        if (Input::has('roles')) {
            $user->roles()->getRelatedIds();
            $user->roles()->sync( Input::get('roles') );
        }
        return $user;
    }
    /**
     * Display the specified resource.
     * url     /user/{id}
     * metohd  GET
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return User::with('roles'/*,'submodulos'*/)->findOrFail($id);
    }
    /**
     * Show the form for editing the specified resource.
     * url     /user/{id}/edit
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
     * url     /user/{id}
     * metohd  PUT/PATCH
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $user = User::findOrFail($id);
        $response = $user->update(Input::except('submodulos','roles'));
        if ($response && Input::has('submodulos')) {
            
            $user->submodulos()->getRelatedIds();
            $user->submodulos()->sync( Input::get('submodulos') );
        }
        if ($response && Input::has('roles')) {
            $user->roles()->getRelatedIds();
            $user->roles()->sync( Input::get('roles') );
        }
        return Response::json($response);
    }


    /**
     * Remove the specified resource from storage.
     * url     /user/{id}
     * metohd  DELETE
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
    }
}