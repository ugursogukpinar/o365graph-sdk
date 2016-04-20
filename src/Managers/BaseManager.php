<?php
/**
 * User: ugursogukpinar
 * Date: 18/04/16
 * Time: 17:21
 */

namespace O365Graph\Managers;


/**
 * Class BaseManager
 * @package O365Graph\Managers
 */
abstract class BaseManager
{
    /**
     * @var string
     */
    private $accessToken;


    /**
     * @var string
     */
    private $query = [];


    public function __construct()
    {
        $this->setAccessToken();
    }

    /**
     * @return $this
     */
    public function setAccessToken()
    {
        $this->accessToken = AuthorizationManager::getAccessToken();
        return $this;
    }


    /**
     * @return array
     */
    public function getHeader()
    {
        return [
            "Content-Type: application/json",
            "Authorization: Bearer {$this->accessToken}"
        ];
    }


    /**
     * @param $domain
     * @param $value
     * @return $this
     */
    public function where($domain, $value)
    {
        $this->query['$filter'][] = "$domain eq '$value'";

        return $this;
    }


    private function prepareWhereStatement()
    {
        if (isset($this->query['filter']))
        {
            $this->query['$filter'] = join(" and ", $this->query['$filter']);
        }
    }

    /**
     * @return string
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }


    /**
     * @return string
     */
    public function getQuery()
    {
        $this->prepareWhereStatement();


        return http_build_query($this->query);
    }


    /**
     * @param $count
     * @return $this
     */
    public function take($count)
    {
        $this->query['$top'] = $count;
        return $this;
    }


    /**
     * @param $field
     * @param string $order
     * @return $this
     */
    public function orderBy($field, $order = 'asc')
    {
        $order = strtolower($order);

        $this->query['$orderby'] = "$field $order";
        return $this;
    }


    /**
     * @param int $count
     * @return $this
     */
    public function skip($count)
    {
        $this->query['$skip'] = $count;
        return $this;
    }


    /**
     * @param array $fields
     * @return $this
     */
    public function select(array $fields)
    {
        $this->query['$select'] = join(',', $fields);
        return $this;
    }


    /**
     * @return $this
     */
    public function withCount()
    {
        $this->query['$count'] = 'true';
        return $this;
    }
}