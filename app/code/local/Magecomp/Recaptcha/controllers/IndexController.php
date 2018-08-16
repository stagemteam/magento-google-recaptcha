<?php
class Magecomp_Recaptcha_IndexController extends Mage_Core_Controller_Front_Action
{
	public function indexAction()
	{
		$this->loadLayout();
		$this->renderLayout();
	}
	public function saveAction()
	{
	    try {
            $nam = $this->getRequest()->getParam('name');
            $emails = $this->getRequest()->getParam('email');
            $telephone = $this->getRequest()->getParam('telephone');
            $cmt = $this->getRequest()->getParam('comment');
            $receiveEmail = Mage::getStoreConfig('trans_email/ident_general/email');
            $g_response = $this->getRequest()->getParam('g-recaptcha-response');

            if (isset($g_response) && !empty($g_response)):
                if (Mage::helper('recaptcha')->Validate_captcha($g_response)):
                    if ($receiveEmail != '') {
                        try {
                            $contact = Mage::getModel('recaptcha/recaptcha')
                                ->setCname($nam)
                                ->setCemail($emails)
                                ->setCmobno($telephone)
                                ->setCcomment($cmt)
                                ->save();
                            Mage::helper('recaptcha')->contactmailsent($receiveEmail, $nam, $emails, $telephone, $cmt);
                            Mage::getSingleton('core/session')->addSuccess('Your inquiry was submitted and will be responded to as soon as possible. Thank you for contacting us.');
                            return $this->_redirectReferer();
                        } catch (Exception $e) {
                            echo $e->getMessage();
                        }
                    } else {
                        echo Mage::getSingleton('core/session')->addError(' Please Configure Admin Email.');
                        return $this->_redirectReferer();
                    }
                else:
                    echo Mage::getSingleton('core/session')->addError('Please click on the reCAPTCHA box.');
                    return $this->_redirectReferer();
                endif;
            else:
                echo Mage::getSingleton('core/session')->addError('Please click on the reCAPTCHA box.');
                return $this->_redirectReferer();
            endif;
        }
        catch (Exception $e){
	        Mage::log("Captcha Error :".$e->getMessage(),null,"recaptcha.log");
        }
	}
}

?>