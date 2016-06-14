<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/1/2016
 * Time: 1:48 PM
 */
class ManageProperties
{
    private $_propertyType;

        function __construct($property)
        {
            if(isset($property)){
                $this->setPropertyType($property);
            }
            else return false;
        }

    public  function setPropertyType($property){
        $this->_propertyType=$property;
    }


    public function ListProperties($lang=array(), $name=array()){
        $where="";
        if(count($lang)){
            foreach($lang as $v) {
                $where .= " AND t2.language='" . $v . "'";
            }
        }
        if(count($name)){
            foreach($name as $v) {
                $where .= " AND t2.".$this->_propertyType."='".$v."'";
            }
        }
        $query="
            SELECT
                  t2.".$this->_propertyType."_id
                , t2.".$this->_propertyType."
                , t2.description
                , t2.language
                , t2.who_last_update
                , t2.last_updated_date
                , t1.is_removed_from_list
                , t3.username
            FROM
                nf_".$this->_propertyType." t1
            LEFT JOIN
                nf_".$this->_propertyType."_data t2 ON t2.".$this->_propertyType."_id=t1.id
            LEFT JOIN
                nf_users t3 ON t2.who_last_update=t3.user_id
            WHERE
                true ".$where."
            ORDER BY
                t1.id DESC

        ";
        $prop=array();
        if($res=@mysqli_query(Registry::getInstance()->getDB(),$query)){
            while($_res=@mysqli_fetch_assoc($res)){
                $prop[]=$_res;
            }
        }
        else return false;
        return $prop;

    }
    public function AddProperty($name,$lang="",$description=""){
        if($who=Registry::getInstance()->getUser()) {
            if (isset($who['user_id']) && $who['user_id']) {
                if (isset($name) && $name != "") {
                    if ($lang == "") {
                        $l = Registry::getInstance()->getFrontLang();
                        if (isset($l[0])) {
                            $lang = $l[0];
                        }
                    }
                    $prop = $this->ListProperties(array($lang), array($name));
                    if (!$prop || !count($prop)) {
                        $query = "INSERT INTO nf_".$this->_propertyType." (is_removed_from_list) VALUES(0)";
                        if (@mysqli_query(Registry::getInstance()->getDB(), $query)) {
                            $prop_id = mysqli_insert_id(Registry::getInstance()->getDB());
                        }
                        else return false;
                        $query = "INSERT INTO nf_".$this->_propertyType ."_data (" . $this->_propertyType . "_id, language, " . $this->_propertyType . ", description,who_last_update) VALUES(" . $prop_id . ",'" . $lang . "','" . $name . "','" . $description . "'," . $who['user_id'] . ")";
                        if (@mysqli_query(Registry::getInstance()->getDB(), $query)) {
                            return "success";
                        }
                        else return false;
                    } else return false;

                } else return false;
            }
            else return false;
        }
        else return false;

    }

    public function GetProperties($lang, $id){
        $query="
            SELECT
                ".$this->_propertyType.",description
            FROM
                nf_".$this->_propertyType."_data
            WHERE
                ".$this->_propertyType."_id=".$id." AND language='".$lang."'
        ";
        $prop=array();
        if($res=@mysqli_query(Registry::getInstance()->getDB(),$query)){
            if($_res=@mysqli_fetch_assoc($res)){
                $prop=$_res;
            }
        }
        else return false;
        return $prop;
    }

    public function SetProperties($lang, $id, $name, $description){
        if($who=Registry::getInstance()->getUser()) {
            if(isset($who['user_id']) && $who['user_id']) {
                $query = "
                  INSERT INTO nf_" . $this->_propertyType . "_data (" . $this->_propertyType . "_id, language, " . $this->_propertyType . ", description,who_last_update) VALUES(" . $id . ",'" . $lang . "','" . $name . "','" . $description . "'," . $who['user_id'] . ")
                  ON DUPLICATE KEY UPDATE
                    " . $this->_propertyType . "='" . $name . "',description='" . $description . "',who_last_update=".$who['user_id']."

                    ";

                if ($res = @mysqli_query(Registry::getInstance()->getDB(), $query)) {
                    return true;
                }
                else return false;
            }
            else return false;
        }
        else return false;
    }

}