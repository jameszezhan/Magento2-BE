<?php

namespace SD\Admin\Model\ResourceModel\PricingRule;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init(\SD\Admin\Model\PricingRule::class, \SD\Admin\Model\ResourceModel\PricingRule::class);
    }
}
