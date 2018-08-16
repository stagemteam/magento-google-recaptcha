<?php

class Magecomp_Recaptcha_Model_Observer
{
    public function Customercreate($observer)
    {
		
        try {
			
            if (Mage::helper('recaptcha/data')->showOnRegister()) {
				 $g_response = Mage::app()->getRequest()->getParam('g-recaptcha-response');
                if (isset($g_response) && !empty($g_response)):
                    if (!(Mage::helper('recaptcha')->Validate_captcha($g_response))):
                        Mage::getSingleton('core/session')->addError('Please click on the reCAPTCHA box.123');
                        $url = Mage::helper('core/http')->getHttpReferer() ? Mage::helper('core/http')->getHttpReferer() : Mage::getUrl();
                        Mage::app()->getFrontController()->getResponse()->setRedirect($url);
                        Mage::app()->getResponse()->sendResponse();
                        exit;
                    endif;
                else:
                    $observer->getEvent()->setData(null);
                    Mage::getSingleton('core/session')->addError('Please click on the reCAPTCHA box.456');
                    $url = Mage::helper('core/http')->getHttpReferer() ? Mage::helper('core/http')->getHttpReferer() : Mage::getUrl();
                    Mage::app()->getFrontController()->getResponse()->setRedirect($url);
                    Mage::app()->getResponse()->sendResponse();
                    exit;
                endif;
            }
        } catch (Exception $e) {
            Mage::log("Captcha Error :" . $e->getMessage(), null, "recaptcha.log");
        }
    }
	public function Login($observer)
	 {
		 try {
			  if (Mage::helper('recaptcha/data')->showOnLogin())
			  {
				 $g_response = Mage::app()->getRequest()->getParam('g-recaptcha-response'); 
				   if (isset($g_response) && !empty($g_response)):
                    if (!(Mage::helper('recaptcha')->Validate_captcha($g_response))):
                        Mage::getSingleton('core/session')->addError('Please click on the reCAPTCHA box.123 ');
                        $url = Mage::helper('core/http')->getHttpReferer() ? Mage::helper('core/http')->getHttpReferer() : Mage::getUrl();
                        Mage::app()->getFrontController()->getResponse()->setRedirect($url);
                        Mage::app()->getResponse()->sendResponse();
                        exit;
                    endif;
                else:
                    $observer->getEvent()->setData(null);
                    Mage::getSingleton('core/session')->addError('Please click on the reCAPTCHA box.456 ');
                    $url = Mage::helper('core/http')->getHttpReferer() ? Mage::helper('core/http')->getHttpReferer() : Mage::getUrl();
                    Mage::app()->getFrontController()->getResponse()->setRedirect($url);
                    Mage::app()->getResponse()->sendResponse();
                    exit;
                endif;
			  }
			 }catch (Exception $e) {
            Mage::log("Captcha Error :" . $e->getMessage(), null, "recaptcha.log");
        }
		  
	 }
	public function Newslettersubmit($observer)
	{
		 try {
			  if (Mage::helper('recaptcha/data')->showOnNewsletter())
			  {
				 $g_response = Mage::app()->getRequest()->getParam('g-recaptcha-response'); 
				   if (isset($g_response) && !empty($g_response)):
                    if (!(Mage::helper('recaptcha')->Validate_captcha($g_response))):
                        Mage::getSingleton('core/session')->addError('Please click on the reCAPTCHA box.123');
                        $url = Mage::helper('core/http')->getHttpReferer() ? Mage::helper('core/http')->getHttpReferer() : Mage::getUrl();
                        Mage::app()->getFrontController()->getResponse()->setRedirect($url);
                        Mage::app()->getResponse()->sendResponse();
                        exit;
                    endif;
                else:
                    $observer->getEvent()->setData(null);
                    Mage::getSingleton('core/session')->addError('Please click on the reCAPTCHA box.456');
                    $url = Mage::helper('core/http')->getHttpReferer() ? Mage::helper('core/http')->getHttpReferer() : Mage::getUrl();
                    Mage::app()->getFrontController()->getResponse()->setRedirect($url);
                    Mage::app()->getResponse()->sendResponse();
                    exit;
                endif;
			  }
			 }catch (Exception $e) {
            Mage::log("Captcha Error :" . $e->getMessage(), null, "recaptcha.log");
        }
	}
	public function adminloginsubmit($observer)
	{
		 try {
			  if (Mage::helper('recaptcha/data')->showadminlogin())
			  {
				 $g_response = Mage::app()->getRequest()->getParam('g-recaptcha-response'); 
				   if (isset($g_response) && !empty($g_response)):
                    if (!(Mage::helper('recaptcha')->Validate_captcha($g_response))):
                        Mage::getSingleton('core/session')->addError('Please click on the reCAPTCHA box.123 ');
                        $url = Mage::helper('core/http')->getHttpReferer() ? Mage::helper('core/http')->getHttpReferer() : Mage::getUrl();
                        Mage::app()->getFrontController()->getResponse()->setRedirect($url);
                        Mage::app()->getResponse()->sendResponse();
                        exit;
                    endif;
                else:
                    $observer->getEvent()->setData(null);
                    Mage::getSingleton('core/session')->addError('Please click on the reCAPTCHA box.456');
                    $url = Mage::helper('core/http')->getHttpReferer() ? Mage::helper('core/http')->getHttpReferer() : Mage::getUrl();
                    Mage::app()->getFrontController()->getResponse()->setRedirect($url);
                    Mage::app()->getResponse()->sendResponse();
                    exit;
                endif;
			  }
			 }catch (Exception $e) {
            Mage::log("Captcha Error :" . $e->getMessage(), null, "recaptcha.log");
        }
	}
    public function Reviewsubmit()
    {
        try {
            if (Mage::helper('recaptcha/data')->showOnReview()) {
                $g_response = Mage::app()->getRequest()->getParam('g-recaptcha-response');
                if (isset($g_response) && !empty($g_response)):
                    if (!(Mage::helper('recaptcha')->Validate_captcha($g_response))):
                        Mage::getSingleton('core/session')->addError('Please click on the reCAPTCHA box');
                        $url = Mage::helper('core/http')->getHttpReferer() ? Mage::helper('core/http')->getHttpReferer() : Mage::getUrl();
                        Mage::app()->getFrontController()->getResponse()->setRedirect($url);
                        Mage::app()->getResponse()->sendResponse();
                        exit;
                    endif;
                else:
                    Mage::getSingleton('core/session')->addError('Please click on the reCAPTCHA box.');
                    $url = Mage::helper('core/http')->getHttpReferer() ? Mage::helper('core/http')->getHttpReferer() : Mage::getUrl();
                    Mage::app()->getFrontController()->getResponse()->setRedirect($url);
                    Mage::app()->getResponse()->sendResponse();
                    exit;
                endif;
            }
        } catch (Exception $e) {
            Mage::log("Captcha Error :" . $e->getMessage(), null, "recaptcha.log");
        }
    }
	 public function Savebilling()
    {
        try {
            if (Mage::helper('recaptcha/data')->showOnOnepage()) {
                $g_response = Mage::app()->getRequest()->getParam('g-recaptcha-response');
                if (isset($g_response) && !empty($g_response)):
                    if (!(Mage::helper('recaptcha')->Validate_captcha($g_response))):
                        Mage::getSingleton('core/session')->addError('Please click on the reCAPTCHA box');
                        $url = Mage::helper('core/http')->getHttpReferer() ? Mage::helper('core/http')->getHttpReferer() : Mage::getUrl();
                        Mage::app()->getFrontController()->getResponse()->setRedirect($url);
                        Mage::app()->getResponse()->sendResponse();
                        exit;
                    endif;
                else:
                    Mage::getSingleton('core/session')->addError('Please click on the reCAPTCHA box.');
                    $url = Mage::helper('core/http')->getHttpReferer() ? Mage::helper('core/http')->getHttpReferer() : Mage::getUrl();
                    Mage::app()->getFrontController()->getResponse()->setRedirect($url);
                    Mage::app()->getResponse()->sendResponse();
                    exit;
                endif;
            }
        } catch (Exception $e) {
            Mage::log("Captcha Error :" . $e->getMessage(), null, "recaptcha.log");
        }
    }
}

?>