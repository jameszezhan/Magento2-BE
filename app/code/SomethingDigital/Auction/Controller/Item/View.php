<?php
declare(strict_types=1);

namespace SomethingDigital\Auction\Controller\Item;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\Action\Action;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\View\Result\Page;

class View extends Action implements HttpGetActionInterface
{
    /**
     * View lists
     *
     * @return Page
     */
    public function execute()
    {
        /** @var Page $resultPage */
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->getConfig()->getTitle()->set(__('Auction Item'));
        return $resultPage;
    }
}
