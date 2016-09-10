<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 7/9/2016
 * Time: 10:53 AM
 */
class Translate extends EditCSV
{
    protected  $_folder_path;
    protected  $_lang;
    protected  $learn_words=array();


    public  function __construct($folder_path="/",$lang="en",$delimiter=',')
    {
        $this->setPath($folder_path);
        $this->setLang($lang);
        parent::__construct($delimiter);
    }
    protected function setPath($folder_path){
        $this->_folder_path=$folder_path;
    }
    protected function setLang($lang){
        $this->_lang=$lang;
    }
    public function t($txt){
        $pattern_a = "/!!!_(.*?)_!!!/";
        return preg_replace_callback($pattern_a, function ($matches) {
            $words=str_replace('!!!_', '', $matches[0]);
            $words=str_replace('_!!!', '', $words);
            $this->learn_words[]=$words;
            if($this->_lang=='en') {
                return $words;
            }
            else{
                return $this::translate($words);
            }
        }, $txt);
    }
    public function words($txt){
        $pattern_a = "/!!!_(.*?)_!!!/";
        preg_match_all($pattern_a,$txt,$matches);
        if($matches[0]) {
            return $matches[0];
        }

    }
    protected function yandexTranslate($txt, $lang, $key){
        $url="https://translate.yandex.net/api/v1.5/tr.json/translate?key=".$key."&text=".urlencode($txt)."&lang=en-".$lang;
        $output = file_get_contents($url);
        if($output) {
            $response = json_decode($output);
            return $response->text[0];
        }
        return $txt;
    }
    public function translationFile(){
        $words = $this->csv_to_array($this->_folder_path ."translations/". $this->_lang . '.csv');
        return $words;
    }
    public function getWords($key){
        $translated_words=array();
        $all_words=array_unique($this->learn_words);
        if ($words = $this->csv_to_array($this->_folder_path . $this->_lang . '_learned.csv')) {
            foreach($all_words as $k=>$v){
                if(!isset($words[$v])){
                    $translated_words[]=[$v,$this->yandexTranslate($v, $this->_lang, $key)];
                }
            }
        }
        else {
            foreach ($all_words as $k => $v) {
                $translated_words[]=[$v,$this->yandexTranslate($v, $this->_lang, $key)];
            }
        }
        $this->convert_to_csv($translated_words,$this->_folder_path . $this->_lang . '_learned.csv');
     }

    protected function translate($txt){
        if ($words = $this->csv_to_array($this->_folder_path . $this->_lang . '.csv')) {
                if (isset($words[$txt]) && $words[$txt]) {
                    return $words[$txt];
                }
            }
        return $txt;
    }


}