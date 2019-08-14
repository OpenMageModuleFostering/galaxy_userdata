<?php

class Galaxy_Userdata_Model_Mysql4_Userdata extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the userdata_id refers to the key field in your database table.
        $this->_init('userdata/userdata', 'userdata_id');
    }
}