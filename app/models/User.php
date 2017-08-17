<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Zizaco\Entrust\HasRole;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, DataViewer, HasRole, SoftDeletingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
    protected $dates = ['created_at','updated_at','deleted_at'];
	protected $guarded = ['password_confirmation','recaptcha','deleted_at'];
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];
	public static $rules = [
                'apellidos'=>'required|regex:/^([a-zA-Z .,ñÑÁÉÍÓÚáéíóú]{2,60})$/i',
                'nombres' =>'required|regex:/^([a-zA-Z .,ñÑÁÉÍÓÚáéíóú]{2,60})$/i',
                'username'  =>'required|min:6|unique:users',//dni
                'dni'  =>'required|min:8|unique:users',//dni
                'email'  =>'required|email|unique:users',
                'password'=>'required|alpha_num|between:6,12|confirmed',
                'password_confirmation'=>'required|alpha_num|between:6,12',
                'recaptcha'  => 'required',
                'captcha'               => 'required|min:1'
    ];
    public static $messajes = [
                'apellidos.required'   => 'Apellidos son requerido.',
                'nombres.required'    => 'Nombres son requerido.',
                'username.required'    => 'username es requerido.',
                'username.unique'    => ' username ya ha sido registrado.',
                'username.min'    => ' username necesita tener al menos 6 caracteres',
                'dni.required'    => 'dni es requerido.',
                'dni.unique'    => ' dni ya ha sido registrado.',
                'dni.min'    => ' dni necesita tener al menos 8 caracteres',
                'email.required'        => 'Email es requerido.',
                'email.email'           => 'Email no es valido',
                'email.unique'          => 'El email ya ha sido registrado.',
                'password.required'     => 'Password  es requerido.',
                'password.min'          => 'Password necesita tener al menos 6 caracteres',
                'password.alpha_num'    => 'Password solo puede contener letras y numeros',
                'password.confirmed'    => 'la confirmacion de Password no coincide.',
                'password_confirmation.alpha_num'    => 'la confirmacion de Password solo puede contener letras y numeros',
                //'password.max'          => 'Password maximum length is 20 characters',
                'recaptcha.required'             => 'Captcha es requerido',
                'captcha.min'           => 'mal captcha, por favor intente nuevamente.'
    ];
    /**
     * Boot the model.
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->token = str_random(30);
        });
    }
    //establecemos las relaciones con el modelo Role, ya que un usuario puede tener varios roles
    //y un rol lo pueden tener varios usuarios
    public function roles(){
        return $this->belongsToMany('Role');
    }
/*
    public function submodulos(){
        return $this->belongsToMany('Modulo');
    }*/
    /**
     * Set the password attribute.
     *
     * @param string $password
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }
   
    /**
     * Confirm the user.
     *
     * @return void
     */
    public function confirmEmail()
    {
        $this->verified = true;
        $this->token = null;
        $this->save();
    }


	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	public function getAuthPassword()
	{
		return $this->password;
	} 

	public function getRememberToken()
	{
		return $this->remember_token;
	}

	public function setRememberToken($value)
	{
		$this->remember_token = $value;
	}

	public function getRememberTokenName()
	{
		return "remember_token";
	}

	public function getReminderEmail()
	{
		return $this->email;
	}
}
