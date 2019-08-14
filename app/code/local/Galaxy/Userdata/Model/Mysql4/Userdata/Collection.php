<?php

class Galaxy_Userdata_Model_Mysql4_Userdata_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('userdata/userdata');
    }
}