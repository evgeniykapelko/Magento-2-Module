<?php

namespace Learning\Coupon\Model\Coupon;

class Create
{
    protected $couponFactory;

    protected $customerSession;

    protected $customerRepository;

    public function __construct(\Learning\Coupon\Model\Coupon\CouponFactory $couponFactory,
                                \Magento\Customer\Model\SessionFactory $customerSession,
                                \Magento\Customer\Api\CustomerRepositoryInterface $customerRepository)
    {
        $this->couponFactory = $couponFactory;
        $this->customerSession = $customerSession;
        $this->customerRepository = $customerRepository;
    }

    public function generateCoupon()
    {
        $hash = bin2hex(random_bytes(16));
        return serialize($hash);
    }

    public function getCoupon()
    {
        $coupon = $this->generateCoupon();
        $this->saveCoupon($coupon);
        return $coupon;
    }

    public function saveCoupon($coupon)
    {
        $data = [];
        $model = $this->couponFactory->create();

        $data = [
                    'name' => $this->getCustomerFullName(),
                    'lifetime' => 100, // it is temporary
                    'coupon_code' => $coupon,
                    'status' => 1,
                    'discount' => 44 // it is temporary
                ];
        $model->setData($data);
        $model->save();
    }

    public function getCustomerFullName()
    {
        $customerId = $this->customerSession->create()->getCustomerId();
        $customer = $this->customerRepository->getById($customerId);
        $fullName =  $customer->getFirstname().' '.$customer->getLastname();

        return $fullName;
    }
}