<?php
class Cammino_Themeconfig_Block_Scriptafterbodystart extends Mage_Core_Block_Template {
	
	protected function _toHtml() {
		$html = "";
		$html .= $this->getTagManagerTag();
		$html .= $this->getWhatsAppTag();
		// $html .= $this->getOtherTags() ..
		
		return $html;
	}

	private function getTagManagerTag(){
		$id = Mage::getStoreConfig('themeconfig/themeconfig_group_scripts/themeconfig_googletagmanager');

		if($id != null && strlen($id) > 3){
			return '<!-- Google Tag Manager (noscript) --><noscript><iframe src="https://www.googletagmanager.com/ns.html?id='. $id .'" height="0" width="0" style="display:none;visibility:hidden;overfleixons:none;"></iframe></noscript> <!-- End Google Tag Manager (noscript) -->';
		}else{
			return "";
		}		
	}

	private function getWhatsAppTag() {
		$status = Mage::getStoreConfig('themeconfig/themeconfig_whatsapp_widget/whatsapp_force_update');

		$phone = Mage::getStoreConfig('themeconfig/themeconfig_whatsapp_widget/whatsapp_number');
		$text = Mage::getStoreConfig('themeconfig/themeconfig_whatsapp_widget/whatsapp_text');
		$icone = $this->getSkinUrl('images/icon-whatsapp.svg');

		if ( $status == "1" ) {
			if ( $phone != null && strlen($phone ) > 3) {

				if ( $text == null || $text == '') {
					$text = 'Olá, gostaria de algumas informações!';
				}

				return '<a href="https://api.whatsapp.com/send?phone=55' . $phone . '&text=' . $text . '" target="_blank" class="whatsapp-widget"><img src="' . $icone . '" alt="Ícone do Whatsapp"></a>';
			}
			else {
				return "";
			}
		}		
	}
}