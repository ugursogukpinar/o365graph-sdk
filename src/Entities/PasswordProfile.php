<?php
/**
 * User: ugursogukpinar
 * Date: 18/04/16
 * Time: 15:42
 */

namespace O365Graph\Entities;


class PasswordProfile
{
    /**
     * @var string
     */
    private $password;

    /**
     * It forces user to change password on start
     * @var bool
     */
    private $changeOnStart;

    /**
     * PasswordProfile constructor.
     * @param $password
     * @param $changeOnStart
     */
    public function __construct($password, $changeOnStart=true)
    {
        $this->password = $password;
        $this->changeOnStart = $changeOnStart;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return boolean
     */
    public function isChangeOnStart()
    {
        return $this->changeOnStart;
    }

}