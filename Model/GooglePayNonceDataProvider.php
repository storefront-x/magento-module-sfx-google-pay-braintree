<?php
declare(strict_types=1);

namespace StorefrontX\SfxGooglePayBraintree\Model;;

use Magento\QuoteGraphQl\Model\Cart\Payment\AdditionalDataProviderInterface;

/**
 * Class GooglePayNonceDataProvider
 * Format Braintree input into value expected when setting payment method
 */
class GooglePayNonceDataProvider implements AdditionalDataProviderInterface
{
    public const PATH_ADDITIONAL_DATA = 'braintree';
    public const BRAINTRE_NONCE_PATH = 'payment_method_nonce';

    /**
     * Format Braintree input into value expected when setting payment method
     *
     * @param array $args
     * @return array
     */
    public function getData(array $args): array
    {
        return $args[self::PATH_ADDITIONAL_DATA] ?? [];
    }
}
