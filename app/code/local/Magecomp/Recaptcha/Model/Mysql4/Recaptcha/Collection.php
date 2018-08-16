<?php
class Magecomp_Recaptcha_Model_Mysql4_Recaptcha_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
	public function _construct()
	{
		parent::_construct();
		$this->_init('recaptcha/recaptcha');	
	}
}
