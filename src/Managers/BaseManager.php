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


    /**
     * @var string
     */
    protected $baseService = 'https://graph.microsoft.com/v1.0';


    /**
     * @var string
     */
    protected $resource = '';


    /**
     * @var array
     */
    protected $keys;

    /**
     * BaseManager constructor.
     * @param $keys
     */
    public function __construct(array $keys)
    {
        $this->keys = $keys;
        $this->setAccessToken();
    }

    /**
     * @return $this
     */
    protected function setAccessToken()
    {
        $this->accessToken = AuthorizationManager::getAccessToken($this->keys);
        return $this;
    }


    /**
     * @return array
     */
    protected function getHeader()
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
    protected function where($domain, $value)
    {
        $this->query['$filter'][] = "$domain eq '$value'";

        return $this;
    }


    private function prepareWhereStatement()
    {
        if (isset($this->query['filter'])) {
            $this->query['$filter'] = join(" and ", $this->query['$filter']);
        }
    }

    /**
     * @return string
     */
    protected function getAccessToken()
    {
        return $this->accessToken;
    }


    /**
     * @return string
     */
    protected function getQuery()
    {
        $this->prepareWhereStatement();


        return http_build_query($this->query);
    }


    /**
     * @param $count
     * @return $this
     */
    protected function take($count)
    {
        $this->query['$top'] = $count;
        return $this;
    }


    /**
     * @param $field
     * @param string $order
     * @return $this
     */
    protected function orderBy($field, $order = 'asc')
    {
        $order = strtolower($order);

        $this->query['$orderby'] = "$field $order";
        return $this;
    }


    /**
     * @param int $count
     * @return $this
     */
    protected function skip($count)
    {
        $this->query['$skip'] = $count;
        return $this;
    }


    /**
     * @param array $fields
     * @return $this
     */
    protected function select(array $fields)
    {
        $this->query['$select'] = join(',', $fields);
        return $this;
    }


    /**
     * @return $this
     */
    protected function withCount()
    {
        $this->query['$count'] = 'true';
        return $this;
    }


    protected function getResource()
    {
        return $this->baseService . call_user_func_array('sprintf', array_merge([$this->resource], func_get_args()));
    }
}