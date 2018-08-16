<?php


namespace floko\fkcustom6\Model;

/**
 * floko oxUser class.
 *
 * @mixin \OxidEsales\Eshop\Application\Model\User
 */
class User extends User_parent
{

    /**
     * Performs bunch of checks if user profile data is correct; on any
     * error exception is thrown
     *
     * @param string $sLogin      user login name
     * @param string $sPassword   user password
     * @param string $sPassword2  user password to compare
     * @param array  $aInvAddress array of user profile data
     * @param array  $aDelAddress array of user profile data
     *
     * @throws oxUserException, oxInputException
     */
    public function checkValues($sLogin, $sPassword, $sPassword2, $aInvAddress, $aDelAddress)
    {
        // fk: overwrites existing core function
        /** @var \OxidEsales\Eshop\Core\InputValidator $oInputValidator */
        $oInputValidator = Registry::getInputValidator();

        // 1. checking user name
        $sLogin = $oInputValidator->checkLogin($this, $sLogin, $aInvAddress);

        // 2. checking email
        $oInputValidator->checkEmail($this, $sLogin);

        // 3. password
        $oInputValidator->checkPassword($this, $sPassword, $sPassword2, ((int) Registry::getConfig()->getRequestParameter('option') == 3));

        // 4. required fields
        $oInputValidator->checkRequiredFields($this, $aInvAddress, $aDelAddress);

        // 5. country check
        $oInputValidator->checkCountries($this, $aInvAddress, $aDelAddress);

        // 6. vat id check.
        // fk: not needed, pure consumers shop
        /*
        try {
            $oInputValidator->checkVatId($this, $aInvAddress);
        } catch (\OxidEsales\Eshop\Core\Exception\ConnectionException $e) {
            // R080730 just oxInputException is passed here
            // if it oxConnectionException, it means it could not check vat id
            // and will set 'not checked' status to it later
        }
        */
        
        // added by fk: 7. zip code check
        //$oInputValidator->_checkZipCode( $aInvAddress );         
        
        error_log("addresscheck.php 54", 3, "/srv/stedman-online.co.uk/source/log/fk-log");         
                      
        // added by fk: 8. city check (esp. for UK!)
        //$oInputValidator->_checkCity( $aInvAddress, 0);                      
        //$oInputValidator->_checkCity( $aDelAddress, 1 );           

        // throwing first validation error
        if ($oError = Registry::getInputValidator()->getFirstValidationError()) {
            throw $oError;
        }
    }


}
