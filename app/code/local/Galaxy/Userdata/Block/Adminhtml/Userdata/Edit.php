<?php

class Galaxy_Userdata_Block_Adminhtml_Userdata_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'userdata';
        $this->_controller = 'adminhtml_userdata';
        
        $this->_updateButton('save', 'label', Mage::helper('userdata')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('userdata')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('userdata_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'userdata_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'userdata_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('userdata_data') && Mage::registry('userdata_data')->getId() ) {
            return Mage::helper('userdata')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('userdata_data')->getEmail()));
        } else {
            return Mage::helper('userdata')->__('Add User');
        }
    }
}