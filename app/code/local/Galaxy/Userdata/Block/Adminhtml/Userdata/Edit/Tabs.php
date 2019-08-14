<?php

class Galaxy_Userdata_Block_Adminhtml_Userdata_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('userdata_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('userdata')->__('User Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('userdata')->__('User Information'),
          'title'     => Mage::helper('userdata')->__('User Information'),
          'content'   => $this->getLayout()->createBlock('userdata/adminhtml_userdata_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}