<?php 

class Cammino_Themeconfig_Model_Source_Design_Theme_Alternativeprice
{
    public function toOptionArray()
    {
			return array (
				array('value' => 'installments', 'label' => 'Parcelamento'),
				array('value' => 'billet', 'label' => 'Preço no boleto'),
				array('value' => 'none', 'label' => 'Nenhum'),
			);
	}
}
