<?php

/**
 * Categories Class
 *
 * @author    Karen Martirosyan <info@powersoft.tv>
 * @copyright Copyright (c) 2014-2016
 * @version   1.0
 */

class Categories extends ManageProperties 
{

   function __construct()
        {
         $this->setPropertyType('category');
        }

    protected function ListQuery($where){
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
        return $query;
    }



}