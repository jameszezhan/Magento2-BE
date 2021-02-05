<?php
declare(strict_types=1);

namespace SomethingDigital\Auction\Controller\Request;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\Action\Action;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\View\Result\Page;

/**
 * Class Index
 * @package SomethingDigital\Auction\Controller\Request\Form
 */
class Form extends Action implements HttpGetActionInterface
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
        $resultPage->getConfig()->getTitle()->set(__('Auction Item Submit Form'));
        return $resultPage;
    }
}
