<?php

class Galaxy_Userdata_Model_Userdata extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('userdata/userdata');
    }
}