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

        $careers = array(
            [
                "id" => 1,
                "name" => "Ingeniería Informática"
            ],
            [
                "id" => 2,
                "name" => "Derecho"
            ],
            [
                "id" => 3,
                "name" => "Arquitectura"
            ],
            [
                "id" => 4,
                "name" => "Ingeniería Industrial"
            ],
            [
                "id" => 5,
                "name" => "Psicología"
            ]
        );

        $response = array(
            "careers" => $careers,
        );

        return Response::json($response);
    }

    public function index($id)
    {
        //$sueldos = DB::table('sueldos')->get();
        //$sueldos = DB::table('sueldos')->lists('sueldo');

        //dd($sueldos);

        //dd($results);
        //$data = $results->toArray();
        //dd($data);

        //$percentiles = array();
        //$percentile_marks = array(25,50,75);

        /*foreach ($percentile_marks as $value) {
          $percentile = $this->get_percentile ( $sueldos, $value );  
          array_push($percentiles, $percentile);
        };*/

        //dd($percentiles);
        
        $avg = DB::table('sueldos')->avg('sueldo');

        $labels = ["1200","1500","1800","2100","2400","2700"];
        $sueldos = [1400, 1700, 2000, 1600, 500, 200];

        if ($id == 1) {
            $labels = ["1200","1500","1800","2100","2400","2700"];
            $sueldos = [1400, 1700, 2000, 1600, 500, 300];
        } else if ($id >= 2) {
            $labels = ["800","1200","2100","2500","3100","3500"];
            $sueldos = [800, 1200, 2100, 2500, 3100, 100];
        };

        $response = array(
            "labels" => $labels,
            "data" => $sueldos
        );

        return Response::json($response);
    }

}