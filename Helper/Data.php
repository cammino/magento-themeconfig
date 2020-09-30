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
			"hometitle" => Mage::getStoreConfig('themeconfig/themeconfig_store_basic_info/themeconfig_hometitle'),
			"sufixtitle" => Mage::getStoreConfig('themeconfig/themeconfig_store_basic_info/themeconfig_sufixtitle'),
			"razaosocial" => Mage::getStoreConfig('themeconfig/themeconfig_store_basic_info/themeconfig_razaosocial'),
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
	* Retorna se o Fullbanner tem autoplay (default = ativado)
	* @return string
	*/
	public function getFullbannersAutoplay() {
		$enable = Mage::getStoreConfig('themeconfig/themeconfig_group_banners/themeconfig_fullbanners_autoplay');
		return $enable == "0" ? 'false' : 'true';
	}
	
	/**
	* Retorna o tempo de transição entre as imagens do Fullbanner (default = 8 segs)
	* @return int
	*/
	public function getFullbannersSpeed() {
		$time = intval(Mage::getStoreConfig('themeconfig/themeconfig_group_banners/themeconfig_fullbanners_speed'));
		$time = $time <= 2 ? 8 : $time;
		return $time * 1000;
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
	* @return array com informações do instagram
	*/
	public function getInstagramWidgetInfos() {
		return array(
			"active" => Mage::getStoreConfig('themeconfig/instagram_widget/active'),
			"user" => Mage::getStoreConfig('themeconfig/instagram_widget/user'),
			"title" => Mage::getStoreConfig('themeconfig/instagram_widget/title')
		);
	}

	/**
	* Verifica se o widget de comentários para o produto no Facebook, está habilitado
	* @return boolean se esta habilitado ou não
	*/
	public function hasFacebookComments() {
		return array(
			"status" => Mage::getStoreConfig('themeconfig/facebook_chat_widget/facebook_chat_force_update'),
			"title" => Mage::getStoreConfig('themeconfig/facebook_chat_widget/facebook_chat_text')
		);
	}

	/**
	* Verifica se o widget do Facebook Messenger, está habilitado
	* @return boolean se esta habilitado ou não
	*/
	public function hasFacebookMessenger() {
		return array(
			"status" => Mage::getStoreConfig('themeconfig/facebook_messenger_widget/facebook_messenger_force_update'),
			"id" => Mage::getStoreConfig('themeconfig/facebook_messenger_widget/facebook_messenger_id'),
			"message" => Mage::getStoreConfig('themeconfig/facebook_messenger_widget/facebook_messenger_greetings')
		);
	}
	
	/**
	* Function responsible for returning the quantity of items per line
	* @return string
	*/
	public function getProductListQtyItemsPerLine() {
		$qty = intval(Mage::getStoreConfig('themeconfig_design/product_list/qty_per_line'));
		return $qty == 0 || $qty == 1 ? 3 : $qty;
	}
	
	/**
	* Function responsible for returning the quantity of items per line mobile
	* @return string
	*/
	public function getProductListQtyItemsPerLineMobile() {
		$qty = intval(Mage::getStoreConfig('themeconfig_design/product_list/qty_per_line_mobile'));
		return $qty == 1 ? 1 : 2;
	}

	/**
	* Verifica se tem informações para a Regra de Frete Grátis 1 cadastradas na loja
	* @return boolean se esta cadastrado ou não
	*/
	public function hasFreteGratis(){
		for ($i = 1; $i <= 5; $i++) {
			$status = Mage::getStoreConfig('themeconfig/themeconfig_group_frete/frete' . $i . '_active');	

			if ( $status == 1 || $status == '1' ) {		
				$area = Mage::getStoreConfig('themeconfig/themeconfig_group_frete/frete' . $i . '_area');
				$minval = Mage::getStoreConfig('themeconfig/themeconfig_group_frete/frete' . $i . '_minval');
				$ceps = Mage::getStoreConfig('themeconfig/themeconfig_group_frete/frete' . $i . '_ceps');

				if ( strlen($area) > 2 && strlen($minval) > 2 && strlen($ceps) > 8) {	
					$freteOptions[] = array(
						'status' => $status,
						'area' => $area,
						'minval' => $minval,
						'halfval' => $minval / 2,
						'ceps' => $ceps
					);
				}
			}			
		}
		
		return $freteOptions;
	}

	/**
	* Verifica se tem informações para a Regra de Frete Grátis 1 cadastradas na loja
	* @return boolean se esta cadastrado ou não
	*/
	public function hasFreteGratis1(){
		$status = Mage::getStoreConfig('themeconfig/themeconfig_group_frete/frete1_active');

		if ( $status == 1 || $status == '1' ) {
			$area = Mage::getStoreConfig('themeconfig/themeconfig_group_frete/frete1_area');
			$minval = Mage::getStoreConfig('themeconfig/themeconfig_group_frete/frete1_minval');
			$ceps = Mage::getStoreConfig('themeconfig/themeconfig_group_frete/frete1_ceps');

			if ( strlen($area) > 2 && strlen($minval) > 2 && strlen($ceps) > 8) {	
				return array(
					"area" => $area,
					"minval" => $minval,
					"ceps" => $ceps,
				);
			}
		}
		else {
			return false;
		}
	}

	/**
	* Verifica se tem informações para a Regra de Frete Grátis 2 cadastradas na loja
	* @return boolean se esta cadastrado ou não
	*/
	public function hasFreteGratis2(){
		$status = Mage::getStoreConfig('themeconfig/themeconfig_group_frete/frete2_active');

		if ( $status == 1 || $status == '1' ) {
			$area = Mage::getStoreConfig('themeconfig/themeconfig_group_frete/frete2_area');
			$minval = Mage::getStoreConfig('themeconfig/themeconfig_group_frete/frete2_minval');
			$ceps = Mage::getStoreConfig('themeconfig/themeconfig_group_frete/frete2_ceps');

			if ( strlen($area) > 2 && strlen($minval) > 2 && strlen($ceps) > 8) {	
				return array(
					"area" => $area,
					"minval" => $minval,
					"ceps" => $ceps,
				);
			}
		}
		else {
			return false;
		}
	}

	/**
	* Verifica se tem informações para a Regra de Frete Grátis 3 cadastradas na loja
	* @return boolean se esta cadastrado ou não
	*/
	public function hasFreteGratis3(){
		$status = Mage::getStoreConfig('themeconfig/themeconfig_group_frete/frete3_active');

		if ( $status == 1 || $status == '1' ) {
			$area = Mage::getStoreConfig('themeconfig/themeconfig_group_frete/frete3_area');
			$minval = Mage::getStoreConfig('themeconfig/themeconfig_group_frete/frete3_minval');
			$ceps = Mage::getStoreConfig('themeconfig/themeconfig_group_frete/frete3_ceps');

			if ( strlen($area) > 2 && strlen($minval) > 2 && strlen($ceps) > 8) {	
				return array(
					"area" => $area,
					"minval" => $minval,
					"ceps" => $ceps,
				);
			}
		}
		else {
			return false;
		}
	}

	/**
	* Verifica se tem informações para a Regra de Frete Grátis 4 cadastradas na loja
	* @return boolean se esta cadastrado ou não
	*/
	public function hasFreteGratis4(){
		$status = Mage::getStoreConfig('themeconfig/themeconfig_group_frete/frete4_active');

		if ( $status == 1 || $status == '1' ) {
			$area = Mage::getStoreConfig('themeconfig/themeconfig_group_frete/frete4_area');
			$minval = Mage::getStoreConfig('themeconfig/themeconfig_group_frete/frete4_minval');
			$ceps = Mage::getStoreConfig('themeconfig/themeconfig_group_frete/frete4_ceps');

			if ( strlen($area) > 2 && strlen($minval) > 2 && strlen($ceps) > 8) {	
				return array(
					"area" => $area,
					"minval" => $minval,
					"ceps" => $ceps,
				);
			}
		}
		else {
			return false;
		}
	}

	/**
	* Verifica se tem informações para a Regra de Frete Grátis 5 cadastradas na loja
	* @return boolean se esta cadastrado ou não
	*/
	public function hasFreteGratis5(){
		$status = Mage::getStoreConfig('themeconfig/themeconfig_group_frete/frete5_active');

		if ( $status == 1 || $status == '1' ) {
			$area = Mage::getStoreConfig('themeconfig/themeconfig_group_frete/frete5_area');
			$minval = Mage::getStoreConfig('themeconfig/themeconfig_group_frete/frete5_minval');
			$ceps = Mage::getStoreConfig('themeconfig/themeconfig_group_frete/frete5_ceps');

			if ( strlen($area) > 2 && strlen($minval) > 2 && strlen($ceps) > 8) {	
				return array(
					"area" => $area,
					"minval" => $minval,
					"ceps" => $ceps,
				);
			}
		}
		else {
			return false;
		}
	}

	/**
	* Retorna a altura da imagem dos produtos nas listagem quando é o vertical theme
	* @return int
	*/
	public function getProductImageVerticalThemeHeight() {
		$height = intval(Mage::getStoreConfig('themeconfig_design/product_list/product_image_height_vertical_theme'));
		return $height < 100 ? 600 : $height;
	}

	/** 
	 * Retorna o tema selecionado para o header do projeto
	 * @return string
	 */
	public function getHeaderModel() {
		$theme = Mage::getStoreConfig('themeconfig_design/header_model/header_style');
		return $theme != NULL && strlen($theme) > 4 ? $theme . '-header' : "default-header";
	}

	/**
	* Verifica se o link para o blog, está habilitado
	* @return boolean se esta habilitado ou não
	*/
	public function getBlogLink() {
		return array(
			"status" => Mage::getStoreConfig('themeconfig/themeconfig_blog/themeconfig_blog_force_update'),
			"link" => Mage::getStoreConfig('themeconfig/themeconfig_blog/themeconfig_blog_link')
		);
	}

	/**
	* Retorna as informações do campo dgmaxid na sessão de trackings
	* @return string
	*/
	public function getDgmaxId() {
		$dgmaxId = Mage::getStoreConfig("themeconfig/themeconfig_group_scripts/themeconfig_dgmaxid");
		return $dgmaxId;
	}

	/**
	* Verifica se o cálculo de frete via geolocalização, está habilitado
	* @return boolean se esta habilitado ou não
	*/
	public function getGeolocation() {
		return array(
			"enable" => Mage::getStoreConfig('themeconfig/themeconfig_geolocation/themeconfig_geolocation_enable'),
			"api_key" => Mage::getStoreConfig('themeconfig/themeconfig_geolocation/themeconfig_geolocation_api_key')
		);
	}

	/**
	* Verifica se o efeito de hover está habilidade para os produtos da listagem
	* @return boolean
	*/
	public function getProductListHover() {
		$enable = Mage::getStoreConfig('themeconfig_design/product_list/product_list_hover');
		return $enable == "0" ? 'false' : 'true';
	}

	/**
	* Verifica se o alerte de cookies (LGPD) está habilitado ou não
	*/
	public function hasAlertCookieLGPD() {
		return array(
			"status" => Mage::getStoreConfig('themeconfig_lgpd/themeconfig_lgpd_fields/lgpd_cookie_alert_active'),
			"message" => Mage::getStoreConfig('themeconfig_lgpd/themeconfig_lgpd_fields/lgpd_cookie_alert_message'),
			"button" => Mage::getStoreConfig('themeconfig_lgpd/themeconfig_lgpd_fields/lgpd_cookie_alert_button'),
			"time" => Mage::getStoreConfig('themeconfig_lgpd/themeconfig_lgpd_fields/lgpd_cookie_alert_expiration_time')
		);
	}

	/**
	* Veririca se o Shippingestimate (Frete na página do produto) irá considerar possíveis descontos ao valor
	*/
	public function hasShippingEstimateDiscount() {
		return array(
			"enable" => Mage::getStoreConfig('themeconfig/themeconfig_discount_shipping/themeconfig_discount_shipping_enable')
		);
	}
}