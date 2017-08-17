<?php
class Helpers{
    
    /**
     * Exportar un array a Excel
     * @param type $array string
     * @param type $text string
     * @return type csv
     */
    public static function exportArrayToExcel($reporte, $fileName,$excluir=[])
    {
      $table = '';
        if (count($reporte)>0) {
            $filename = Helpers::convert_to_file_excel($fileName);
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename='.$filename);
            header('Expires: 0');
            header(
                'Cache-Control: must-revalidate, post-check=0, pre-check=0'
            );
            header("Content-Transfer-Encoding: binary");
            header('Pragma: public');

            $n = 1;
            foreach ($reporte as $data) {
                //Encabezado
                if ($n == 1) {
                    foreach ($data as $key=>$val) {
                        if(!in_array($key, $excluir)){
                          echo $key . "\t";                          
                        }
                    }
                    echo "\r\n";
                }
                //Datos
                foreach ($data as $ky => $val) {
                    if(!in_array($ky, $excluir)){
                      $val = str_replace(
                          array("\r\n", "\n", "\n\n", "\t", "\r"),
                          array("", "", "", "", ""),
                          $val
                      );
                      echo $val . "\t";
                    }
                }
                echo "\r\n";
                $n++;
            }
        } else {
            return Response::json(
                array(
                    'rst'=>1,
                    'datos'=>$table
                )
            );
        }
    }
}