<?php
namespace Learning\Coupon\Model\Coupon\ResourceModel\Coupon;

use Magento\Framework\Data\SearchResultInterface;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection implements SearchResultInterface
{
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        //$this->_init('Learning\Coupon\Model\Coupon\Coupon', ' Learning\Coupon\Model\Coupon\ResourceModel\Coupon');
        $this->_init('Magento\Framework\View\Element\UiComponent\DataProvider\Document', ' Learning\Coupon\Model\Coupon\ResourceModel\Coupon');
    }

    public function getSearchCriteria()
    {
        // TODO: Implement getSearchCriteria() method.
    }

    public function getTotalCount()
    {
        // TODO: Implement getTotalCount() method.
    }


}