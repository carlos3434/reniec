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

        $input = Input::all();
        $idCareer = $input['idCareer'];
        $referenceYear = $input['referenceYear'];
        $experienceYears = $input['experienceYears'];

        $response = array(
            "idCareer" => $idCareer,
            "referenceYear" => $referenceYear,
            "experienceYears" => $experienceYears
        );

        return Response::json($response);      

    }

}