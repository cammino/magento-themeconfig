<?php 

class Cammino_Themeconfig_Model_Source_Instagram_Connect extends Mage_Adminhtml_Block_System_Config_Form_Field {
    
    // Cliente ID - 14c6a7f493594e21900e25bdf2fcd3a2
    // Client Secret - b95af8683ff6458c9099729bcd5efe32
    // Code - 24484ad828f348b29ba12566f47ee4b3

    private $settings;

    /*
    * Set template
    */
    protected function _construct()
    {
        parent::_construct();
        $this->setTemplate('atwix/system/config/button.phtml');
    }

    /**
     * Return element html
     *
     * @param  Varien_Data_Form_Element_Abstract $element
     * @return string
     */
    protected function _getElementHtml(Varien_Data_Form_Element_Abstract $element)
    {
        return $this->_toHtml();
    }

    /**
     * Return ajax url for button
     *
     * @return string
     */
    public function getAjaxCheckUrl()
    {
        return Mage::helper('adminhtml')->getUrl('adminhtml/adminhtml_atwixtweaks/check');
    }

    /**
     * Generate button html
     *
     * @return string
     */
    public function getButtonHtml()
    {
        $button = $this->getLayout()->createBlock('adminhtml/widget_button')
            ->setData(array(
            'id'        => 'atwixtweaks_button',
            'label'     => $this->helper('adminhtml')->__('Check'),
            'onclick'   => 'javascript:check(); return false;'
        ));

        return $button->toHtml();
    }

	public function toOptionArray() {        
        $settings = Mage::helper('themeconfig')->getInstagramInfos();

        $client_id = '14c6a7f493594e21900e25bdf2fcd3a2';

        $url = 'https://api.instagram.com/oauth/authorize/?client_id=' . $client_id . '&hl=en&redirect_uri=https://lojademo.cammino.com.br&response_type=code';

        // $data = array('client_id' => '14c6a7f493594e21900e25bdf2fcd3a2', 'hl' => 'en', 'redirect_uri' => 'https://lojademo.cammino.com.br', 'response_type' => 'code');

        // // use key 'http' even if you send the request to https://...
        // $options = array(
        //     'http' => array(
        //         'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        //         'method'  => 'POST',
        //         'content' => http_build_query($data)
        //     )
        // );

        // $context  = stream_context_create($options);
        // $result = file_get_contents($url, false, $context);

        $redirect = 'Funcionou mano';
        
        return $redirect;
    }
}
