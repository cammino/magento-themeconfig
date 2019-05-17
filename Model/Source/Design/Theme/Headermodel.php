<?php 

class Cammino_Themeconfig_Model_Source_Design_Theme_Headermodel
{
    public function toOptionArray()
    {
		return array(
			array('value' => 'default', 'label' => 'Default (modelo padrão)'),
			array('value' => 'model2', 'label' => 'Modelo 2 (Mega Menu)')
		);
	}
}
