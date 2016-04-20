<?php
/**
 * User: ugursogukpinar
 * Date: 20/04/16
 * Time: 15:41
 */

namespace O365Graph\Entities;


class ServicePlan
{

    /**
     * @var string
     */
    private $servicePlanId;


    /**
     * @var string
     */
    private $servicePlanName;

    /**
     * @return string
     */
    public function getServicePlanId()
    {
        return $this->servicePlanId;
    }

    /**
     * @param string $servicePlanId
     */
    public function setServicePlanId($servicePlanId)
    {
        $this->servicePlanId = $servicePlanId;
    }

    /**
     * @return string
     */
    public function getServicePlanName()
    {
        return $this->servicePlanName;
    }

    /**
     * @param string $servicePlanName
     */
    public function setServicePlanName($servicePlanName)
    {
        $this->servicePlanName = $servicePlanName;
    }



}