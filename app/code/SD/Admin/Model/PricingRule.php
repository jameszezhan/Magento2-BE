<?php
namespace SD\Admin\Model;

use Magento\Framework\Model\AbstractModel;
use SD\Admin\Model\ResourceModel\PricingRule as PricingRuleResourceModel;

class PricingRule extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(PricingRuleResourceModel::class);
    }
}
