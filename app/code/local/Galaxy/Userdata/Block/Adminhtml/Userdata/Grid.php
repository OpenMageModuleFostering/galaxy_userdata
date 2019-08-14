<?php

class Galaxy_Userdata_Block_Adminhtml_Userdata_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
  public function __construct()
  {
      parent::__construct();
      $this->setId('userdataGrid');
      $this->setDefaultSort('userdata_id');
      $this->setDefaultDir('ASC');
      $this->setSaveParametersInSession(true);
  }

  protected function _prepareCollection()
  {
      $collection = Mage::getModel('userdata/userdata')->getCollection();
      $this->setCollection($collection);
      return parent::_prepareCollection();
  }

  protected function _prepareColumns()
  {
      $this->addColumn('userdata_id', array(
          'header'    => Mage::helper('userdata')->__('ID'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'userdata_id',
      ));

      $this->addColumn('firstname', array(
          'header'    => Mage::helper('userdata')->__('First Name'),
          'align'     =>'left',
          'index'     => 'firstname',
      ));

		
    
		 $this->addColumn('lastname', array(
          'header'    => Mage::helper('userdata')->__('Last Name'),
          'align'     =>'left',
          'index'     => 'lastname',
      ));

   $this->addColumn('email', array(
          'header'    => Mage::helper('userdata')->__('Email'),
          'align'     =>'left',
          'index'     => 'email',
      ));


     
   
        $this->addColumn('action',
            array(
                'header'    =>  Mage::helper('userdata')->__('Action'),
                'width'     => '100',
                'type'      => 'action',
                'getter'    => 'getId',
                'actions'   => array(
                    array(
                        'caption'   => Mage::helper('userdata')->__('Edit'),
                        'url'       => array('base'=> '*/*/edit'),
                        'field'     => 'id'
                    )
                ),
                'filter'    => false,
                'sortable'  => false,
                'index'     => 'stores',
                'is_system' => true,
        ));
  
    $this->addExportType('*/*/exportCsv', Mage::helper('userdata')->__('CSV'));
	$this->addExportType('*/*/exportXml', Mage::helper('userdata')->__('XML'));

  //$this->addExportType('*/*/exportCsv', Mage::helper('userdata')->__('CSV'));
 // $this->addExportType('*/*/exportXml', Mage::helper('userdata')->__('XML'));
   
      return parent::_prepareColumns();
  }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('userdata_id');
        $this->getMassactionBlock()->setFormFieldName('userdata');

        $this->getMassactionBlock()->addItem('delete', array(
             'label'    => Mage::helper('userdata')->__('Delete'),
             'url'      => $this->getUrl('*/*/massDelete'),
             'confirm'  => Mage::helper('userdata')->__('Are you sure?')
        ));

        $statuses = Mage::getSingleton('userdata/status')->getOptionArray();

        array_unshift($statuses, array('label'=>'', 'value'=>''));
        $this->getMassactionBlock()->addItem('status', array(
             'label'=> Mage::helper('userdata')->__('Change status'),
             'url'  => $this->getUrl('*/*/massStatus', array('_current'=>true)),
             'additional' => array(
                    'visibility' => array(
                         'name' => 'status',
                         'type' => 'select',
                         'class' => 'required-entry',
                         'label' => Mage::helper('userdata')->__('Status'),
                         'values' => $statuses
                     )
             )
        ));
        return $this;
    }

  public function getRowUrl($row)
  {
      return $this->getUrl('*/*/edit', array('id' => $row->getId()));
  }

}