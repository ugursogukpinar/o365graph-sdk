<?php
/**
 * User: ugursogukpinar
 * Date: 13/04/16
 * Time: 11:41
 */

namespace O365Graph\Managers;


use O365Graph\Parsers\ConfigParser;

class AuthorizationManager
{
    protected $loginUrl;

    protected $accessToken;

    private static $instance;

    private function __construct()
    {
        $tenantId = ConfigParser::getConfig('tenant_id');
        $this->loginUrl = "https://login.microsoft.com/{$tenantId}/oauth2/token";
    }


    private function fetchToken()
    {
        $requestManager = new RequestManager($this->loginUrl,[
            'client_id' => ConfigParser::getConfig('client_id'),
            'client_secret' => ConfigParser::getConfig('client_secret'),
            'grant_type' => ConfigParser::getConfig('grant_type'),
            'resource' => ConfigParser::getConfig('resource')
        ], 'POST', []);

        $requestManager->send();

        $response = json_decode($requestManager->getHttpResponse());

        if (isset($response->error)) {
            return null;
        }

        return $response;
    }

    private function checkExpires()
    {
        return (int)$this->accessToken->expires_on >= time();
    }

    public function getToken()
    {
        if (!($this->accessToken && $this->checkExpires())) {
            $this->accessToken = $this->fetchToken();
        }

        return $this->accessToken->access_token;
    }

    public static function getAccessToken()
    {

        if (!self::$instance) {
            self::$instance = new self;
        }

        return self::$instance->getToken();
    }
}