<?php
namespace shamiln\monzo\ServiceProvider\Transaction\Counterparty\Hydrator;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use shamiln\monzo\Transaction\Counterparty\Hydrator\CounterpartyHydrator as Hydrator;

class CounterpartyHydrator implements ServiceProviderInterface
{
    const PROVIDER_NAME_COUNTERPARTY_HYDRATOR = 'transaction.counterparty.hydrator';

    /**
     * {@inheritdoc}
     */
    public function register(Container $con)
    {
        $con[self::PROVIDER_NAME_COUNTERPARTY_HYDRATOR] = function () {
            return new Hydrator();
        };
    }
}
