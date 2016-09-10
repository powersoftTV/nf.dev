<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 7/9/2016
 * Time: 2:33 PM
 */
class EditCSV
{
    protected $_delimiter;

    public function __construct($delimiter=',')
    {
        $this->setDelimiter($delimiter);
    }
    protected function setDelimiter($delimiter){
        $this->_delimiter=$delimiter;
    }
    public function csv_to_array($filename="")
    {
        $delimiter=$this->_delimiter;
        $data = array();
        if (($handle = @fopen($filename, 'r',true)) !== FALSE)
        {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
            {
               if(isset($row[0]) && $row[0] && isset($row[1]) && $row[1]) {
                   $data[$row[0]] = $row[1];
               }
            }
            fclose($handle);
        }
        else return false;
        return $data;
    }
    public function convert_to_csv($input, $output_file_name)
    {
        if(!$input) {
            return FALSE;
        }
        if(!$f = @fopen($output_file_name, 'a',true)){
            return false;
        }
       // fwrite($f,PHP_EOL);
        foreach($input as $k=>$v) {
            fputcsv($f, $v ,$this->_delimiter);
        }
        fclose($f);
        return true;
    }

}