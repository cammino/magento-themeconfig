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

			return $x;
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


	/**
	* Retorna o ID do estado para salvar nas configurações de Origem de Envio no admin
	* @param string UF
	* @return string ID correspondente ao UF
	*/
	public function getUfIdForShippingOrigin($uf){
		switch ($uf) {
			case "AC": return "485"; break;
			case "AL": return "486"; break;
			case "AP": return "487"; break;
			case "AM": return "488"; break;
			case "BA": return "489"; break;
			case "CE": return "490"; break;
			case "DF": return "511"; break;
			case "ES": return "491"; break;
			case "GO": return "492"; break;
			case "MA": return "493"; break;
			case "MT": return "494"; break;
			case "MS": return "495"; break;
			case "MG": return "496"; break;
			case "PA": return "497"; break;
			case "PB": return "498"; break;
			case "PR": return "499"; break;
			case "PE": return "500"; break;
			case "PI": return "501"; break;
			case "RJ": return "502"; break;
			case "RN": return "503"; break;
			case "RS": return "504"; break;
			case "RO": return "505"; break;
			case "RR": return "506"; break;
			case "SC": return "507"; break;
			case "SP": return "508"; break;
			case "SE": return "509"; break;
			case "TO": return "510"; break;
			case "default": return ""; break;
		}
	}

	function getAllGroups() {
		$groupsArray = Mage::getModel('customer/group')
        ->getCollection()
        ->load()
        ->toArray();
 
        foreach ($groupsArray['items'] as $groupId => $group) {
        	if (isset($group['customer_group_id'])) {
                
                $groupName = $group['customer_group_code'];
                $groups[] = array(
                    'value' => $groupId,
                    'label' => $groupName
                );
            }
        }

        return $groups;
	}

	/**
	* Pega as informações de endereço da Loja
	* @return array com as informações (slug, label) cadastradas do CNPJ
	*/
	public function getAddress(){
		return $infos = array(
			"storename" => Mage::getStoreConfig('themeconfig/themeconfig_store_basic_info/themeconfig_storename'),
			"cnpj" => Mage::getStoreConfig('themeconfig/themeconfig_store_basic_info/themeconfig_cnpj'),
			"street" => Mage::getStoreConfig('themeconfig/themeconfig_store_basic_info/themeconfig_address_street'),
			"number" => Mage::getStoreConfig('themeconfig/themeconfig_store_basic_info/themeconfig_address_number'),
			"complement" => Mage::getStoreConfig('themeconfig/themeconfig_store_basic_info/themeconfig_address_complement'),
			"neighborhood" => Mage::getStoreConfig('themeconfig/themeconfig_store_basic_info/themeconfig_address_neighborhood'),
			"zipcode" => Mage::getStoreConfig('themeconfig/themeconfig_store_basic_info/themeconfig_zipcode'),
			"uf" => Mage::getStoreConfig('themeconfig/themeconfig_store_basic_info/themeconfig_uf'),
			"city" => Mage::getStoreConfig('themeconfig/themeconfig_store_basic_info/themeconfig_city')
		);
	}

	/**
	* Retorna as informações do horário de atendimento da loja
	* @return string
	*/
	public function getWorkingHours() {
		$hours = Mage::getStoreConfig('themeconfig/themeconfig_store_basic_info/themeconfig_working_hours');
		return strlen($hours) > 5 ? $hours : "";
	}

	/** 
	 * Retorna o tema selecionado para a imagem do produto
	 * @return string
	 */
	public function getProductImageTheme() {
		$theme = Mage::getStoreConfig('themeconfig_design/product/image_theme');
		return $theme != NULL && strlen($theme) > 4 ? $theme . '-theme' : "default-theme";
	}

	/**
	* Pega as informações do Instagram Widget
	* @return array com as informações (status, userid, token e title) cadastradas
	*/
	public function getInstagramInfos(){
		return array(
			"status" => Mage::getStoreConfig('themeconfig/instagram_widget/instagram_force_update'),
			"userid" => Mage::getStoreConfig('themeconfig/instagram_widget/instagram_user'),
			"token" => Mage::getStoreConfig('themeconfig/instagram_widget/instagram_token'),
			"title" => Mage::getStoreConfig('themeconfig/instagram_widget/instagram_text')
		);
	}
}