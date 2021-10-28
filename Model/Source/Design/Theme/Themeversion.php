<?php 

class Cammino_Themeconfig_Model_Source_Design_Theme_Themeversion
{
    public function toOptionArray()
    {
		return array(
			array('value' => 'default', 'label' => 'Default (tema padrão)'),
			array('value' => 'dark-theme', 'label' => 'Dark (versão escura da loja)')
		);
	}
}
