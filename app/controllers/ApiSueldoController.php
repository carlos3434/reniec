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

    public function index()
    {
        //$sueldos = DB::table('sueldos')->get();
        $sueldos = DB::table('sueldos')->lists('sueldo');

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

        $response = array(
          "data" => $sueldos
        );

        return Response::json($response);
    }

}