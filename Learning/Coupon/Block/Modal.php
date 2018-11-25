<?php

namespace Learning\Coupon\Block;


use Magento\Framework\View\Element\Template;

class Modal extends Template
{
    /**
     * @var mixed
     */
    protected $product;
    /**
     * @var
     */
    protected $registry;
    /**
     * @var Learning\Coupon\Model\Coupon\Create
     */
    protected $coupon;

    protected $customerSession;

    protected $stockItemRepository;

    /**
     * Modal constructor.
     * @param Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param Learning\Coupon\Model\Coupon\Create $coupon
     * @param array $data
     */
    public function __construct(Template\Context $context,
                                \Magento\Framework\Registry $registry,
                                \Learning\Coupon\Model\Coupon\Create $coupon,
                                \Magento\Customer\Model\SessionFactory $customerSession,
                                \Magento\CatalogInventory\Model\Stock\StockItemRepository $stockItemRepository,
                                array $data = [])
    {
        $this->product = $registry->registry('product');
        $this->assign('product',$this->product);
        $this->coupon = $coupon;
        $this->customerSession = $customerSession;
        $this->stockItemRepository = $stockItemRepository;
        parent::__construct($context, $data);
    }


    /**
     * @return mixed
     */
    public function getStatus()
    {
        $productId = $this->product->getId();
        $productStock = $this->stockItemRepository->get($productId);
        return $productStock->getIsInStock();

    }

    /**
     * @return mixed
     */
    public function getCoupon()
    {
        return $this->coupon->getCoupon();
    }

    public function isLoggedIn()
    {
        $session = $this->customerSession->create();
        return $session->isLoggedIn();
    }
}