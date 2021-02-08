<?php

namespace SomethingDigital\Auction\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Customer\Model\GroupFactory;
use SomethingDigital\Auction\Model\Bidder;

/**
* Patch is mechanism, that allows to do atomic upgrade data changes
*/
class createBidderCustomerGroup implements DataPatchInterface
{
    /**
     * @var ModuleDataSetupInterface $moduleDataSetup
     */
    private $moduleDataSetup;
    /**
     * @var GroupFactory
     */
    private $groupFactory;

    /**
     * @param GroupFactory $groupFactory
     * @param ModuleDataSetupInterface $moduleDataSetup
     */
    public function __construct(
        GroupFactory $groupFactory,
        ModuleDataSetupInterface $moduleDataSetup
    ) {
        $this->groupFactory = $groupFactory;
        $this->moduleDataSetup = $moduleDataSetup;
    }

    /**
     * Do Upgrade
     *
     * @return void
     */
    public function apply()
    {
        // Create the new group
        /** @var \Magento\Customer\Model\Group $group */
        $group = $this->groupFactory->create();
        $group
            ->setCode(Bidder::CUSTOMER_GROUP_BIDDER)
            ->setTaxClassId(3)
            ->save();
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies()
    {
        return [

        ];
    }
}
