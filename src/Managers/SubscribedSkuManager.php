<?php
/**
 * User: ugursogukpinar
 * Date: 20/04/16
 * Time: 15:43
 */

namespace O365Graph\Managers;


class SubscribedSkuManager extends BaseManager
{

    /**
     * @var string
     */
    protected $resource = '/subscribedSkus';


    /**
     * OrganizationManager constructor.
     * @param array $keys
     */
    public function __construct(array $keys)
    {
        parent::__construct($keys);
    }

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