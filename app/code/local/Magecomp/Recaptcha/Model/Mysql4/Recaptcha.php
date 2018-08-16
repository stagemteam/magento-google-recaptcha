<?php

class Magecomp_Recaptcha_Model_Mysql4_Recaptcha extends Mage_Core_Model_Mysql4_Abstract
{

    public function _construct()
    {
        $this->_init('recaptcha/recaptcha', 'contact_id');
    }
}
