<?php

namespace SomethingDigital\Auction\Model\ResourceModel\AuctionItem;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use SomethingDigital\Auction\Model\AuctionItem as Model;
use SomethingDigital\Auction\Model\ResourceModel\AuctionItem as ResourceModel;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
