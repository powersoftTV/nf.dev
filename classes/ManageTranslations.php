<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 9/3/2016
 * Time: 1:45 PM
 */
class ManageTranslations
{
    protected static $words=array();
    protected static $allowed_ext = array(
        'js',
        'php'
    );
    protected static $disallowed_ext = array(
        'min',
        'xml',
        'jpg',
        'gif',
        'png'
    );
    protected static $excluded_names = array(
        'datatable',
        'tinymce',
        'Translate.php'
    );
    public static function get_csv_files_list($path){
        $list_dirs=scandir($path);
        $files=[];
        foreach($list_dirs as $v){
            $info=pathinfo($path."/".$v);
            if($info['extension']=='csv'){
                $files[]=$v;
            }
        }
        return $files;
    }
    private static function getAllFiles($dir,$root='') {

            if(!$root){
                $root=$dir;
            }
            $ffs = scandir($dir);
            foreach($ffs as $ff) {
                if($ff != '.' && $ff != '..' && !in_array($ff,self::$excluded_names)) {
                    if(is_dir($dir.'/'.$ff)) {
                        self::getAllFiles($dir.'/'.$ff, $dir);
                    }
                    else{
                        $f=explode('.',$ff);
                        $is_right_file=false;
                        foreach($f as $v){
                            $v=strtolower($v);
                            if(in_array($v,self::$allowed_ext)){
                                $is_right_file=true;
                            }
                            if(in_array($v,self::$disallowed_ext)){
                                $is_right_file=false;
                                break;
                            }
                        }
                        if($is_right_file) {
                            $data = file_get_contents($dir . '/' . $ff);
                            $translate=new Translate();
                            $newtext=$translate->words($data);
                            if(isset($newtext) && $newtext) {
                                foreach ($newtext as $v) {
                                    self::$words[] = $translate->removeExclam($v);
                                }
                            }
                        }
                    }
                }

            }

    }
    public static function getAllWords(){
        self::getAllFiles($_SERVER['DOCUMENT_ROOT']);
        return array_unique(self::$words);
    }

}