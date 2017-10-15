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
            "careers" => Career::select('car_id as id','car_nombre as name')
            ->where('car_estado',1)
            ->where('car_eliminado',0)
            ->get(),
        );

        return Response::json($response);

    }

    public function regiones()
    {

        $response = array(
            "regiones" => Region::select('ciu_id as id','ciu_nombre as name')
            ->where('ciu_estado',1)
            ->where('ciu_eliminado',0)
            ->get(),
        );

        return Response::json($response);

    }

    public function index()
    {

        $careerName = Input::get('careerName', 'DERECHO');
        $referenceYear = Input::get('referenceYear', 2017);
        $experienceYears = Input::get('experienceYears', 5);
        $genderName = Input::get('genderName', 'FEMENINO');
        $regionName = Input::get('regionName', 'LIMA');

        $sueldos = Sueldo::query();

        $queryString = "CALL pro_consulta01('" . $careerName ."', " . $referenceYear .", " . $experienceYears .", '" . $regionName ."', '" . $genderName ."')";
        $sueldosResponse = DB::select($queryString);

        $sueldosResponseFirst = $sueldosResponse[0];

        $valuesArr = array();

        foreach ($sueldosResponseFirst as $key => $value) {
            array_push($valuesArr, $value);
        };

        $arrResponse = array(
            $valuesArr[6],
            $valuesArr[7],
            $valuesArr[8],
            $valuesArr[9],
            $valuesArr[10]
        );

        $response["values"] = $arrResponse;

        return Response::json($response);

    }

    public function empleabilidad()
    {

        $careerName = Input::get('careerName', 'DERECHO');
        $referenceYear = Input::get('referenceYear', 2017);
        $experienceYears = Input::get('experienceYears', 5);
        $genderName = Input::get('genderName', 'FEMENINO');
        $regionName = Input::get('regionName', 'LIMA');

        $sueldos = Sueldo::query();

        $queryString = "CALL pro_consulta02('" . $careerName ."', " . $referenceYear .", " . $experienceYears .", '" . $regionName ."', '" . $genderName ."')";
        $sueldosResponse = DB::select($queryString);
//dd($sueldosResponse);
        $sueldosResponseFirst = $sueldosResponse[0];

        $valuesArr = array();

        foreach ($sueldosResponseFirst as $key => $value) {
            array_push($valuesArr, $value);
        };
        return Response::json($valuesArr);
    }
    public function universidad()
    {

        $careerName = Input::get('careerName', 'DERECHO');
        $referenceYear = Input::get('referenceYear', 2017);
        $experienceYears = Input::get('experienceYears', 5);
        $genderName = Input::get('genderName', 'FEMENINO');
        $regionName = Input::get('regionName', 'LIMA');

        $sueldos = Sueldo::query();

        $queryString = "CALL pro_consulta03('" . $careerName ."', " . $referenceYear .", " . $experienceYears .", '" . $regionName ."', '" . $genderName ."')";
        $sueldosResponse = DB::select($queryString);
//dd($sueldosResponse);
        $sueldosResponseFirst = $sueldosResponse[0];

        $valuesArr = array();

        foreach ($sueldosResponseFirst as $key => $value) {
            array_push($valuesArr, $value);
        };
        return Response::json($valuesArr);
    }
    public function empresa()
    {

        $careerName = Input::get('careerName', 'DERECHO');
        $referenceYear = Input::get('referenceYear', 2017);
        $experienceYears = Input::get('experienceYears', 5);
        $genderName = Input::get('genderName', 'FEMENINO');
        $regionName = Input::get('regionName', 'LIMA');

        $sueldos = Sueldo::query();

        $queryString = "CALL pro_consulta04('" . $careerName ."', " . $referenceYear .", " . $experienceYears .", '" . $regionName ."', '" . $genderName ."')";
        $sueldosResponse = DB::select($queryString);
//dd($sueldosResponse);
        $sueldosResponseFirst = $sueldosResponse[0];

        $valuesArr = array();

        foreach ($sueldosResponseFirst as $key => $value) {
            array_push($valuesArr, $value);
        };
        return Response::json($valuesArr);
    }

}