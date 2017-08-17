<?php

class Modulo extends Eloquent
{
    use DataViewer;

    protected $fillable = [
        'nombre',
        'url',
        'icon',
        'modulo_id'
    ];
    /**
     * Submodulos
     */
    public function scopeRaiz($query)
    {
        return $query->where('modulo_id',0);
    }
    /**
     * Submodulos relationship
     */
    public function scopeChild($query)
    {
        return $query->where('s.modulo_id','<>',0);
    }

    /**
     * Scope para obtener  movimiento.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeJoinParent($query)
    {
        return $query->join(
            'modulos as m',
            'm.id',
            '=',
            's.modulo_id'
        );
    }
    /**
     * Permisos relationship
     */
    public function permisos()
    {
        return $this->hasMany('Permission','submodulo_id');
    }

    public function parent()
    {
        return $this->belongsTo('Modulo', 'modulo_id');
    }

    public function children()
    {
        return $this->hasMany('Modulo', 'modulo_id');
    }

}