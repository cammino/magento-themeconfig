<?php
class Cammino_Themeconfig_Model_Settings extends Mage_Core_Model_Abstract {

	private $helper;

	public function __construct(){
		$this->helper = Mage::helper('themeconfig');
	}

	/**
	* Adiciona uma mensagem ao arquivo de log do módulo
	* @param string mensagem que será logada
	* @return void
	*/
	public function log($message) {
		Mage::log($message, null, "themeconfig.log");
	}

	/**
	* Pega o valor de uma config do admin
	* @param string nome da config
	* @param string nome do tema da config
	* @return string/boolean valor da config pega
	*/
	public function getConfig($name, $module = "themeconfig") {
		$config = Mage::getStoreConfig($module . "/" . $name);

		if(isset($config) && strlen($config) > 1 && $config != NULL & $config != "") {
			return $config;
		} else {
			return false;
		}
	}

	/**
	* Salva uma config no admin
	* @param string nome da config
	* @param string nome do tema da config
	* @param string valor que sera salvo
	* @return void
	*/
	public function setConfig($name, $value, $module = "themeconfig") {
		Mage::getModel('core/config')->saveConfig($module . "/" . $name, $value, 'default', 0);
	}

	/**
	* Ativa ou desativa o Tracking do Facebook Pixel ID
	* @return void
	*/
	public function saveTrackingFacebookPixelId() {
		if($pixel = $this->getConfig("themeconfig_group_scripts/themeconfig_facebookpixel")) {
			$this->setConfig("fbpixel_group/fbpixel_active", "1", "fbpixel");
			$this->setConfig("fbpixel_group/fbpixel_store_id", $pixel, "fbpixel");
			$this->log("Ativou o tracking do Facebook Pixel ID: " . $pixel);
		} else {
			$this->setConfig("fbpixel_group/fbpixel_active", "0", "fbpixel");
			$this->setConfig("fbpixel_group/fbpixel_store_id", "", "fbpixel");
			$this->log("Desativou o tracking do Facebook Pixel ID");
		}
	}
	
	/**
	* Ativa ou desativa o Tracking do Gokeep
	* @return void
	*/
	public function saveTrackingGokeep() {
		if($hashcode = $this->getConfig("themeconfig_group_scripts/themeconfig_gokeepstoreid")) {
			$this->setConfig("gokeep_group/gokeep_active", "1", "gokeep");
			$this->setConfig("gokeep_group/gokeep_store_id", $hashcode, "gokeep");
			$this->log("Ativou o tracking do Gokeep, Hashcode: " . $hashcode);
		} else {
			$this->setConfig("gokeep_group/gokeep_active", "0", "gokeep");
			$this->setConfig("gokeep_group/gokeep_store_id", "", "gokeep");
			$this->log("Desativou o tracking do Gokeep");
		}
	}
	/**
	* Salva informações básicas da loja no Magento
	* @return void
	*/
	public function saveBasicInformation() {
		$storeName = $this->getConfig("themeconfig_store_basic_info/themeconfig_storename");
		$addressStreet = $this->getConfig("themeconfig_store_basic_info/themeconfig_address_street");
		$addressNumber = $this->getConfig("themeconfig_store_basic_info/themeconfig_address_number");
		$addressComplement = $this->getConfig("themeconfig_store_basic_info/themeconfig_address_complement");
		$addressNeighborhood = $this->getConfig("themeconfig_store_basic_info/themeconfig_address_neighborhood");
		$zipcode = $this->getConfig("themeconfig_store_basic_info/themeconfig_zipcode");
		$uf = $this->getConfig("themeconfig_store_basic_info/themeconfig_uf");
		$city = $this->getConfig("themeconfig_store_basic_info/themeconfig_city");
		$hour = $this->getConfig("themeconfig_store_basic_info/themeconfig_working_hours");

		if($storeName) {

			$page = Mage::getModel('cms/page')
			    ->load('home', 'identifier');

			$pageData = array(
			    'title' => $storeName,
			    'root_template' => 'one_column',
			    'identifier' => 'home',
			    'stores' => array(1),
			    'page_id' => $page->getId()
			);

$page->setData($pageData)
    ->save();

			// Sistema > Geral > Geral > Informações sobre a loja > Loja
			$this->setConfig("store_information/name", $storeName , "general");
			
			// Sistema > Geral > Visual > Cabeçalho HTML > Título Padrão
			$this->setConfig("head/default_title", $storeName , "design");
			
			// Sistema > Geral > Visual > Cabeçalho HTML > Sufixo de Título
			$this->setConfig("head/title_suffix", " | " . $storeName , "design");
			
			// Sistema > Geral > Visual > Cabeçalho HTML > Descrição padrão
			$this->setConfig("head/default_description", $storeName , "design");
			
			// Sistema > Geral > Visual > Cabeçalho HTML > Palavras-Chaves Padrão
			$this->setConfig("head/default_keywords", $storeName , "design");
			
			// Sistema > Geral > Visual > Cabeçalho > Descrição da Logo
			$this->setConfig("header/logo_alt", $storeName , "design");
			
			// Sistema > Geral > Visual > Rodapé > Direitos Autorais
			$this->setConfig("footer/copyright", date("Y") . " | " . $storeName . " todos os direitos reservados" , "design");
			
			// Sistema > Geral > Visual > Emails de Transação > Descrição da Logo
			$this->setConfig("email/logo_alt", $storeName , "design");
		}

		// Sistema > Geral > Geral > Informações sobre a loja > Horário de Funcionamento
		if($hour) {
			$this->setConfig("store_information/hours", $hour , "general");
		}

		// Sistema > Geral > Geral > Informações sobre a loja > Horário de Funcionamento
		$address = "";
		if($addressStreet && $addressNumber && $addressNeighborhood) {
			$address .= $addressStreet . ", " . $addressNumber;

			if($addressComplement) {
				$address .= " " . $addressComplement;
			}

			$address .= " - " . $addressNeighborhood;
		}

		if($zipcode && $city && $uf) {
			$address .= "\nCEP: " . $zipcode . ", " . $city . " - " . $uf;
		}
		if($address != "" && strlen($address) > 3) {
			// Sistema > Geral > Geral > Informações sobre a loja > Endereço de Contato
			$this->setConfig("store_information/address", $address ,"general");
		}

		if($addressStreet && $addressNumber && $addressNeighborhood && $city && $zipcode && $uf) {
			// Sistema > Vendas > Configurações de entrega > Origem do Envio > Estado
			$ufId = $this->helper->getUfIdForShippingOrigin($uf);
			$this->setConfig("origin/region_id", $ufId ,"shipping");

			// Sistema > Vendas > Configurações de entrega > Origem do Envio > CEP
			$this->setConfig("origin/postcode", $zipcode ,"shipping");

			// Sistema > Vendas > Configurações de entrega > Origem do Envio > Cidade
			$this->setConfig("origin/city", $city ,"shipping");

			// Sistema > Vendas > Configurações de entrega > Origem do Envio > Endereço
			$this->setConfig("origin/street_line1", $addressStreet . ", " . $addressNumber . " - " . $addressNeighborhood ,"shipping");

			if($addressComplement) {
				// Sistema > Vendas > Configurações de entrega > Origem do Envio > Complemento
				$this->setConfig("origin/street_line2", $addressComplement ,"shipping");
			}
		}
	}

