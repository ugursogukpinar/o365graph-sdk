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
     * @var array
     */
    private $personalInformation = [
        'aboutMe' => '',
        'birthday' => '',
        'jobTitle' => '',
        'department' => '',
        'city' => ''
    ];


    /**
     * @var array(AssignedLicense)
     */
    private $assignedLicenses;


    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $surname;

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
    public function setPasswordProfile(PasswordProfile $passwordProfile)
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

    /**
     * @param $aboutMe
     */
    public function setAboutMe($aboutMe)
    {
        $this->personalInformation['aboutMe'] = $aboutMe;
    }

    /**
     * @return string
     */
    public function getAboutMe()
    {
        return $this->personalInformation['aboutMe'];
    }


    /**
     * @param $city
     */
    public function setCity($city)
    {
        $this->personalInformation['city'] = $city;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->personalInformation['city'];
    }


    /**
     * @param $department
     */
    public function setDepartment($department)
    {
        $this->personalInformation['department'] = $department;
    }


    /**
     * @return string
     */
    public function getDepartment()
    {
        return $this->personalInformation['department'];
    }


    /**
     * @param $birthday
     */
    public function setBirthday($birthday)
    {
        $this->personalInformation['birthday'] = $birthday;
    }


    /**
     * @return string
     */
    public function getBirthday()
    {
        return $this->personalInformation['birthday'];
    }

    /**
     * @param $title
     */
    public function setJobTitle($title)
    {
        $this->personalInformation['jobTitle'] = $title;
    }


    /**
     * @return string
     */
    public function getJobTitle()
    {
        return $this->personalInformation['jobTitle'];
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    /**
     * @return array
     */
    public function getAssignedLicenses()
    {
        return $this->assignedLicenses;
    }

    /**
     * @param array $assignedLicenses
     */
    public function setAssignedLicenses($assignedLicenses)
    {
        $this->assignedLicenses = $assignedLicenses;
    }


}