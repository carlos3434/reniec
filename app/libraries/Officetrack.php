<?php
/**
* 
*/
class Officetrack
{
    protected $_client;
    
    public function __construct() 
    {
        $wsdl ='http://latam.officetrack.com/services/TaskManagement.asmx?WSDL';

        $wsOptions = [
            "trace" => 1,
            "exception" => 0
        ];
        $opts = ['http' => ['protocol_version' => '1.0']];
        $wsOptions["stream_context"] = stream_context_create($opts);
        $this->_client = new \SoapClient($wsdl, $wsOptions);
    }
    public function envio($trama){
        $trama['Operation'] = "AutoSelect";
        $trama['UserName']  = 'telefoperu';
        $trama['Password']  = 'ae5thnji9';
        $trama['Status']    = "NewTask";
        $trama['Options']   = "SendNotificationToMobile";
        $trama["MaximalRadiusForEntries"] = 0.3;
        $trama["ProhibitEntriesOutsideRadius"] = '1';

        $cadena = json_encode($trama);
        $json = str_replace("&", "%26", $cadena);
        $object = json_decode($json);

        $xml = $this->arrayToXml($trama,'<CreateOrUpdateTaskRequest></CreateOrUpdateTaskRequest>');
        $result=[];
        try {
            $result = $this->_client->CreateOrUpdateTask(['Request' => $xml]);
        } catch (\SoapFault $fault) {
            //var_dump($fault->getMessage() );
            //var_dump($fault->faultcode  );
            //var_dump($fault->faultstring  );
            //var_dump($fault->detail );
        } catch (\Exception $error) {
            //var_dump($error->getMessage());
        }
        return $result;
    }

    private function arrayToXml($array, $rootElement = null, $xml = null)
    {
        $_xml = $xml;

        if ($_xml === null) {
            $_xml = new SimpleXMLElement($rootElement !== null ? $rootElement : '<root><root/>');
        }

        foreach ($array as $k => $v) {
            if (is_array($v)) { //nested array
                $this->arrayToXml($v, $k, $_xml->addChild($k));
            } elseif (is_object($v)) {
                $this->arrayToXml((array)$v, $k, $_xml->addChild($k));
            } else {
                $_xml->addChild($k, $v);
            }
        }
        return $_xml->asXML();
    }
}