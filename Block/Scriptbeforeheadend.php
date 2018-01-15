<?php
class Cammino_Themeconfig_Block_Scriptbeforeheadend extends Mage_Core_Block_Template {
	
	protected function _toHtml() {
		$html = "";
		$html .= $this->getTagManagerTag();
		// $html .= $this->getOtherTags() ..
		
		return $html;
	}

	private function getTagManagerTag(){
		$id = Mage::getStoreConfig('themeconfig/themeconfig_group_scripts/themeconfig_googletagmanager');
		if($id != null && strlen($id) > 3){
			return "<!-- Google Tag Manager -->
						<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
						new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
						j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
						'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
						})(window,document,'script','dataLayer','". $id ."');</script>
					<!-- End Google Tag Manager -->";
		}else{
			return "";
		}		
	}
}