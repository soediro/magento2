<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\CatalogSearch\Model\Price;

use Magento\Framework\Search\Dynamic\IntervalInterface;

/**
 * @deprecated
 * @see ElasticSearch module is default search engine starting from 2.3. CatalogSearch would be removed in 2.4
 */
class Interval implements IntervalInterface
{
    /**
     * @var \Magento\Catalog\Model\ResourceModel\Layer\Filter\Price
     */
    private $resource;

    /**
     * @param \Magento\Catalog\Model\ResourceModel\Layer\Filter\Price $resource
     */
    public function __construct(\Magento\Catalog\Model\ResourceModel\Layer\Filter\Price $resource)
    {
        $this->resource = $resource;
    }

    /**
     * {@inheritdoc}
     */
    public function load($limit, $offset = null, $lower = null, $upper = null)
    {
        $prices = $this->resource->loadPrices($limit, $offset, $lower, $upper);
        return $this->arrayValuesToFloat($prices);
    }

    /**
     * {@inheritdoc}
     */
    public function loadPrevious($data, $index, $lower = null)
    {
        $prices = $this->resource->loadPreviousPrices($data, $index, $lower);
        return $this->arrayValuesToFloat($prices);
    }

    /**
     * {@inheritdoc}
     */
    public function loadNext($data, $rightIndex, $upper = null)
    {
        $prices = $this->resource->loadNextPrices($data, $rightIndex, $upper);
        return $this->arrayValuesToFloat($prices);
    }

    /**
     * @param array $prices
     * @return array
     */
    private function arrayValuesToFloat($prices)
    {
        $returnPrices = [];
        if (is_array($prices) && !empty($prices)) {
            $returnPrices = array_map('floatval', $prices);
        }
        return $returnPrices;
    }
}
