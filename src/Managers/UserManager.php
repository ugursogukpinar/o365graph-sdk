<?php
/**
 * User: ugursogukpinar
 * Date: 18/04/16
 * Time: 14:08
 */

namespace O365Graph\Managers;


use O365Graph\Entities\User;

class UserManager extends BaseManager
{
    /**
     * @var string
     */
    private static $userResource = 'https://graph.microsoft.com/v1.0/users';


    /**
     * It creates a new user with given entity and returns
     * result.
     * @param User $userEntity
     * @return array
     */
    public function create(User $userEntity)
    {
        $payload = json_encode([
            'displayName' => $userEntity->getDisplayName(),
            'userPrincipalName' => $userEntity->getUserPrincipalName(),
            'passwordProfile' => [
                'password' => $userEntity->getPasswordProfile()->getPassword(),
                'forceChangePasswordNextSignIn' => $userEntity->getPasswordProfile()->isChangeOnStart()
            ],
            'mailNickname' => $userEntity->getMailNickname(),
            'accountEnabled' => $userEntity->isAccountEnabled()
        ]);

        $requestManager = new RequestManager(static::$userResource, $payload, 'POST', $this->getHeader());

        $requestManager->send();

        if (!$requestManager->isSuccess()) {
            return null;
        }

        return json_decode($requestManager->getHttpResponse());
    }


    /**
     * It lists all users in o365 tenant
     *
     * @return array
     */
    public function all()
    {
        $requestManager = new RequestManager(static::$userResource, [], 'GET', $this->getHeader());
        $requestManager->send();


        return json_decode($requestManager->getHttpResponse(), true);
    }


    /**
     * It deletes a user
     *
     * @return bool
     */
    public function delete()
    {
    }


    /**
     * Update a user
     *
     * @return array
     */
    public function update()
    {
    }

}