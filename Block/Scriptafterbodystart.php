<?php
class Cammino_Themeconfig_Block_Scriptafterbodystart extends Mage_Core_Block_Template {
	
	protected function _toHtml() {
		$html = "";
		$html .= $this->getTagManagerTag();
		// $html .= $this->getOtherTags() ..
		
		return $html;
	}

	private function getTagManagerTag(){
		$id = Mage::getStoreConfig('themeconfig/themeconfig_group_scripts/themeconfig_googletagmanager');
		if($id != null && strlen($id) > 3){
			return '<!-- Google Tag Manager (noscript) --><noscript><iframe src="https://www.googletagmanager.com/ns.html?id='. $id .'" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript> <!-- End Google Tag Manager (noscript) -->';
		}else{
			return "";
		}		
	}
}