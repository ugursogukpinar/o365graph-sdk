<?php
/**
 * User: ugursogukpinar
 * Date: 13/04/16
 * Time: 11:41
 */

namespace O365Graph\Managers;


class AuthorizationManager
{
    protected $loginUrl;

    protected $accessToken;

    private static $instance;

    /**
     * @var array
     */
    protected $keys;

    private function __construct(array $keys)
    {
        $this->keys = $keys;
        $this->loginUrl = "https://login.microsoft.com/{$keys['tenant_id']}/oauth2/token";
    }


    private function fetchToken()
    {
        $requestManager = new RequestManager($this->loginUrl,[
            'client_id' => $this->keys['client_id'],
            'client_secret' => $this->keys['client_secret'],
            'grant_type' => $this->keys['grant_type'],
            'resource' => $this->keys['resource']
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

    public static function getAccessToken(array $keys)
    {

        if (!self::$instance) {
            self::$instance = new self($keys);
        }

        return self::$instance->getToken();
    }
}