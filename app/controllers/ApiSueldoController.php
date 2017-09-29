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

        //$careersNamesJson = Career::all()->pluck('name')->toJson();
        $careers = DB::table('careers')->select('name')->get();
        $careers = array_flatten($careers);
        return $careers;

    }

    public function regiones()
    {

        $regiones = array(
            [
                "id" => 1,
                "name" => "Lima"
            ],
            [
                "id" => 2,
                "name" => "Huancayo"
            ],
            [
                "id" => 3,
                "name" => "Arequipa"
            ],
            [
                "id" => 4,
                "name" => "Piura"
            ],
            [
                "id" => 5,
                "name" => "Trujillo"
            ]
        );

        $response = array(
            "regiones" => $regiones,
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

        var_dump($response);

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
        
        /*
        $avg = DB::table('sueldos')->avg('sueldo');

        $labels = ["1200","1500","1800","2100","2400","2700"];
        $sueldos = [1400, 1700, 2000, 1600, 500, 200];

        $years = 1;
        $id = 1;

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

        $response2 = array(
            "labels" => $labels,
            "data" => $sueldos
        );

        return Response::json($response);
*/
    }

}