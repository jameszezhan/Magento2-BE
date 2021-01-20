<?php
namespace SomethingDigital\SIMSPricing\Model;

use Magento\Framework\Model\AbstractModel;
use SomethingDigital\SIMSPricing\Model\ResourceModel\PricingRule as PricingRuleResourceModel;

class PricingRule extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(PricingRuleResourceModel::class);
    }
}
