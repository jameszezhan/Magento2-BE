<?php
namespace SomethingDigital\Auction\Block;

use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\Template\Context;
use SomethingDigital\Auction\Model\ResourceModel\AuctionItem\CollectionFactory as AuctionItemCollectionFactory;

class Items extends \Magento\Framework\View\Element\Template
{
    /**
     * @var UrlInterface
     */
    private $urlBuilder;
    /**
     * @var AuctionItemCollectionFactory
     */
    private $auctionItemCollectionFactory;

    /**
     * Submit constructor.
     * @param UrlInterface $urlBuilder
     * @param Context $context
     * @param array $data
     */
    public function __construct(
        AuctionItemCollectionFactory $auctionItemCollectionFactory,
        UrlInterface $urlBuilder,
        Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->urlBuilder = $urlBuilder;
        $this->auctionItemCollectionFactory = $auctionItemCollectionFactory;
    }

    /**
     * Retrieve auction request form post url
     *
     * @param $id
     * @return string
     */
    public function getItemUrl($id)
    {
        return $this->urlBuilder->getUrl(
            'auction/item/view',
            ['id' => $id]
        );
    }

    public function getItems()
    {
        return $this->auctionItemCollectionFactory->create();
    }
}
