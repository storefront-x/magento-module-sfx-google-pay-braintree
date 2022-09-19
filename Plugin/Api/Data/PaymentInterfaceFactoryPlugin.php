<?php
namespace StorefrontX\SfxGooglePayBraintree\Plugin\Api\Data;

use Magento\Quote\Api\Data\PaymentInterface;
use Magento\Quote\Api\Data\PaymentInterfaceFactory;
use StorefrontX\SfxGooglePayBraintree\Model\GooglePayNonceDataProvider;

/**
 * Class PaymentInterfaceFactoryPlugin
 * Change the input parameter for payment creation
 * to set payment method nonce
 */
class PaymentInterfaceFactoryPlugin
{

    /**
     * If additional data has the braintree nonce - set it to original data
     * @param PaymentInterfaceFactory $subject
     * @param array $data
     * @return array
     */
    public function beforeCreate(PaymentInterfaceFactory $subject, array $data = [])
    {
        if (
            isset($data['data'][PaymentInterface::KEY_ADDITIONAL_DATA][GooglePayNonceDataProvider::BRAINTRE_NONCE_PATH])
            &&
            $data['data'][PaymentInterface::KEY_ADDITIONAL_DATA][GooglePayNonceDataProvider::BRAINTRE_NONCE_PATH])
        {
            $data['data'][GooglePayNonceDataProvider::PATH_ADDITIONAL_DATA][GooglePayNonceDataProvider::BRAINTRE_NONCE_PATH]
                = $data['data'][PaymentInterface::KEY_ADDITIONAL_DATA][GooglePayNonceDataProvider::BRAINTRE_NONCE_PATH];
        }

        return [$data];
    }
}
