<?php
class UserEventHandler {

    /**
     * Handle user login events.
     */
    public function onUserLogin($event)
    {
        Session::set('user', Auth::user());
        $sql = "  SELECT 
            s.id,
            m.nombre AS modulo, s.nombre AS submodulo, 
            CONCAT( m.url,  '.',  s.url )  AS url,
            
            (SELECT nombre FROM permissions p WHERE p.submodulo_id=s.id AND orden=1) AS `create`,
            (SELECT nombre FROM permissions p WHERE p.submodulo_id=s.id AND orden=2) AS `read`,
            (SELECT nombre FROM permissions p WHERE p.submodulo_id=s.id AND orden=3) AS `update`,
            (SELECT nombre FROM permissions p WHERE p.submodulo_id=s.id AND orden=4) AS `delete`
            
          FROM modulos m 
          JOIN  modulos s ON m.id=s.modulo_id
          JOIN  (
                SELECT   p.submodulo_id  AS id
                FROM  roles  r
                JOIN  permission_role  pr  ON  r.id = pr.role_id
                JOIN  permissions  p ON pr.permission_id = p.id
                WHERE r.id=1 
                GROUP BY p.submodulo_id
          ) AS p  
          ON   s.id  =  p.id";
        $rst = DB::select($sql);

        $menu=[];
        foreach ($rst as $data) {
            $modulo = $data->modulo;
            $submodulo = $data->submodulo;
            $menu[$modulo][$submodulo] = $data;
        }
        Session::set('menu', $menu);
        Log::info(['logueado con subscribers']);
        Log::info($menu);
    }

    /**
     * Handle user logout events.
     */
    public function onUserLogout($event)
    {
        Session::flush();
        Log::info(['exit con subscribers']);
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $events
     * @return array
     */
    public function subscribe($events)
    {
        $events->listen('auth.login', 'UserEventHandler@onUserLogin');

        $events->listen('auth.logout', 'UserEventHandler@onUserLogout');
    }

}