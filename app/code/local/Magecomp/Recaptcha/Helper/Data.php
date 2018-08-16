<?php

class Magecomp_Recaptcha_Helper_Data extends Mage_Core_Helper_Abstract
{
    const RECAPTCHA_ENABLE = 'magecomp_captcha/recaptcha_config/magecomp_select';
    const SITEKEY = 'magecomp_captcha/recaptcha_config/sitekey';
    const SECRETKEY = 'magecomp_captcha/recaptcha_config/secretkey';
    const RECAPTCHA_THEME = 'magecomp_captcha/recaptcha_config/recaptcha_theme';
    const RECAPTCHA_CATEGORY = 'magecomp_captcha/recaptcha_config/recaptcha_category';



    public function contactmailsent($receiveEmail, $nam, $emails, $telephone, $cmt)
    {
        try {
            $receiveName = Mage::getStoreConfig('trans_email/ident_general/name');
            $receiveEmail = Mage::getStoreConfig('contacts/email/recipient_email');
            $storeId = Mage::app()->getStore()->getStoreId();
            $mailSubject = "Contact Form";
            $emailTemplate = Mage::getModel('core/email_template')
                ->loadDefault('mcm_contacts');
            $vars = array('nam' => $nam, 'emails' => $emails, 'telephone' => $telephone, 'comment' => $cmt);
            /** Email Template  **/
            $processedTemplate = $emailTemplate->getProcessedTemplate($vars);
            $emailTemplate->setSenderEmail($emails, $storeId);
            $emailTemplate->setTemplateSubject($mailSubject);
            $emailTemplate->setSenderName($receiveName, $storeId);
            $emailTemplate->send($receiveEmail, $receiveName, $vars);
        } catch (Exception $e) {
            Mage::log("Catptcha Error :" . $e->getMessage());
        }
    }

    public function isEnabled()
    {
        return (bool)Mage::getStoreConfig(self::RECAPTCHA_ENABLE);
    }

    public function getKey()
    {
        return Mage::getStoreConfig(self::SITEKEY);
    }

    public function getSecretkey()
    {
        return Mage::getStoreConfig(self::SECRETKEY);
    }

    public function showOnContact()
    {
        if ($this->isEnabled()) {
            return self::getEnabledPage(0);
        }
    }

    public function showOnReview()
    {
        if ($this->isEnabled()) {
            return self::getEnabledPage(1);
        }
    }

    public function showOnRegister()
    {
        if ($this->isEnabled()) {
            return self::getEnabledPage(2);
        }
    }

    public function showOnOnepage()
    {
        if ($this->isEnabled()) {
            return self::getEnabledPage(3);
        }
    }
	public function showOnLogin()
	{
		 if ($this->isEnabled())
		 {
			return self::getEnabledPage(4);
		 }
	}
	public function showOnNewsletter()
	{
		 if ($this->isEnabled())
		 {
			return self::getEnabledPage(5);
		 }
	}
	
	public function showadminlogin()
	{
		 if ($this->isEnabled())
		 {
			return self::getEnabledPage(6);
		 }
	}

    public function getTheme()
    {
        if ($this->isEnabled()) {
            if ((Mage::getStoreConfig(self::RECAPTCHA_THEME)) == 0) {
                return "light";
            } else {
                return "dark";
            }
		}
    }

    public function getEnabledPage($value)
    {
        $enablepage = Mage::getStoreConfig(self::RECAPTCHA_CATEGORY);
        $enablepage = explode(",", $enablepage);
        if (in_array($value, $enablepage))
            return true;
        else
            return false;
    }

    public function Validate_captcha($response)
    {
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $this->getSecretkey() . '&response=' . $response);
        $responseData = json_decode($verifyResponse);
        if ($responseData->success):
            return true;
        else:
            return false;
        endif;
    }

}