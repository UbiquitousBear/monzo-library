<?php
namespace shamiln\monzo\ServiceProvider\Transaction\Merchant\Hydrator;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use shamiln\monzo\Transaction\Merchant\Address\Hydrator\AddressHydrator;
use shamiln\monzo\Transaction\Merchant\Hydrator\MerchantHydrator as Hydrator;
use shamiln\monzo\Transaction\Merchant\Metadata\Hydrator\MetadataHydrator;

class MerchantHydrator implements ServiceProviderInterface
{

    const PROVIDER_NAME_MERCHANT_HYDRATOR = 'transaction.merchant.hydrator';

    /**
     * {@inheritdoc}
     */
    public function register(Container $con)
    {
        $con[self::PROVIDER_NAME_MERCHANT_HYDRATOR] = function () {
            return new Hydrator(
                new AddressHydrator(),
                new MetadataHydrator()
            );
        };
    }
}
