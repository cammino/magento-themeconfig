<?php
class Cammino_Themeconfig_Model_Observer extends Mage_GoogleAnalytics_Model_Observer {
    
    private $settings;

	public function __construct(){
		$this->settings = Mage::getModel('themeconfig/settings');
    }
    
    /**
	* Após salvar as opções nas configs do admin da Cammino Store, atualiza as informações
	* @return void
	*/
    public function saveSettings() {
        $this->saveStoreBasicInformation();
        $this->saveStorePhones();
        $this->saveStoreEmails();
        $this->saveStoreTrackings();
        $this->saveStorePayments();
    }

    /**
	* Atualiza as informações de configurações básicas da loja, como nome, endereço etc
	* @return void
	*/
    public function saveStoreBasicInformation() {
        $configName = 'themeconfig/themeconfig_store_basic_info/themeconfig_store_basic_info_force_update';
        
        if(Mage::getStoreConfig($configName) == "1") {
            $this->settings->saveBasicInformation();
        }

        Mage::getModel('core/config')->saveConfig($configName, "0");
    }

    /**
	* Atualiza as informações de telefones da loja
	* @return void
	*/
    public function saveStorePhones() {
        $configName = 'themeconfig/themeconfig_group_phones/themeconfig_telephones_force_update';
        
        if(Mage::getStoreConfig($configName) == "1") {
            $this->settings->savePhones();
        }

        Mage::getModel('core/config')->saveConfig($configName, "0");
    }

    /**
	* Atualiza as informações de emails da loja
	* @return void
	*/
    public function saveStoreEmails() {
        $configName = 'themeconfig/themeconfig_group_mails/themeconfig_mail_force_update';
        
        if(Mage::getStoreConfig($configName) == "1") {
            $this->settings->saveEmails();
        }

        Mage::getModel('core/config')->saveConfig( $configName, "0" );
    }
    
    /**
	* Atualiza as informações de tracking da loja
	* @return void
	*/
    public function saveStoreTrackings() {
        $configName = 'themeconfig/themeconfig_group_scripts/themeconfig_trackings_force_update';
        
        if(Mage::getStoreConfig($configName) == "1") {
            $this->settings->saveTrackingFacebookPixelId();
            $this->settings->saveTrackingGokeep();
            $this->settings->saveTrackingGoogleAnalytics();
        }

        Mage::getModel('core/config')->saveConfig($configName, "0");
    }
    
    /**
	* Atualiza as informações de pagamento da loja
	* @return void
	*/
    public function saveStorePayments() {
        $configName = 'themeconfig/themeconfig_group_payment/themeconfig_payment_force_update';
        
        if(Mage::getStoreConfig($configName) == "1") {
        }

        Mage::getModel('core/config')->saveConfig($configName, "0");
    }

    public function redirectProductPage(Varien_Event_Observer $observer) {
        $redirect = Mage::app()->getRequest()->getParam('redirect_product');
        if (!empty($redirect)) {    
            $urldecode = urldecode($redirect);
            $base64reverse = base64_decode($urldecode);
            $pos = strpos($base64reverse, Mage::getBaseUrl());
            if ($pos === 0){
                Mage::getSingleton('customer/session')->setBeforeAuthUrl($base64reverse);
           }
       }
    }

    

    /**
	* Evento disparado ao carregar a home do site (verificar melhora)
	* @return void
	*/
    public function connectForInstagramWidget() {
        // curl -d "client_id=b01bed32bc8e44578b1fc7f621bb532e&client_secret=a88f7bc76f3b46bdbf7f261f778a3ec0&grant_type=authorization_code&redirect_uri=https://lojademo.cammino.com.br&code=CODE" -X POST https://api.instagram.com/oauth/access_token

        if (isset($_GET['code'])) {
            $instagram = Mage::helper("themeconfig")->getInstagramInfos();

            // $clientid = $instagram["clientid"];
            // $clientsecret = $instagram["clientsecret"];
            $clientid = 'b01bed32bc8e44578b1fc7f621bb532e';
            $clientsecret = 'a88f7bc76f3b46bdbf7f261f778a3ec0';
            $code = $_GET['code'];

            $url = 'https://api.instagram.com/oauth/access_token';
            
            $fields = array(
                'client_id' => $clientid,
                'client_secret' => $clientsecret,
                'grant_type' => 'authorization_code',
                'redirect_uri' => 'https://lojademo.cammino.com.br',
                'code' => $code
            );

            //url-ify the data for the POST
            foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
            rtrim($fields_string, '&');

            // //open connection
            $ch = curl_init();

            //set the url, number of POST vars, POST data
            curl_setopt($ch,CURLOPT_URL, $url);
            curl_setopt($ch,CURLOPT_POST, count($fields));
            curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

            //execute post
            $result = curl_exec($ch);

            $json = json_decode ($result);

            /**
            * Atualiza as informações de telefones da loja
            */

            var_dump($json['user']['id']);

            // $this->setConfig("instagram_widget/instagram_user", $jon['user']['id']);
            // $this->setConfig("instagram_widget/instagram_token", $jon['access_token']);

            //close connection
            curl_close($ch);

            // https://www.instagram.com/accounts/login/?next=/developer/
        }
    }
}