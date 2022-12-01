<?php 

class Cammino_Themeconfig_Model_Source_Design_Theme_Pagination
{
	public function toOptionArray()
	{
		return array (
			array('value' => 'default', 'label' => 'Com infinite scroll (automático)'),
			array('value' => 'pagination', 'label' => 'Paginação (número das páginas)'),
		);
	}
}
