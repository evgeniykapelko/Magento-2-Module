<?php

namespace Learning\Coupon\Controller\Adminhtml\Grid;

use Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;

class Index extends \Magento\Backend\App\Action
{
    protected $resultPageFactory = false;

    public function __construct(Action\Context $context,
                                \Magento\Framework\View\Result\PageFactory $resultPageFactory)
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        return $resultPage;
        // TODO: Implement execute() method.
    }

}