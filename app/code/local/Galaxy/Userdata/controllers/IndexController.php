<?php
class Galaxy_Userdata_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
			
		$this->loadLayout();     
		$this->renderLayout();
    }
	public function getvalAction()
	{
		$postData = Mage::app()->getRequest()->getPost();
		
		$key = array_keys($postData);
		$val = array_values($postData);
		
		$id =  Mage::getSingleton('core/session')->getUniqueId();
		
		if($id!="")
		{
			
			
			$data = array('UID'=>$id,$key[0]=>$val[0]);
			$model = Mage::getModel('userdata/userdata')->load($id,'UID')->addData($data);
			try {
						$model->save();
						} catch (Exception $e){
						echo $e->getMessage();
				}
		}else
		{
			
			$uid= time();
			Mage::getSingleton('core/session')->setUniqueId($uid);
			$data = array('UID'=>$uid,$key[0]=>$val[0]);
			$model = Mage::getModel('userdata/userdata')->setData($data);
			try {
        			    $model->save();
						
				} catch (Exception $e){
					 echo $e->getMessage();  
				}
			
		}	
	}
}