<?php
namespace SomethingDigital\CustomCacheType\Controller\ResetCache;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\CacheInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Serialize\SerializerInterface;
use Magento\Framework\View\Result\Page;

class Index extends Action implements HttpGetActionInterface
{
    /**
     * @var CacheInterface
     */
    private $cache;
    /**
     * @var SerializerInterface
     */
    private $serializer;

    public function __construct(
        CacheInterface $cache,
        SerializerInterface $serializer,
        Context $context
    ) {
        $this->cache = $cache;
        $this->serializer = $serializer;
        parent::__construct($context);
    }
    /**
     * View lists
     *
     * @return Page
     */
    public function execute()
    {
        $randomNum = rand(0, 10000);
        $cacheKey  = \SomethingDigital\CustomCacheType\Model\CacheType::TYPE_IDENTIFIER;
        $cacheTag  = \SomethingDigital\CustomCacheType\Model\CacheType::CACHE_TAG;

        $this->cache->save(
            $this->serializer->serialize($randomNum),
            $cacheKey,
            [$cacheTag],
            86400
        );
        $outputMessage = "Cache is " . $randomNum;

        echo("<pre>");
        print_r($outputMessage);
        die();

        /** @var Page $resultPage */
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->getConfig()->getTitle()->set(__('Auction Items'));
        return $resultPage;
    }
}
