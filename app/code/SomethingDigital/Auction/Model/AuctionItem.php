<?php

namespace SomethingDigital\Auction\Model;

use Magento\Framework\Model\AbstractModel;
use SomethingDigital\Auction\Model\ResourceModel\AuctionItem as ResourceModel;

class AuctionItem extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }
}
