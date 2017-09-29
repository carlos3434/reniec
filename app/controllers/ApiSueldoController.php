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

    public function index($id = 1, $years = 1)
    {

        $career = Input::get('career');
        $anio = Input::get('anio');
        $genero = Input::get('genero');
        $region = Input::get('region');
        
        $avg = DB::table('sueldos')->avg('sueldo');

        $labels = ["1200","1500","1800","2100","2400","2700"];
        $sueldos = [1400, 1700, 2000, 1600, 500, 200];

        if ($years == 1) {
            if ($id == 1) {
                $labels = ["1200","1500","1800","2100","2400","2700"];
                $sueldos = [1400, 1700, 2000, 1600, 500, 300];
            } else if ($id >= 2) {
                $labels = ["800","1200","2100","2500","3100","3500"];
                $sueldos = [800, 1200, 2100, 2500, 3100, 100];
            };
        } else if ($years == 5) {
            if ($id == 1) {
                $labels = ["1400","1600","1700","2200","2700","3100"];
                $sueldos = [1200, 1300, 2100, 2600, 400, 200];
            } else if ($id >= 2) {
                $labels = ["1500","1600","2100","2500","3100","3500"];
                $sueldos = [700, 1100, 200, 2500, 700, 150];
            };
        };

        $response = array(
            "labels" => $labels,
            "data" => $sueldos
        );

        return Response::json($response);

    }

}