<?php 

class Cammino_Themeconfig_Model_Source_Design_Theme_Alternativeprice
{
    public function toOptionArray()
    {
			return array (
				array('value' => 'installments', 'label' => 'Parcelamento'),
				array('value' => 'installments_billet', 'label' => 'Parcelamento e preço no boleto'),
				array('value' => 'installments_pix', 'label' => 'Parcelamento e preço no pix'),
				array('value' => 'billet', 'label' => 'Preço no boleto'),
				array('value' => 'billet_pix', 'label' => 'Preço no boleto e no PIX'),
				array('value' => 'pix', 'label' => 'Preço no PIX'),
				array('value' => 'all', 'label' => 'Todos'),
				array('value' => 'none', 'label' => 'Nenhum'),
			);
	}
}
