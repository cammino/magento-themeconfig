<?php
class Cammino_Themeconfig_Helper_Data extends Mage_Core_Helper_Abstract
{
	public function getProductAttributesTab(){
		$attributes = Mage::getStoreConfig('themeconfig/themeconfig_group_product/themeconfig_attributes_tab');
		if($attributes != null){
			return explode(",", $attributes);
		}else{
			return false;
		}
	}

	public function getPhone($type, $indice){
		$phone = Mage::getStoreConfig('themeconfig/themeconfig_group_phones/themeconfig_'.$type.'_'.$indice);
		if($phone != null && strlen($phone) > 4){
			return array(
				'number' 	=> $phone,
				'type'		=> $type,
				'indice'	=> $indice
			);
		}else{
			return false;
		}
	}

	public function getTelephones(){
		$telephones = array();
		if($this->getPhone("telephone", "1")): $telephones[] = $this->getPhone("telephone", "1"); endif;
		if($this->getPhone("telephone", "2")): $telephones[] = $this->getPhone("telephone", "2"); endif;
		if($this->getPhone("cellphone", "1")): $telephones[] = $this->getPhone("cellphone", "1"); endif;
		if($this->getPhone("cellphone", "2")): $telephones[] = $this->getPhone("cellphone", "2"); endif;
		if($this->getPhone("whatsapp", "1")): $telephones[] = $this->getPhone("whatsapp", "1"); endif;
		if($this->getPhone("whatsapp", "2")): $telephones[] = $this->getPhone("whatsapp", "2"); endif;
		return $telephones;
	}
}