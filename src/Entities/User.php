<?php
/**
 * User: ugursogukpinar
 * Date: 18/04/16
 * Time: 15:37
 */

namespace O365Graph\Entities;


class User
{

    /**
     * Display Name Ex. (John Doe)
     * @var String
     */
    private $displayName;

    /**
     * Account availability
     * @var bool
     */
    private $accountEnabled = true;

    /**
     * User alias
     * @var String
     */
    private $mailNickname;

    /**
     * @var \O365Graph\Entities\PasswordProfile $passwordProfile
     */
    private $passwordProfile;

    /**
     * User email adress
     * @var String
     */
    private $userPrincipalName;

    /**
     * User constructor.
     * @param String $userPrincipalName
     * @param PasswordProfile $passwordProfile
     */
    public function __construct($userPrincipalName, PasswordProfile $passwordProfile)
    {
        $this->userPrincipalName = $userPrincipalName;
        $this->passwordProfile = $passwordProfile;
    }

    /**
     * @return String
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * @param String $displayName
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
    }

    /**
     * @return boolean
     */
    public function isAccountEnabled()
    {
        return $this->accountEnabled;
    }

    /**
     * @param boolean $accountEnabled
     */
    public function setAccountEnabled($accountEnabled)
    {
        $this->accountEnabled = $accountEnabled;
    }

    /**
     * @return String
     */
    public function getMailNickname()
    {
        return $this->mailNickname;
    }

    /**
     * @param String $mailNickname
     */
    public function setMailNickname($mailNickname)
    {
        $this->mailNickname = $mailNickname;
    }

    /**
     * @return PasswordProfile
     */
    public function getPasswordProfile()
    {
        return $this->passwordProfile;
    }

    /**
     * @param PasswordProfile $passwordProfile
     */
    public function setPasswordProfile($passwordProfile)
    {
        $this->passwordProfile = $passwordProfile;
    }

    /**
     * @return String
     */
    public function getUserPrincipalName()
    {
        return $this->userPrincipalName;
    }

    /**
     * @param String $userPrincipalName
     */
    public function setUserPrincipalName($userPrincipalName)
    {
        $this->userPrincipalName = $userPrincipalName;
    }


}