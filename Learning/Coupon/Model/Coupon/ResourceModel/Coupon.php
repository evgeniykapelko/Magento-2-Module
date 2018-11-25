<?php
namespace Learning\Coupon\Model\Coupon\ResourceModel;


class Coupon extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('coupon', 'entity_id');
    }

}