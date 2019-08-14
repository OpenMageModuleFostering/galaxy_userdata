<?php

class Galaxy_Userdata_Block_Adminhtml_Userdata_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('userdata_form', array('legend'=>Mage::helper('userdata')->__('User information')));
     
      $fieldset->addField('firstname', 'text', array(
          'label'     => Mage::helper('userdata')->__('First Name'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'firstname',
      ));

      $fieldset->addField('lastname', 'text', array(
          'label'     => Mage::helper('userdata')->__('Last Name'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'lastname',
      ));
	  
	   $fieldset->addField('email', 'text', array(
          'label'     => Mage::helper('userdata')->__('Email'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'email',
      ));
     
      if ( Mage::getSingleton('adminhtml/session')->getUserdataData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getUserdataData());
          Mage::getSingleton('adminhtml/session')->setUserdataData(null);
      } elseif ( Mage::registry('userdata_data') ) {
          $form->setValues(Mage::registry('userdata_data')->getData());
      }
      return parent::_prepareForm();
  }
}