	/**
	* Salva os telefones da loja no Magento
	* @return void
	*/
	public function savePhones() {
		$phone = "";
		$phone1 = $this->getConfig("themeconfig_group_phones/themeconfig_telephone_1");
		$cellphone1 = $this->getConfig("themeconfig_group_phones/themeconfig_cellphone_1");
		$whatsapp1 = $this->getConfig("themeconfig_group_phones/themeconfig_whatsapp_1");

		if($phone1) {
			$phone = $phone1;
		} else if($cellphone1) {
			$phone = $cellphone1;
		} else if($whatsapp1) {
			$phone = $whatsapp1;
		}

		if($phone != "") {
			// Sistema > Geral > Geral > Informações sobre a loja > Telefone de Contato
			$this->setConfig("store_information/phone", $phone , "general");
		}
	}

	/**
	* Salva os emails da loja no Magento
	* @return void
	*/
	public function saveEmails() {
		$storeName = $this->getConfig("themeconfig_store_basic_info/themeconfig_storename");
		$email = "";
		$email1 = $this->getConfig("themeconfig_group_mails/themeconfig_mail_1");
		$email2 = $this->getConfig("themeconfig_group_mails/themeconfig_mail_2");

		if($email1) {
			$email = $email1;
		} else if ($email2) {
			$email = $email2;
		}

		if($email != "") {			
			// Sistema > Geral > Emails de Contato > Contato Geral > Remetente de Email
			$this->setConfig("ident_general/email", $email , "trans_email");
			
			// Sistema > Geral > Emails de Contato > Vendas > Remetente de Email
			$this->setConfig("ident_sales/email", $email , "trans_email");
			
			// Sistema > Geral > Emails de Contato > Suporte > Remetente de Email
			$this->setConfig("ident_support/email", $email , "trans_email");

			// Sistema > Geral > Emails de Contato > Personalizado 1 > Remetente de Email
			$this->setConfig("ident_custom1/email", $email , "trans_email");
			
			// Sistema > Geral > Emails de Contato > Personalizado 2 > Remetente de Email
			$this->setConfig("ident_custom2/email", $email , "trans_email");
			
			// Sistema > Geral > Contatos > Opções de Email > Remetente de Email
			$this->setConfig("email/recipient_email", $email , "contacts");
		}

		if($storeName) {
			// Sistema > Geral > Emails de Contato > Contato Geral > Nome do Remetente
			$this->setConfig("ident_general/name", $storeName , "trans_email");
			
			// Sistema > Geral > Emails de Contato > Vendas > Nome do Remetente
			$this->setConfig("ident_sales/name", $storeName , "trans_email");
			
			// Sistema > Geral > Emails de Contato > Suporte > Nome do Remetente
			$this->setConfig("ident_support/name", $storeName , "trans_email");

			// Sistema > Geral > Emails de Contato > Personalizado 1 > Nome do Remetente
			$this->setConfig("ident_custom1/name", $storeName , "trans_email");
			
			// Sistema > Geral > Emails de Contato > Personalizado 2 > Nome do Remetente
			$this->setConfig("ident_custom2/name", $storeName , "trans_email");
		}
	}

	/**
	* Salva o ID do Google Analytics
	* @return void
	*/
	public function saveTrackingGoogleAnalytics() {
		$ga = $this->getConfig("themeconfig_group_scripts/themeconfig_googleanalyticsid");
		
		if ($ga != "") {
			// Sistema > Configurações > Vendas > API Do Google > Google Analytics
			$this->setConfig("analytics/active", 1 , "google");
			$this->setConfig("analytics/account", $ga , "google");
			
		}
	}

	/**
	* Atualiza as informações do Instagram Widget
	* @return void
	*/
	public function saveInstagramWidgetValues($user_id, $access_token) {
		if ($user_id != "" && $access_token != null) {
			$this->setConfig("instagram_widget/instagram_user", $user_id, "themeconfig");
			$this->setConfig("instagram_widget/instagram_token", $access_token, "themeconfig");
		}
	}
}