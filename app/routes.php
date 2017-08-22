<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::get('empleabilidad', function () {
    return View::make('web.empleabilidad');
});
Route::get('home', function () {
    return View::make('web.home');
});
Route::get('sueldos', 'ApiSueldoController@index');

Route::get('colores', function () {
    $colores=[12, 19, 3, 5, 2, 3];
    return Response::json($colores);
});

Route::get('envio', 'OfficetrackController@getEnvio');
Route::post('ot', 'OfficetrackController@getServer');

Route::any('/', function()
{
    if (Auth::check())
    {
        return Redirect::to('inicio');
    }
    return View::make('user/login');
});

Route::get('password/remind', function()
{
    return View::make('password/remind');
});
Route::get('user/registro', function()
{
    return View::make('user/registro');
});
Route::get('register/confirm/{token}', 'UserController@confirmEmail');

//Route::group(["before" => "csrf"], function() {
    Route::controller('password', 'RemindersController');
    Route::controller("user", "UserController");
    Route::controller("mesa", "MesaController");
    Route::controller("plato", "PlatoController");
    Route::post("login", "UserController@postLogin");
    //Route::controller('login', 'LoginController');
//});

Route::group(["before" => "auth"], function() {
    Route::group(["before" => "session"], function() {

        Route::get('inicio', function () {
            return View::make('admin.main');
        });
        Route::get('admin.mantenimiento.usuarios', function () {
            return View::make('admin.mantenimiento.users');
        });
        Route::get('admin.mantenimiento.roles', function () {
            return View::make('admin.mantenimiento.roles');
        });
        Route::get('admin.mantenimiento.modulos', function () {
            return View::make('admin.mantenimiento.modulos');
        });
        Route::get('admin.mantenimiento.submodulos', function () {
            return View::make('admin.mantenimiento.submodulos');
        });

        Route::get('admin.inventario.registro', function () {
            return View::make('admin.inventario.registro');
        });
        Route::get('admin.inventario.recepcion', function () {
            return View::make('admin.inventario.recepcion');
        });
        Route::get('admin.inventario.transferencia', function () {
            return View::make('admin.inventario.transferencia');
        });
        Route::get('admin.inventario.bandeja', function () {
            return View::make('admin.inventario.bandeja');
        });
        Route::get('charts', function () {
            return View::make('charts');
        });
        Route::get('admin.estadistica.sueldo', function () {
            return View::make('admin.estadistica.sueldo');
        });
        Route::get('admin.tarea.registro', function () {
            return View::make('admin.tarea.registro');
        });
        Route::get('admin.orders.order', function () {

            $sql = "SELECT p.id, p.nombre, cp.stock, cp.precio, tp.nombre as tipo
                    FROM calendario_platos cp
                    JOIN calendarios  c  ON cp.calendario_id = c.id
                    JOIN platos  p  ON cp.plato_id = p.id
                    JOIN tipo_platos  tp ON p.tipo_platos_id  =  tp.id
                    WHERE fecha='2017-05-08' AND p.categoria_platos_id=1";
            $menu = DB::select($sql);
            $sql = "SELECT p.id, p.nombre, cp.stock, cp.precio, tp.nombre as tipo
                    FROM calendario_platos cp
                    JOIN calendarios  c  ON cp.calendario_id = c.id
                    JOIN platos  p  ON cp.plato_id = p.id
                    JOIN tipo_platos  tp ON p.tipo_platos_id  =  tp.id
                    WHERE fecha='2017-05-08' AND p.categoria_platos_id=2";
            $carta = DB::select($sql);
            $data=[
                'mesas' => $mesas,
                'menu'  => $menu,
                'carta' => $carta
            ];
            return View::make('admin.orders.orders')->with($data);
        });

        //esto tiene que ser dinamico
        /*Route::get('/{uri}', function ($uri) {
            list($modulo,$submodulo) = explode('.', $uri);
            return view('admin.'.$modulo.'.'.$submodulo.'.index');
        });*/

    });
    //filtro token csrf
    Route::group(["before" => "csrf"], function() {
        //controllers
        Route::controller('roles', 'RolesController');
        Route::controller('trabajadores', 'TrabajadoresController');
        Route::controller('estadotarea', 'EstadoTareaController');
        Route::controller('tipotarea', 'TipoTareaController');
        Route::controller('modulos', 'ModulosController');
        Route::controller('permissions', 'PermissionsController');
        Route::controller('formularios', 'FormularioController');
        Route::resource('pedido', 'PedidoController');

        //api's
        Route::resource('api/users', 'ApiUserController');
        Route::resource('api/modulos', 'ApiModulosController');
        Route::resource('api/submodulos', 'ApiSubModulosController');
        Route::resource('api/roles', 'ApiRolesController');
        Route::resource('api/permissions', 'ApiPermissionsController');

        Route::resource('api/inventarios', 'ApiInventariosController');
        //Route::resource('api/tareas', 'ApiTareaController');

        Route::resource('api/tareas', 'ApiTareasController');
    });
});