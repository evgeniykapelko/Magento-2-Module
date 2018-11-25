<?php

namespace Learning\Coupon\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Framework\View\Element\Template;

class Modal extends Template implements ArgumentInterface
{
    protected $product;
    public function __construct(Template\Context $context,\Magento\Catalog\Model\ProductFactory $product ,
                                array $data = [])
    {
        $this->product = $product;
        $this->assign('product',$this->product);
        parent::__construct($context, $data);
    }
}