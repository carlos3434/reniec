<?php

use Zizaco\Entrust\EntrustRole;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Role extends EntrustRole
{
    use DataViewer,SoftDeletingTrait;

    protected $fillable = [
        'nombre',
        'nombre_mostrar',
        'descripcion'
    ];
    public function permissions() {
        return $this->belongsToMany('Permission', 'permission_role');
    }
    //establecemos las relacion de muchos a muchos con el modelo User, ya que un rol 
    //lo pueden tener varios usuarios y un usuario puede tener varios roles
    public function users(){
        return $this->belongsToMany('User');
    }
}