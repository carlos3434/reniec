<?php

//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;

class ApiSueldoController extends Controller
{

    public function get_percentile($array, $percentile) {
        sort($array);
        $index = ($percentile/100) * count($array);
        if (floor($index) == $index) {
             $result = ($array[$index-1] + $array[$index])/2;
        }
        else {
            $result = $array[floor($index)];
        }
        return $result;
    }

    public function careers()
    {

        $response = array(
            "careers" => Career::all(),
        );

        return Response::json($response);

    }

    public function regiones()
    {

        $response = array(
            "regiones" => Region::all(),
        );

        return Response::json($response);

    }

    public function index()
    {

        $careerId = Input::get('idCareer', 1);
        $referenceYear = Input::get('referenceYear', 2017);
        $experienceYears = Input::get('experienceYears', 5);
        $gender = Input::get('gender', 'F');

        $sueldos = Sueldo::query();

        if ( !is_null($careerId) ) {
            if ($careerId!='') {
                $sueldos->where('careerId', $careerId);    
            } else {
                $sueldos->where('careerId', 1);
            };
        } else {
            $sueldos->where('careerId', 1);
        };

        $sueldos->where('referenceYear', $referenceYear);
        $sueldos->where('experienceYears', $experienceYears);

        if ( !is_null($gender) and $gender!='' ) {
            $sueldos->where('gender', '=', $gender);
        } else {
            $sueldos->where('gender', '=', 'F');
        };

        //DB::connection()->enableQueryLog();

        $sueldos = $sueldos->get();

        /*
        $queries = DB::getQueryLog();
        var_dump($queries);
        */
        //die();
        
        $labels = array();
        $data = array();

        foreach ($sueldos as $sueldo) {
            array_push($labels, (string) $sueldo->salary);
            array_push($data, $sueldo->quantity);
        };

        $response = array(
            "labels" => $labels,
            "data" => $data,
        );

        return Response::json($response);      

    }

}