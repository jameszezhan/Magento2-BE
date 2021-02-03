<?php

namespace SomethingDigital\Auction\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class AuctionItem extends AbstractDb
{
    const TABLE_NAME = 'rp_auction_items';

    protected function _construct()
    {
        $this->_init(self::TABLE_NAME, 'entity_id');
    }
}
