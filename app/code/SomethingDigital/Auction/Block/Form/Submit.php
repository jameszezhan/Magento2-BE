<?php
namespace SomethingDigital\Auction\Block\Form;

use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\Template\Context;

class Submit extends \Magento\Framework\View\Element\Template
{
    /**
     * @var UrlInterface
     */
    private $urlBuilder;

    /**
     * Submit constructor.
     * @param UrlInterface $urlBuilder
     * @param Context $context
     * @param array $data
     */
    public function __construct(
        UrlInterface $urlBuilder,
        Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->urlBuilder = $urlBuilder;
    }

    /**
     * Retrieve auction request form post url
     *
     * @return string
     */
    public function getPostActionUrl()
    {
        return $this->urlBuilder->getUrl('auction/request/form');
    }
}
