<?php

namespace SomethingDigital\Auction\Plugin\Framework\View;

use Magento\Customer\Api\GroupRepositoryInterface;
use Magento\Customer\Model\Context as CustomerModelContext;
use Magento\Framework\App\Http\Context as HttpContext;
use Magento\Framework\View\Layout;
use SomethingDigital\Auction\Model\Bidder;

class LayoutPlugin
{
    /**
     * @var HttpContext
     */
    protected $httpContext;
    /**
     * @var GroupRepositoryInterface
     */
    private $groupRepository;

    /**
     * @param GroupRepositoryInterface $groupRepository
     * @param HttpContext $httpContext
     */
    public function __construct(
        GroupRepositoryInterface $groupRepository,
        HttpContext $httpContext
    ) {
        $this->groupRepository = $groupRepository;
        $this->httpContext = $httpContext;
    }

    /**
     * Disable cache when sims id exists in http context
     *
     * @param Layout $subject
     * @param bool $result
     * @return bool
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function afterIsCacheable(Layout $subject, bool $result)
    {
        $groupId = $this->httpContext->getValue(CustomerModelContext::CONTEXT_GROUP);
        $groupName = $this->getGroupName($groupId);
        if ($groupName == Bidder::CUSTOMER_GROUP_BIDDER) {
            return false;
        }
        return $result;
    }

    /**
     * @param $groupId
     * @throws \Magento\Framework\Exception\LocalizedException
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getGroupName($groupId)
    {
        $group = $this->groupRepository->getById($groupId);
        return $group ? $group->getCode() : null;
    }
}
