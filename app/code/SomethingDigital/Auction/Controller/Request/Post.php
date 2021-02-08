<?php
declare(strict_types=1);

namespace SomethingDigital\Auction\Controller\Request;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\UrlFactory;
use Magento\Framework\View\Result\Page;
use SomethingDigital\Auction\Model\AuctionItemFactory;

/**
 * Class Index
 * @package SomethingDigital\Auction\Controller\Request\Form
 */
class Post extends Action implements HttpPostActionInterface
{

    /**
     * @var AuctionItemFactory
     */
    private $auctionItemFactory;

    public function __construct(
        ManagerInterface $messageManager,
        UrlFactory $urlFactory,
        AuctionItemFactory $auctionItemFactory,
        Context $context
    ) {
        $this->messageManager = $messageManager;
        $this->urlFactory = $urlFactory;
        $this->auctionItemFactory = $auctionItemFactory;
        parent::__construct($context);
    }

    /**
     * View lists
     *
     * @return Page
     */
    public function execute()
    {
        $urlModel = $this->urlFactory->create();
        if (!$this->getRequest()->isPost()) {
            $url = $urlModel->getUrl('*/*/form', ['_secure' => true]);
            return $this->resultRedirectFactory->create()->setUrl($this->_redirect->error($url));
        }
        $itemName = $this->getRequest()->getParam('item_name');
        $itemSku = $this->getRequest()->getParam('item_sku');
        $itemEmail = $this->getRequest()->getParam('item_owner_email');
        $itemBasePrice = $this->getRequest()->getParam('item_base_price');

        $newItem = $this->auctionItemFactory->create();
        $newItem->setData('item_name', $itemName);
        $newItem->setData('item_sku', $itemSku);
        $newItem->setData('item_owner_email', $itemEmail);
        $newItem->setData('item_base_auction_price', $itemBasePrice);

        $newItem->save();

        $this->messageManager->addSuccessMessage("Item created.");
        $url = $urlModel->getUrl('*/*/form', ['_secure' => true]);

        return $this->resultRedirectFactory->create()->setUrl($this->_redirect->success($url));
    }
}
