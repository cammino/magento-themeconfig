<?php
class Cammino_Themeconfig_Helper_Data extends Mage_Core_Helper_Abstract {

	/**
	* A função é usada para montar o bloco de informações do produto (tabs) na página de detalhes do produto
	* @return array nome dos atributos do produto
	*/
	public function getProductAttributesTab() {
		$attributes = Mage::getStoreConfig('themeconfig/themeconfig_group_product/themeconfig_attributes_tab');
		if($attributes != null) {
			return explode(",", $attributes);
		} else {
			return false;
		}
	}

	/**
	* Retorna as informações de um telefone
	* @param string slug (telephone, cellphone, whatsapp) de qual telefone será exibido
	* @param int indice (1 ou 2) do telefone
	* @return array com informações (número, tipo e indice) de um telefone específico
	*/
	public function getPhone($type, $indice){
		$phone = Mage::getStoreConfig('themeconfig/themeconfig_group_phones/themeconfig_'.$type.'_'.$indice);
		if($phone != null && strlen($phone) > 4){
			$x = array(
				'number' 	=> $phone,
				'type'		=> $type,
				'indice'	=> $indice
			);
		}else{
			return false;
		}
	}

	/**
	* Retorna as informações de um email
	* @param int indice (1 ou 2) do email
	* @return array com informações (email, indice) de um email
	*/
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

	/**
	* Pode ser usado em qualque lugar que precise mostrar os telefones da loja
	* @return array com as informações de todos os telefones cadastrados
	*/
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

	/**
	* Pode ser usado em qualque lugar que precise mostrar os emails da loja
	* @return array com as informações de todos os emails cadastrados
	*/
	public function getMails(){
		$emails = array();
		if($this->getMail("1")): $emails[] = $this->getMail("1"); endif;
		if($this->getMail("2")): $emails[] = $this->getMail("2"); endif;
		return $emails;
	}

	/**
	* Pode ser usado em qualque lugar que precise mostrar as redes sociais da loja
	* @return array com as informações de todas as redes sociais cadastradas
	*/
	public function getSocialMedias(){
		$medias = array();
		if($this->hasFacebook()): $medias[] = $this->getFacebook(); endif;
		if($this->hasInstagram()): $medias[] = $this->getInstagram(); endif;
		if($this->hasTwitter()): $medias[] = $this->getTwitter(); endif;
		if($this->hasYoutube()): $medias[] = $this->getYoutube(); endif;
		if($this->hasLinkedin()): $medias[] = $this->getLinkedin(); endif;
		return $medias;
	}

	/**
	* Pega as informações do Facebook
	* @return array com as informações (url, slug, label) cadastradas do facebook
	*/
	public function getFacebook(){
		return array(
			"url" => Mage::getStoreConfig('themeconfig/themeconfig_group_social_media/facebook'),
			"slug" => "facebook",
			"label" => "Facebook",
		);
	}

	/**
	* Pega as informações do Instagram
	* @return array com as informações (url, slug, label) cadastradas do instagram
	*/
	public function getInstagram(){
		return array(
			"url" => Mage::getStoreConfig('themeconfig/themeconfig_group_social_media/instagram'),
			"slug" => "instagram",
			"label" => "Instagram",
		);
	}

	/**
	* Pega as informações do Twitter
	* @return array com as informações (url, slug, label) cadastradas do twitter
	*/
	public function getTwitter(){
		return array(
			"url" => Mage::getStoreConfig('themeconfig/themeconfig_group_social_media/twitter'),
			"slug" => "twitter",
			"label" => "Twitter",
		);
	}

	/**
	* Pega as informações do Youtube
	* @return array com as informações (url, slug, label) cadastradas do youtube
	*/
	public function getYoutube(){
		return array(
			"url" => Mage::getStoreConfig('themeconfig/themeconfig_group_social_media/youtube'),
			"slug" => "youtube",
			"label" => "Youtube",
		);
	}

	/**
	* Pega as informações do Linkedin
	* @return array com as informações (url, slug, label) cadastradas do linkedin
	*/
	public function getLinkedin(){
		return array(
			"url" => Mage::getStoreConfig('themeconfig/themeconfig_group_social_media/linkedin'),
			"slug" => "linkedin",
			"label" => "Linkedin",
		);
	}

	/**
	* Verifica se tem informações do Facebook cadastradas na loja
	* @return boolean se esta cadastrado ou não
	*/
	public function hasFacebook(){
		$facebook = Mage::getStoreConfig('themeconfig/themeconfig_group_social_media/facebook');
		return strlen($facebook) > 3;
	}

	/**
	* Verifica se tem informações do Instagram cadastradas na loja
	* @return boolean se esta cadastrado ou não
	*/
	public function hasInstagram(){
		$instagram = Mage::getStoreConfig('themeconfig/themeconfig_group_social_media/instagram');
		return strlen($instagram) > 3;
	}

	/**
	* Verifica se tem informações do Twitter cadastradas na loja
	* @return boolean se esta cadastrado ou não
	*/
	public function hasTwitter(){
		$twitter = Mage::getStoreConfig('themeconfig/themeconfig_group_social_media/twitter');
		return strlen($twitter) > 3;
	}

	/**
	* Verifica se tem informações do Youtube cadastradas na loja
	* @return boolean se esta cadastrado ou não
	*/
	public function hasYoutube(){
		$youtube = Mage::getStoreConfig('themeconfig/themeconfig_group_social_media/youtube');
		return strlen($youtube) > 3;
	}

	/**
	* Verifica se tem informações do Linkedin cadastradas na loja
	* @return boolean se esta cadastrado ou não
	*/
	public function hasLinkedin(){
		$linkedin = Mage::getStoreConfig('themeconfig/themeconfig_group_social_media/linkedin');
		return strlen($linkedin) > 3;
	}
}