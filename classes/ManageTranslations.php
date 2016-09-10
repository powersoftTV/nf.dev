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
                if($ff != '.' && $ff != '..' && $ff!='datatable' && $ff!='tinymce') {
                    if(is_dir($dir.'/'.$ff)) {
                        self::getAllFiles($dir.'/'.$ff, $dir);
                    }
                    else{
                        $f=explode('.',$ff);
                        $is_right_file=false;
                        foreach($f as $v){
                            if($v=='js' || $v=='php'){
                                $is_right_file=true;
                            }
                            if($v=='min' || $v=='xml' || $v=='Translate'){
                                $is_right_file=false;
                                break;
                            }
                        }
                        if($is_right_file) {
                            //$file=str_replace($root.'/',Registry::getInstance()->getRootFolder(),$dir . '/' . $ff);
                            $data = file_get_contents($dir . '/' . $ff);
                            $translate=new Translate();
                            $newtext=$translate->words($data);
                            if(isset($newtext) && $newtext) {
                                foreach ($newtext as $v) {
                                    self::$words[] = $v;
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