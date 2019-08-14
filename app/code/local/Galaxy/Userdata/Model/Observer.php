<?php

class Galaxy_Userdata_Model_Observer
{
	 public function checkout_type_onepage_save_order_after(Varien_Event_Observer $observer)
    {
   				 $id =  Mage::getSingleton('core/session')->getUniqueId();
				
				 $model = Mage::getModel('userdata/userdata')->load($id,'UID');
				 $model->delete();
				 Mage::getSingleton('core/session')->unsUniqueId();
    }				 
}