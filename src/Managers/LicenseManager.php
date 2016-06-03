<?php
/**
 * User: ugursogukpinar
 * Date: 17/05/16
 * Time: 10:38
 */

namespace O365Graph\Managers;


use O365Graph\Entities\AssignedLicense;

class LicenseManager extends BaseManager
{

    protected $resource = "/users/%s/assignLicense";


    /**
     * LicenseManager constructor.
     * @param array $keys
     */
    public function __construct(array $keys)
    {
        parent::__construct($keys);
    }

    /**
     * @param $licenses AssignedLicense[]
     * @param $userId
     * @return mixed
     */
    public function addLicense($userId, array $licenses)
    {
        $data = ["removeLicenses" => []];

        foreach ($licenses as $license) {
            $data['addLicenses'][] = [
                'disabledPlans' => $license->getDisabledPlans(),
                'skuId' => $license->getSkuId()
            ];
        }

        $requestManager = new RequestManager($this->getResource($userId), json_encode($data), 'POST', $this->getHeader());
        $requestManager->send();

        return json_decode($requestManager->getHttpResponse(), true);
    }
}