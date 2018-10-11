<?php 

class Cammino_Themeconfig_Model_Source_Customer_Groups{
	public function toOptionArray() {
		Mage::log("passou pela model", null, 'andre.log');
		return Mage::helper('themeconfig')->getAllGroups();
	}
}
