<?php
class Magecomp_Recaptcha_Model_Recaptcha extends Mage_Core_Model_Abstract
{
	public function _construct()
	{	
		parent::_construct();
		$this->_init('recaptcha/recaptcha');
	}
}
