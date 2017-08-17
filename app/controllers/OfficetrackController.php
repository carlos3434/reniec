<?php
class OfficetrackController extends \BaseController
{
    public function getServer()
    {
        $forms = trim(Input::get('forms'));
        try {
            if ($this->is_valid_xml($forms) === false) {
                //DB::insert($sql, $arrayVal);
                return 'Cadena XML no valida.';
            }
        } catch (Exception $exc) {
            return  "_OK_";
            //Registrar error
            //$this->error->saveError($exc);
        }
        $formObj = simplexml_load_string($forms);
        $form =[
            'Form'              =>      $formObj->Form->Name,                   //0001-Inicio
            'Version'           =>      $formObj->Form->Version,                //23 53
            'Fields'            =>      $formObj->Form->Fields,                 //23 53

            'EntryDate'         =>      $formObj->EntryDate,                    //10082017132715
            'Data'              =>      $formObj->Data,                         //
            'EventDate'         =>      $formObj->EventDate,                    //10082017132718
            'EntryType'         =>      $formObj->EntryType,                    //34
            'EntrySource'       =>      $formObj->EntrySource,                  //4

            'X'                 =>      $formObj->EntryLocation->X,             //-77.0200653076172
            'Y'                 =>      $formObj->EntryLocation->Y,             //-11.9959096908569
            'Address'           =>      $formObj->EntryLocation->Address,       //8.4 Km North East of Callao, Peru
            'MSISDN'            =>      $formObj->EntryLocation->MSISDN,        //+5112968818954
            'Date'              =>      $formObj->EntryLocation->Date,          //10082017084808
            'DateAge'           =>      $formObj->EntryLocation->DateAge,       //-335
            'DateFromEpoch'     =>      $formObj->EntryLocation->DateFromEpoch, //1502390087000

            'TaskNumber'        =>      $formObj->Task->TaskNumber,             //418098
            'Status'            =>      $formObj->Task->Status,                 //256
            'Description'       =>      $formObj->Task->Description,            //418098-49023375
            'CustomerName'      =>      $formObj->Task->CustomerName,           //16:00 - 18:00 / MODESTOPARIAHUNCA 
            'Data2'             =>      $formObj->Task->Data2,                  //
            'Data3'             =>      $formObj->Task->Data3,                  //
            'Data4'             =>      $formObj->Task->Data4,                  //
            'Data6'             =>      $formObj->Task->Data6,                  //
            'Data7'             =>      $formObj->Task->Data7,                  //
            'Data8'             =>      $formObj->Task->Data8,                  //
            'Data9'             =>      $formObj->Task->Data9,                  //
            'Data10'            =>      $formObj->Task->Data10,                 //
            'Data11'            =>      $formObj->Task->Data11,                 //
            'Data13'            =>      $formObj->Task->Data13,                 //
            'Data14'            =>      $formObj->Task->Data14,                 //
            'Data15'            =>      $formObj->Task->Data15,                 //
            'Data16'            =>      $formObj->Task->Data16,                 //
            'Data17'            =>      $formObj->Task->Data17,                 //
            'Data19'            =>      $formObj->Task->Data19,                 //
            'Data21'            =>      $formObj->Task->Data21,                 //
            'Data23'            =>      $formObj->Task->Data23,                 //
            'Data24'            =>      $formObj->Task->Data24,                 //
            'Data25'            =>      $formObj->Task->Data25,                 //
            'Data28'            =>      $formObj->Task->Data28,                 //
            'Data30'            =>      $formObj->Task->Data30,                 //
            'StartDate'         =>      $formObj->Task->StartDate,              //
            'StartDateAge'      =>      $formObj->Task->StartDateAge,           //

            'FirstName'         =>      $formObj->Employee->FirstName,          //STUMPF JARA
            'LastName'          =>      $formObj->Employee->LastName,           //STUMPF JARA
            'EmployeeNumber'    =>      $formObj->Employee->EmployeeNumber,     //LA2508
            'GroupName'              =>      $formObj->Employee->Group->Name,   //Grupo_Cobra_Criticos'

            //'Files->File'       =>      $formObj->Files->File->Guid,          //b3c3353d-46a9-4709-a7e1-55730b26c174
            //'Files->File'       =>      $formObj->Files->File->Filename,   //2d14a70d-0d2b-464e-ab81-2ab2fbf3f7e0_0.jpg
            //'Files->File'       =>      $formObj->Files->File->Id,             //Casa  Trabajo Final
            //'Files->File'       =>      $formObj->Files->File->Data,             //base64
        ];
        //filtrar solo 667
        if ($form['EmployeeNumber']!='667') {//cel de test
            return  "_OK_";
        }

        if ( isset($formObj->Form->Fields) &&
            isset($formObj->Form->Fields->Field) &&
            isset($formObj->Form->Fields->Field->Id) &&
            $formObj->Form->Fields->Field->Id=='Ubicación actual' ){

            $coord = $formObj->Form->Fields->Field->Value;
            list($y,$x) = explode(",", $coord );
            $form['Y'] = $y;
            $form['X'] = $x;
        }
        //buscar id de tarea
        $mov = Movimiento::where('TaskNumber',$form['TaskNumber'])->first();
        if (is_null($mov)) {
            echo "OK";
            $form['movimiento_id']=1;
            Formulario::create($form);
            return  "_OK_";
        }
        $form['movimiento_id']=$mov->id;
        $formulario = Formulario::create($form);
        if ($formulario) {
            //imagenes
            $dir = 'img/test/';
            if (count($formObj->Files->File)>0 ) {
                $imagenes =[];
                foreach ($formObj->Files->File as $value) {
                    $nombreImagen = $formObj->Task->TaskNumber.'_'.str_replace(' ', '', $value->Id).'.jpg';
                    $ifp = fopen($dir.$nombreImagen, "w+");
                    fwrite($ifp, base64_decode($value->Data));
                    fclose($ifp);
                    $imagen =[
                        'url' => $nombreImagen
                    ];
                    $imagenes[]=new Imagen($imagen);
                }
            $formulario->imagenes()->saveMany($imagenes);
            }
        }
        if (isset($formObj->Form->Fields->Field) ) {
            $fields=[];
            foreach ($formObj->Form->Fields->Field as $key => $value) {
                $value = get_object_vars($value);
                $fields[ ]  = $value;
                /*$fields2=[];
                foreach ( $value  as  $val) {
                     $fields2[] = $val;
                }
                Log::info($fields2);*/
            }
            //Log::info($fields);
        }
        
        
        return  "_OK_";
    }
    public function getEnvio(){
        //vencimiento
        $dueDate = date("YmdHis", strtotime("2017-08-10 23:59:59"));

        $trama['TaskNumber'] = '123456';
        $trama['EmployeeNumber'] = '667';
        $trama['DueDateAsYYYYMMDDHHMMSS'] = $dueDate;
        $trama['Duration'] = 0.75;
        $trama['Notes'] = "";
        $trama['Description']='417908-49020472';

        $trama['CustomerName'] = '/ DELGADO DE LA FLOR DE PIEROLA, MONICA CECILIA';
        $trama['Location'] = [
            "East"      => '-76.9815876',//lng X
            "North"     => '-12.0775882',//lat Y
            "Address"   => 'AV LA MERCED 625 UR UR MONTAGNE, Piso: 1 Int: 102 Mzn:  Lt: '
        ];
       // $trama['Data2'] = 'TEST0007';//'49020472';
       // $trama['Data3'] = '2017-08-10 09:44:48';
       // $trama['Data4'] = 'NO';
       // $trama['Data6'] = 'Averia - RR|I128';
       // $trama['Data7'] = '32136299';
       // $trama['Data8'] = 'HI|R010';
       // $trama['Data9'] = null;
       // $trama['Data10'] = '999879281';
       // $trama['Data11'] = 'HI';
       // $trama['Data12'] = '';
       // $trama['Data13'] = '16';
       // $trama['Data14'] = '0';
       // $trama['Data15'] = 'LIM';
       // $trama['Data16'] = '0';
       // $trama['Data17'] = 'POST_DIGIT';
       // $trama['Data18'] = 'CRITICOS';
       // $trama['Data19'] = 'SANTIAGO DE SURCO';
       // $trama['Data20'] = '';
       // $trama['Data21'] = '999879281';
       // $trama['Data22'] = 'EN CAMPO';
       // $trama['Data23'] = 'link de mapa';
       // $trama['Data24'] = 'link de mapa';
       // $trama['Data25'] = '5';
       // $trama['Data26'] = 'PROBLEMA NAVEGACION';
       // $trama['Data28'] = 'se repone 2 decos desaparecidos un HD y un digital mas tarjetas atendio //titular dni 07867178obs no se recupera equipos de baja';
       // $trama['Data29'] = 'MOVISTAR SPEEDY 8M';
        //$trama['Data30'] = $componente;

        $ot = new Officetrack;
        $response = $ot->envio($trama);
        if($response->CreateOrUpdateTaskResult=='OK'){
            var_dump($response);
        }
    }
    private function is_valid_xml($xml)
    {
        libxml_use_internal_errors(true);
        $doc = new \DOMDocument('1.0', 'utf-8');
        $doc->loadXML($xml);
        $errors = libxml_get_errors();
        return empty($errors);
    }
}