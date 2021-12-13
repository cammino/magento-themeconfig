<?php 

class Cammino_Themeconfig_Model_Source_Design_Theme_Infinitescroll
{
	public function toOptionArray()
	{
		return array (
			array('value' => 'default', 'label' => 'Carregamento padrão (automático)'),
			array('value' => 'button', 'label' => 'Exibir botão "Ver mais"'),
		);
	}
}
