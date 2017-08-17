<?php

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    protected $fillable = [
        'nombre',
        'nombre_mostrar',
        'descripcion',
        'orden',
        'submodulo_id'
    ];
   //establecemos las relacion de muchos a muchos con el modelo Role, ya que un permiso
   //lo pueden tener varios roles y un rol puede tener varios permisos
   public function roles(){
        //return $this->belongsToMany('Role','permission_role');
        return $this->belongsToMany('Role', 'permission_role', 'user_id', 'foo_id');
    }
    /**
     * 
     */
    public function modulo(){
        return $this->belongsTo('Modulo');
    }
}