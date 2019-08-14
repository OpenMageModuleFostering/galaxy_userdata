<?php
class Galaxy_Userdata_Block_Userdata extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getUserdata()     
     { 
        if (!$this->hasData('userdata')) {
            $this->setData('userdata', Mage::registry('userdata'));
        }
        return $this->getData('userdata');
        
    }
}