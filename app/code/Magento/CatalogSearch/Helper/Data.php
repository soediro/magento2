<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\CatalogSearch\Helper;

/**
 * Catalog search helper
 *
 * @api
 * @since 100.0.2
 * @deprecated
 * @see ElasticSearch module is default search engine starting from 2.3. CatalogSearch would be removed in 2.4
 */
class Data extends \Magento\Search\Helper\Data
{
    /**
     * Retrieve advanced search URL
     *
     * @return string
     */
    public function getAdvancedSearchUrl()
    {
        return $this->_getUrl('catalogsearch/advanced');
    }
}
