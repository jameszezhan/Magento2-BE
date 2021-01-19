<?php

namespace SD\ExtendAttr\Model;

class FoomanAttribute implements \SD\ExtendAttr\Api\Data\FoomanAttributeInterface
{
    /**
     * {@inheritdoc}
     */
    public function getValue()
    {
        return $this->getData(self::VALUE);
    }

    /**
     * {@inheritdoc}
     */
    public function setValue($value)
    {
        return $this->setData(self::VALUE, $value);
    }
}