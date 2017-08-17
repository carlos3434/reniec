creando eventos en laravel

=========
Ejemplo 1
=========
Event::listen('auth.login', function($user)
//Event::listen('auth.*', function($param)
{
    //if (Event::firing() == 'auth.login')
    // {}

    //$user->intento ='0';
    //$user->estacion = $_SERVER['REMOTE_ADDR'];
    //$user->fecha_login = new DateTime;
    //$user->estado_log = 1;
    //$user->save();

    //si deseas etener la propagacion a otros eventos

    return false;
});
//disparando el evento
//  $response = Event::fire('auth.login', array($user));

=========
Ejemplo 2
=========

//    Event::listen('auth.login', 'LoginHandler', 10);

=========
Ejemplo 3, especificando metodo onLogin
=========
//    Event::listen('auth.login', 'LoginHandler@onLogin');

=========
Ejemplo 4, definiendo eventos subscribers.
=========
//Event::subscribe( new UserEventHandler );

=========
//Ejemplo 5, creacion o update de usuario
=========
//  Event::subscribe( new UserEventSubscriber );

//ejemplo relacionando con evento
/*
Event::listen('user.updated', function($user)
{
    Log::info(['update user']);
});
*/