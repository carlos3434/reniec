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

        $idCareer = Input::get('idCareer');
        $referenceYear = Input::get('referenceYear');
        $experienceYears = Input::get('experienceYears');
        $gender = Input::get('gender');

        $sueldos = Sueldo::
              where('careerId', $idCareer)
            ->where('referenceYear', $referenceYear)
            ->where('experienceYears', $experienceYears)
            ->where('gender', '=', $gender)
            ->get();

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