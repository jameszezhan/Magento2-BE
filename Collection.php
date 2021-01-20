<?php

namespace SomethingDigital\SIMSPricing\Model\ResourceModel\PricingRule;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init(\SomethingDigital\SIMSPricing\Model\PricingRule::class, \SomethingDigital\SIMSPricing\Model\ResourceModel\PricingRule::class);
    }
}
