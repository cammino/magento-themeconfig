<?php 

class Cammino_Themeconfig_Model_Source_Design_Theme_Productimage 
{
    public function toOptionArray()
    {
		return array(
			array('value' => 'default', 'label' => 'Default (foto no formato quadrado)'),
			array('value' => 'vertical', 'label' => 'Vertical (foto maior e altura automatica)')
		);
	}
}
