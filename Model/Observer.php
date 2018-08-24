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

        Mage::getModel('core/config')->saveConfig($configName, "0");
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
}