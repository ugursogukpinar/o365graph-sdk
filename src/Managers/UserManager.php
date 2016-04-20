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
    protected $resource = '/users';


    /**
     * It creates a new user given entity and returns
     * result.
     * @param User $userEntity
     * @return array
     */
    public function create(User $userEntity)
    {
        $payload = json_encode($this->getUserInformation($userEntity));

        $requestManager = new RequestManager($this->getResource(), $payload, 'POST', $this->getHeader());

        $requestManager->send();

        return json_decode($requestManager->getHttpResponse());
    }


    /**
     * It lists all users in o365 tenant
     *
     * @return array
     */
    public function get()
    {
        $url = $this->getResource() . '?'. $this->getQuery();

        $requestManager = new RequestManager($url, [], 'GET', $this->getHeader());
        $requestManager->send();

        return json_decode($requestManager->getHttpResponse(), true);
    }


    /**
     * It deletes a user with UserID or UserPrincipalName
     *
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $url = $this->getResource() . "/$id";

        $requestManager = new RequestManager($url, [], 'DELETE', $this->getHeader());
        $requestManager->send();


        return json_decode($requestManager->getHttpResponse(), true);
    }


    /**
     * Update a user with UserID or UserPrincipalName
     *
     * @param $id
     * @param User $userEntity
     * @return array
     */
    public function update($id, User $userEntity)
    {
        $url = $this->getResource(). "/$id";

        $requestManager = new RequestManager($url, json_encode($this->getUserInformation($userEntity)), 'PATCH', $this->getHeader());
        $requestManager->send();


        return json_decode($requestManager->getHttpResponse(), true);
    }


    /**
     * Gets single user with UserID or UserPrincipalName
     * @param $id
     * @return array
     */
    public function find($id)
    {
        $url = $this->getResource() . "/$id";

        $requestManager = new RequestManager($url, [], 'GET', $this->getHeader());
        $requestManager->send();


        return json_decode($requestManager->getHttpResponse(), true);
    }


    /**
     * @param User $userEntity
     * @return array
     */
    private function getUserInformation(User $userEntity){
        $data = [
            'displayName' => $userEntity->getDisplayName(),
            'userPrincipalName' => $userEntity->getUserPrincipalName(),
            'mailNickname' => $userEntity->getMailNickname(),
            'accountEnabled' => $userEntity->isAccountEnabled(),
            'aboutMe' => $userEntity->getAboutMe(),
            'assignedLicenses' => $userEntity->getAssignedLicenses(),
            'birthday' => $userEntity->getBirthday(),
            'city' => $userEntity->getCity(),
            'department' => $userEntity->getDepartment(),
            'preferredName' => $userEntity->getName(),
            'surname' => $userEntity->getSurname()
        ];

        if ($userEntity->getPasswordProfile()) {
            $data['passwordProfile'] = [
                'password' => $userEntity->getPasswordProfile()->getPassword(),
                'forceChangePasswordNextSignIn' => $userEntity->getPasswordProfile()->isChangeOnStart()
            ];
        }

        return array_filter($data, function($val){
            return $val;
        });
    }
}