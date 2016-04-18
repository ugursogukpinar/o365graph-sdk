<?php
/**
 * User: ugursogukpinar
 * Date: 18/04/16
 * Time: 17:21
 */

namespace O365Graph\Managers;


abstract class BaseManager
{
    /**
     * @var string
     */
    private $accessToken;


    public function setAccessToken()
    {
        $this->accessToken = AuthorizationManager::getAccessToken();
    }


    public function getHeader()
    {
        $this->setAccessToken();

        return [
            "Content-Type: application/json",
            "Authorization: Bearer {$this->accessToken}"
        ];
    }
}