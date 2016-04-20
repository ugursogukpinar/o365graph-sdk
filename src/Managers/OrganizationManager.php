<?php
/**
 * User: ugursogukpinar
 * Date: 20/04/16
 * Time: 15:43
 */

namespace O365Graph\Managers;


class OrganizationManager extends BaseManager
{

    /**
     * @var string
     */
    protected $resource = '/subscribedSkus';

    /**
     * @return array
     */
    public function getSubscribedSku()
    {
        $url = $this->getResource() . '?'. $this->getQuery();

        $requestManager = new RequestManager($url, [], 'GET', $this->getHeader());
        $requestManager->send();

        return json_decode($requestManager->getHttpResponse(), true);
    }

    /**
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
}