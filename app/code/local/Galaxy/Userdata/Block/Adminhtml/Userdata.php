<?php
class Galaxy_Userdata_Block_Adminhtml_Userdata extends Mage_Adminhtml_Block_Widget_Grid_Container
{
	 public function __construct()
  {
    $this->_controller = 'adminhtml_Userdata';
    $this->_blockGroup = 'userdata';
    $this->_headerText = Mage::helper('userdata')->__('User Data');
    $this->_addButtonLabel = Mage::helper('userdata')->__('Add User');
	
	/*///////CUSTOM code for new button:
       $data = array(
               'label' =>  'Send Email Notifications',
               'onclick'   => "setLocation('".$this->getUrl('userdata/adminhtml_index/sendnotifications')."')"
               );
			   
			   
       ///////The URL I am using is a custom module that I set up earlier, Magento parses it to <MySite.com/shop/index.php/downloadtomas>, which then runs the script I have in the IndexController.php file
       Mage_Adminhtml_Block_Widget_Container::addButton('sendnotifications', $data, 0, 100,  'header', 'header');
       ///////End CUSTOM code*/
	   
	
	   
    parent::__construct();
  }
}
