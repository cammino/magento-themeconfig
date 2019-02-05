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

	public function getMail($indice){
		$email = Mage::getStoreConfig('themeconfig/themeconfig_group_mails/themeconfig_mail_' . $indice);
		if ($email != null){
			return array(
				'email' 	=> $email,
				'indice'	=> $indice
			);
		}else{
			return false;
		}
	}

	public function getTelephone(){
		$telephones = array();
		if($this->getPhone("telephone", "1")): $telephones[] = $this->getPhone("telephone", "1"); endif;
		return $telephones;
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

	public function getMails(){
		$emails = array();
		if($this->getMail("1")): $emails[] = $this->getMail("1"); endif;
		if($this->getMail("2")): $emails[] = $this->getMail("2"); endif;
		return $emails;
	}

	public function getSocialMedias(){
		$medias = array();
		if($this->hasFacebook()): $medias[] = $this->getFacebook(); endif;
		if($this->hasInstagram()): $medias[] = $this->getInstagram(); endif;
		if($this->hasTwitter()): $medias[] = $this->getTwitter(); endif;
		if($this->hasYoutube()): $medias[] = $this->getYoutube(); endif;
		return $medias;
	}

	public function getFacebook(){
		return array(
			"url" => Mage::getStoreConfig('themeconfig/themeconfig_group_social_media/facebook'),
			"slug" => "facebook",
			"label" => "Facebook",
		);
	}

	public function getInstagram(){
		return array(
			"url" => Mage::getStoreConfig('themeconfig/themeconfig_group_social_media/instagram'),
			"slug" => "instagram",
			"label" => "Instagram",
		);
	}

	public function getTwitter(){
		return array(
			"url" => Mage::getStoreConfig('themeconfig/themeconfig_group_social_media/twitter'),
			"slug" => "twitter",
			"label" => "Twitter",
		);
	}

	public function getYoutube(){
		return array(
			"url" => Mage::getStoreConfig('themeconfig/themeconfig_group_social_media/youtube'),
			"slug" => "youtube",
			"label" => "Youtube",
		);
	}

	public function hasFacebook(){
		$facebook = Mage::getStoreConfig('themeconfig/themeconfig_group_social_media/facebook');
		return strlen($facebook) > 3;
	}

	public function hasInstagram(){
		$instagram = Mage::getStoreConfig('themeconfig/themeconfig_group_social_media/instagram');
		return strlen($instagram) > 3;
	}

	public function hasTwitter(){
		$twitter = Mage::getStoreConfig('themeconfig/themeconfig_group_social_media/twitter');
		return strlen($twitter) > 3;
	}

	public function hasYoutube(){
		$youtube = Mage::getStoreConfig('themeconfig/themeconfig_group_social_media/youtube');
		return strlen($youtube) > 3;
	}
}