<?php
namespace shamiln\monzo\ServiceProvider\Transaction\Metadata\Hydrator;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use shamiln\monzo\Transaction\Metadata\Hydrator\MetadataHydrator as Hydrator;

class MetadataHydrator implements ServiceProviderInterface
{
    const PROVIDER_NAME_METADATA_HYDRATOR = 'transaction.metadata.hydrator';

    /**
     * {@inheritdoc}
     */
    public function register(Container $con)
    {
        $con[self::PROVIDER_NAME_METADATA_HYDRATOR] = function () {
            return new Hydrator();
        };
    }
}
