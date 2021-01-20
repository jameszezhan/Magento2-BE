<?php
namespace SD\Admin\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class PricingRule extends AbstractDb
{
    const TABLE_NAME = 'sd_sims_pricing_feed';

    protected function _construct()
    {
        $this->_init(static::TABLE_NAME, 'entity_id');
    }
}
