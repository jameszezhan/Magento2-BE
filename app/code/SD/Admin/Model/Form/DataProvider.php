<?php
namespace SD\Admin\Model\Form;

use SD\Admin\Model\ResourceModel\PricingRule\CollectionFactory;
use SD\Admin\Model\PricingRule;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $contactCollectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $contactCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }

        $items = $this->collection->getItems();
        $this->loadedData = array();
        /** @var Contact $contact */
        foreach ($items as $contact) {
            $this->loadedData[$contact->getId()] = $contact->getData();
        }

        return $this->loadedData;
    }
}