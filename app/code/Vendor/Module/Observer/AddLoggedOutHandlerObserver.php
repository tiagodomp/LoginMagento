<?php


namespace Vendor\Module\Observer;

use Magento\Customer\Model\Session;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class AddLoggedOutHandlerObserver implements ObserverInterface
{
    private $customerSession;

    /**
     * AddCustomerHandlesObserver constructor.
     *
     * @param Session $customerSession
     */
    public function __construct(Session $customerSession)
    {
        $this->customerSession = $customerSession;
    }

    /**
     * @inheritDoc
     */
    public function execute(Observer $observer)
    {
        $layout = $observer->getEvent()->getLayout();

        if (!$this->customerSession->isLoggedIn()) {
            $layout->getUpdate()->addHandle('ajaxlogin_customer_logged_out');
        }
    }
}
