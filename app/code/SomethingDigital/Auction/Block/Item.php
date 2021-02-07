<?php
namespace SomethingDigital\Auction\Block;

use Magento\Framework\View\Element\Template\Context;
use SomethingDigital\Auction\Model\AuctionItemFactory as AuctionItemFactory;

class Item extends \Magento\Framework\View\Element\Template
{
    /**
     * @var AuctionItemFactory
     */
    private $auctionItemFactory;

    /**
     * Submit constructor.
     * @param AuctionItemFactory $auctionItemFactory
     * @param Context $context
     * @param array $data
     */
    public function __construct(
        AuctionItemFactory $auctionItemFactory,
        Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->auctionItemFactory = $auctionItemFactory;
    }

    public function getItem()
    {
        $id = $this->getRequest()->getParam('id');
        $item = $this->auctionItemFactory->create()->load($id);
        return $item ?? null;
    }
}
