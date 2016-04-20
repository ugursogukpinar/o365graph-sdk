<?php
/**
 * User: ugursogukpinar
 * Date: 20/04/16
 * Time: 15:12
 */

namespace O365Graph\Entities;


class AssignedLicense
{
    /**
     * GUID collection
     *
     * @var array
     */
    private $disabledPlans;

    /**
     * GUID
     *
     * @var string
     */
    private $skuId;

    /**
     * @return array
     */
    public function getDisabledPlans()
    {
        return $this->disabledPlans;
    }

    /**
     * @param array $disabledPlans
     */
    public function setDisabledPlans(array $disabledPlans)
    {
        $this->disabledPlans = $disabledPlans;
    }

    /**
     * @return string
     */
    public function getSkuId()
    {
        return $this->skuId;
    }

    /**
     * @param string $skuId
     */
    public function setSkuId($skuId)
    {
        $this->skuId = $skuId;
    }

}