<?php
/**
 * User: ugursogukpinar
 * Date: 20/04/16
 * Time: 15:42
 */

namespace O365Graph\Entities;


class SubscribedSku
{

    /**
     * @var array(ServicePlan)
     */
    private $servicePlans;

    /**
     * @var string
     */
    private $id;

    /**
     * @return array
     */
    public function getServicePlans()
    {
        return $this->servicePlans;
    }

    /**
     * @param array $servicePlans
     */
    public function setServicePlans($servicePlans)
    {
        $this->servicePlans = $servicePlans;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


}