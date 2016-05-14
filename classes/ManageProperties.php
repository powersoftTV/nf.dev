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
                $where .= " AND t1.language='" . $v . "'";
            }
        }
        if(count($name)){
            foreach($name as $v) {
                $where .= " AND t1.".$this->_propertyType."='".$v."'";
            }
        }
        $query="
            SELECT
                t1.".$this->_propertyType."_id, t1.".$this->_propertyType.",t1.description, t1.language, t2.is_removed_from_list
            FROM
                nf_".$this->_propertyType."_data t1
            LEFT JOIN
                nf_".$this->_propertyType." t2 ON t1.".$this->_propertyType."_id=t2.id
            WHERE
                true ".$where."
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
    public function AddProperty($name,$description="",$who="",$prop_id=0,$lang=""){
        if(isset($name) && $name!="") {
            if ($lang == "") {
                $l = Registry::getInstance()->getFrontLang();
                if (isset($l[0])) {
                    $lang = $l[0];
                }
            }

            if ((!$prop = $this->ListProperties(array($name), array($lang))) || !count($prop)) {
                if(!$prop_id) {
                    $query = "
                      INSERT INTO nf_" . $this->_propertyType . " (is_removed_from_list) VALUES(0)
                    ";
                    if (@mysqli_query(Registry::getInstance()->getDB(), $query)) {
                        $prop_id = mysqli_insert_id(Registry::getInstance()->getDB());
                    }
                    else return false;
                }

                $query="
                    INSERT INTO nf_" . $this->_propertyType . "_data (".$this->_propertyType."_id, language, ".$this->_propertyType.", description,who_last_update) VALUES(".$prop_id.",'".$lang."','".$name."','".$description."',".$who.")
                ";

                if (@mysqli_query(Registry::getInstance()->getDB(), $query)){
                    return "success";
                }
                else return false;
            }
            else return false;

        }
        else return false;

    }

}