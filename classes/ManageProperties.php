<?php

/**
 * ManageProperties Abstract Class
 *
 * @author    Karen Martirosyan <info@powersoft.tv>
 * @copyright Copyright (c) 2014-2016
 * @version   1.0
 */

abstract class ManageProperties
{
    protected $_propertyType;

    public  function setPropertyType($property){
        $this->_propertyType=$property;
    }

    abstract protected function ListQuery($where);


    public function ListProperties($lang=array(), $name=array(), $prop_id=array()){
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
        if(count($prop_id)){
            foreach($prop_id as $v) {
                $where .= " AND t2.".$this->_propertyType."_id ='".$v."'";
            }
        }
        $query=$this->ListQuery($where);
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
                        $db = MysqliDb::getInstance();
                        $res=$db->insert($this->_propertyType,array('is_removed_from_list'=>0));
                        if($res){
                            $prop_id=$res;
                        }
                        else return false;
                        $data=array(
                            $this->_propertyType.'_id'=>$prop_id,
                            'language'=>$lang,
                            $this->_propertyType=>$name,
                            'description'=>$description,
                            'who_last_update'=>$who['user_id']
                        );
                        if($db->insert($this->_propertyType.'_data',$data)){
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

    public function SetProperties($lang, $id, $name, $description){
        if($who=Registry::getInstance()->getUser()) {
            if(isset($who['user_id']) && $who['user_id']) {
                $this_prop=$this->ListProperties(array($lang),array(), array($id));
                $db=MysqliDb::getInstance();
                if($this_prop){
                    $data=array(
                        $this->_propertyType=>$name,
                        'description'=>$description,
                        'who_last_update'=>$who['user_id']
                    );
                    if($db->where($this->_propertyType.'_id',$id)->where('language',$lang)->update($this->_propertyType.'_data',$data)){
                        return $name;
                    }
                    else return false;
                }
                else{
                    $data=array(
                        $this->_propertyType.'_id'=>$id,
                        'language'=>$lang,
                        $this->_propertyType=>$name,
                        'description'=>$description,
                        'who_last_update'=>$who['user_id']
                    );
                    if ($db->insert($this->_propertyType.'_data',$data)){
                        return true;
                    }
                    else return false;
                }

            }
            else return false;
        }
        else return false;
    }

}