<?php

namespace Learning\Coupon\Model\Coupon;

class Coupon extends \Magento\Framework\Model\AbstractModel
{

    protected function _construct()
    {
        $this->_init('Learning\Coupon\Model\Coupon\ResourceModel\Coupon');
    }
}