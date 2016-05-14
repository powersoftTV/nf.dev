<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/8/2016
 * Time: 10:45 AM
 */
class Registry
{
    protected static $instance;
    protected $_lang = array();
    protected $_frontlang = array();
    protected $_MV;
    protected function __construct()
    {
    }
    protected function __clone()
    {
    }
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new Registry();
        }
        return self::$instance;
    }
    public function setDB($MV)
    {
        if (isset($this->_MV)) {
            throw new RuntimeException('Main database has already been set.');
        }
        else {
            $this->_MV = $MV;
        }
    }
    public function getDB()
    {
        if (isset($this->_MV)) {
            return $this->_MV;
        }
        throw new RuntimeException ('Main database resource not found in the registry');
    }
    public function setLang($lang)
    {
        if (count($this->_lang)) {
            throw new RuntimeException('Language has already been set.');
        }
        else {
            $this->_lang = $lang;
        }
    }
    public function getLang()
    {
        if (isset($this->_lang)) {
            return $this->_lang;
        }
        throw new RuntimeException ('Language resource not found in the registry');
    }
    public function setFrontLang($frontlang)
    {
        if (count($this->_frontlang)) {
            throw new RuntimeException('Front Language has already been set.');
        }
        else {
            $this->_lang = $frontlang;
        }
    }
    public function getFrontLang()
    {
        if (isset($this->_frontlanglang)) {
            return $this->_frontlang;
        }
        throw new RuntimeException ('Front Language resource not found in the registry');
    }
}